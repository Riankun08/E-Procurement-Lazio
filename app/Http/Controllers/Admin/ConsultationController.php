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
use App\Models\Consultation;
use App\Models\Category;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    public $view = 'admin.consultation.';
    public $route = 'admin.consultations.';
    public $title = 'Konsultasi';
    public $model;

     public function __construct(Consultation $model)
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
            $category = Category::all();
            return view($this->view.'create' , compact('category'));
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

            if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;        
                $path = $request->file('image')->storeAs('public/image-kategori', $filenameSimpan);  
            } else {
                Alert::error('Create Failed!', 'Failed create data '.$this->title);
                return back();
            }
    
            $result = $this->model->create([
                'question' => $input['question'],
                'categoryId' => $input['categoryId'],
                'image' => $filenameSimpan,
                'answer' => $input['answer'],
                'date' => Carbon::now()
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
        $category = Category::all();
        $decryptID = Crypt::decryptString($id);
        $data = $this->model->find($decryptID);
        return view($this->view.'detail' , compact('data' , 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $decryptID = Crypt::decryptString($id);
        $data = $this->model->find($decryptID);
        return view($this->view.'edit' , compact('data' , 'category'));
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
    
            if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;        
                $path = $request->file('image')->storeAs('public/image-kategori', $filenameSimpan);  
                
                $result = $this->model->find($decryptID)->update([
                    'image' => $filenameSimpan,
                    'question' => $input['question'],
                    'categoryId' => $input['categoryId'],
                    'answer' => $input['answer'],
                    'date' => Carbon::now()
                ]);

            } else {
                $result = $this->model->find($decryptID)->update([
                    'question' => $input['question'],
                    'categoryId' => $input['categoryId'],
                    'answer' => $input['answer'],
                    'date' => Carbon::now()
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
