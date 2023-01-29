<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public $view = 'admin.service.';
    public $route = 'admin.services.';
    public $title = 'Service';
    public $model;

     public function __construct(Service $model)
    {
        $this->model = $model;
        View::share('title', $this->title);
        View::share('route', $this->route);
        View::share('view', $this->view);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->model->all();
        return view($this->view.'index' , compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'create');
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
    
            if($request->hasFile('icon')){
                $filenameWithExt = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('icon')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;        
                $path = $request->file('icon')->storeAs('public/image-service', $filenameSimpan);  
            } else {
                Alert::error('Create Failed!', 'Failed create data '.$this->title);
                return back();
            }
    
            $result = $this->model->create([
                'name' => $input['name'],
                'icon' => $filenameSimpan,
                'description' => $input['description'],
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
    
            if($request->hasFile('icon')){
                $filenameWithExt = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('icon')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;        
                $path = $request->file('icon')->storeAs('public/image-service', $filenameSimpan);  
                
                $result = $this->model->find($decryptID)->update([
                    'name' => $input['name'],
                    'icon' => $filenameSimpan,
                    'description' => $input['description'],
                ]);

            } else {
                $result = $this->model->find($decryptID)->update([
                    'name' => $input['name'],
                    'description' => $input['description'],
                ]);
            }
    
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
