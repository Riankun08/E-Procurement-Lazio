<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\ColorProduct;
use App\Models\SizeProduct;
use App\Models\Product;
use App\Models\Color;
use App\Models\Order;
use App\Models\Size;

class ProductController extends Controller
{
    public $view = 'admin.product.';
    public $route = 'admin.products.';
    public $title = 'Produk ';
    public $model;
    protected $path = 'image-save/image-product/';

     public function __construct(Product $model)
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
            $size = Size::all();
            $color = Color::all();
            return view($this->view.'create' , compact('size' , 'color'));
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
                'price' => $input['price'],
                'brand' => $input['brand'],
                'image' => $nama_file,
                'quantity' => $input['quantity'],
                'status' => $input['status'],
                'remainingQuantity' => $input['quantity'],
                'categories' => $input['categories'],
                'description' => $input['description'],
            ]);

            if($input['sizeId']) {
                foreach ($input['sizeId'] as $value) {
                    $inputSize['productId'] = $result->id; 
                    $inputSize['sizeId'] = $value; 
                    $resultSize = SizeProduct::create($inputSize);
                }
            }

            if($input['colorId']) {
                foreach ($input['colorId'] as $value) {
                    $inputSize['productId'] = $result->id; 
                    $inputSize['colorId'] = $value; 
                    $resultSize = ColorProduct::create($inputSize);
                }
            }
    
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
        $size = Size::all();
        $color = Color::all();
        $data = $this->model->with('sizeProduct')->find($decryptID);
        return view($this->view.'detail' , compact('data' , 'size' , 'color'));
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
        $size = Size::all();
        $color = Color::all();
        $data = $this->model->with('sizeProduct')->find($decryptID);
        return view($this->view.'edit' , compact('data' , 'size' , 'color'));
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
                'price' => $input['price'],
                'brand' => $input['brand'],
                'image' => $nama_file,
                'quantity' => $input['quantity'],
                'status' => $input['status'],
                'remainingQuantity' => $input['quantity'],
                'categories' => $input['categories'],
                'description' => $input['description'],
            ]);

            if($input['sizeId']) {
                $deleteSize = SizeProduct::where('productId' , $decryptID)->delete();
                foreach ($input['sizeId'] as $value) {
                    $inputSize['productId'] = $decryptID; 
                    $inputSize['sizeId'] = $value; 
                    $resultSize = SizeProduct::create($inputSize);
                }
            }

            if($input['colorId']) {
                foreach ($input['colorId'] as $value) {
                    $inputSize['productId'] = $decryptID; 
                    $inputSize['colorId'] = $value; 
                    $resultSize = ColorProduct::create($inputSize);
                }
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

            $deleteSize = SizeProduct::where('productId' , @$user->productId)->delete();
            $deleteColor = ColorProduct::where('productId' , @$user->productId)->delete();
            $deleteOrder = Order::where('productId' , @$user->productId)->delete();
            
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
