<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Vendor;

class UserConttroller extends Controller
{
    public $view = 'admin.user.';
    public $route = 'admin.users.';
    public $title = 'user';
    public $model;
    protected $path = 'image-save/image-user/';

     public function __construct(User $model)
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
                'image' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = $this->path;
            $file->move($tujuan_upload,$nama_file);
            $result = $this->model->create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'role' => $input['role'],
                'status' => $input['status'],
                'gender' => $input['gender'],
                'image' => $nama_file,
                'password' => Hash::make($input['password']),
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
        $data = $this->model->find($decryptID);
        return view($this->view.'detail' , compact('data'));
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
        $data = $this->model->find($decryptID);
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
            $this->validate($request, [
                'image' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
     
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = $this->path;
            $file->move($tujuan_upload,$nama_file);

            $result = $this->model->find($decryptID)->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'role' => $input['role'],
                'status' => $input['status'],
                'gender' => $input['gender'],
                'image' => $nama_file,
                'password' => Hash::make($input['password']),
            ]);
    
            if($result){
                Alert::success('Update Success!', 'Success Update data '.$this->title);
                return redirect()->route($this->route.'index');
            }
        } catch (DecryptException $e) {
            Alert::error('Update Failed!', 'Failed Update data '.$this->title);
            return back();
        }
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
            $result = $this->model->find($decryptID)->forceDelete();

            $vendor = Vendor::where('user_id' , $user->id)->forceDelete();
            
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