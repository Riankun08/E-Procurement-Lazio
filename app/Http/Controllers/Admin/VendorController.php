<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Vendor;
use App\Models\User;

class VendorController extends Controller
{
    public $view = 'admin.vendor.';
    public $route = 'admin.vendors.';
    public $title = 'Vendor ';
    public $model;
    protected $path = 'image-save/image-vendor/';

     public function __construct(Vendor $model)
    {
        $this->model = $model;
        View::share('title', $this->title);
        View::share('route', $this->route);
        View::share('view', $this->view);
        View::share('path', $this->path);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $datas = $this->model->all();
            return view($this->view.'index' , compact('datas'));
        } catch (DecryptException $e) {
            Alert::error('error!', 'validation url');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try  { 
            return view($this->view.'create');
        } catch (DecryptException $e) {
            Alert::error('error!', 'validation url');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $this->validate($request, [
                'image' => 'required|file|image|mimes:jpeg,png,jpg,webp',
            ]);
     
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = $this->path;
            $file->move($tujuan_upload,$nama_file);
            
            $password = Hash::make($input['password']);
            
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => $password,
                'role' => 'vendor',
                'image' => $nama_file,
            ]);

            $result = $this->model->create([
                'code' => $input['code'],
                'user_id' => $user->id,
                'name' => $input['name'],
                'phone' => $input['phone'],
                'address' => $input['address'],
            ]);
    
            if($result){
                Alert::success('Create Success!', 'Success create data '.$this->title);
                return redirect()->route($this->route.'index');
            }
        } catch (DecryptException $e) {
            Alert::error('Create Failed!', 'Failed create data '.$this->title);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decryptID = Crypt::decryptString($id);
        $data = $this->model->find($decryptID)->update([
            'approve' => true,
        ]);
        Alert::success('Approve Success!', 'Successfully approved data '.$this->title);
        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decryptID = Crypt::decryptString($id);
        $data = $this->model->with('user')->find($decryptID);
        return view($this->view.'edit' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $input = $request->all();
            $lastData = $this->model->find($decryptID);
            $this->validate($request, [
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg',
            ]);
            $data = [
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'role' => 'vendor',
            ];
            $image = $this->handleImage($request);
            if ($image) {
                $data['image'] = $image;
            } else {
                unset($data['image']);
            }
            if ($request->password) {
                $data['password'] = Hash::make($input['password']);
            }
            User::find($lastData->user_id)->update($data);
            $this->model->find($decryptID)->update([
                'code' => $input['code'],
                'name' => $input['name'],
                'phone' => $input['phone'],
                'address' => $input['address'],
            ]);
            Alert::success('Update Success!', 'Successfully updated data '.$this->title);
            return redirect()->route($this->route.'index');
            
        } catch (DecryptException $e) {
            Alert::error('Update Failed!', 'Failed to update data '.$this->title);
            return back();
        }
    }

    private function handleImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move($this->path, $filename);
            return $filename;
        }
        return null;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $user = $this->model->find($decryptID);

            $deleteOrder = User::where('id' , @$user->user_id)->delete();
            
            $result = $this->model->find($decryptID)->delete();
            
            if ($result) {
                Alert::success('Delete Success!', 'Success delete data '.$this->title);
                return redirect()->route($this->route.'index');  
            } 

        } catch(DecryptException $e) {
            Alert::error('Delete Failed!', 'Failed Delete data '.$this->title);
            return back();
        }
    }
}
