<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Order;
use App\Models\Color;
use App\Models\Size;
use App\Models\User;

class OrderController extends Controller
{
    public $view = 'admin.order.';
    public $route = 'admin.orders.';
    public $title = 'Order ';
    public $model;
    protected $path = 'image-save/image-order/';

     public function __construct(Order $model)
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
            $color = Color::all();
            $size = Size::all();
            $product = Product::all();
            $customer = User::where('role' , 'customer')->get();
            return view($this->view.'create' , compact('size' , 'product' , 'customer' , 'color'));
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
                'evidence' => 'file|image|mimes:jpeg,png,jpg',
            ]);
            
            $productInput = Product::find($input['productId']);
            if($input['quantity'] <= $productInput->quantity) {
                $resultQty = $productInput->quantity - $input['quantity']; 
                $updateProduct =  Product::find($input['productId'])->update([
                    'quantity' => $resultQty,
                ]);
            } else {
                Alert::error('Mohon Maaf!', 'Jumlah Barang kurang dari yang anda inginkan');
                return back();
            }

            $totalPrice = $productInput->price * $input['quantity'];

            if ($request->file('evidence')) {
                $file = $request->file('evidence');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = $this->path;
                $file->move($tujuan_upload,$nama_file);
                
                $result = $this->model->create([
                    'productId' => $input['productId'],
                    'sizeId' => $input['sizeId'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'city' => $input['city'],
                    'district' => $input['district'],
                    'address' => $input['address'],
                    'payment' => $input['payment'],
                    'status' => $input['status'],
                    'totalPrice' => $totalPrice,
                    'quantity' => $input['quantity'],
                    'evidence' => $nama_file,
                ]);
            } else {
                $result = $this->model->create([
                    'productId' => $input['productId'],
                    'sizeId' => $input['sizeId'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'city' => $input['city'],
                    'district' => $input['district'],
                    'address' => $input['address'],
                    'payment' => $input['payment'],
                    'totalPrice' => $totalPrice,
                    'status' => $input['status'],
                    'quantity' => $input['quantity'],
                ]);
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
        $color = Color::all();
        $size = Size::all();
        $product = Product::all();
        $customer = User::where('role' , 'customer')->get();
        $data = $this->model->find($decryptID);
        return view($this->view.'detail' , compact('data' , 'size' , 'product' , 'customer' , 'color'));
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
        $color = Color::all();
        $size = Size::all();
        $product = Product::all();
        $customer = User::where('role' , 'customer')->get();
        $data = $this->model->find($decryptID);
        return view($this->view.'edit' , compact('data' , 'size' , 'product' , 'customer' , 'color'));
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
    
            if ($request->file('evidence')) {
                $file = $request->file('evidence');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = $this->path;
                $file->move($tujuan_upload,$nama_file);
                
                $result = $this->model->find($decryptID)->update([
                    'productId' => $input['productId'],
                    'sizeId' => $input['sizeId'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'city' => $input['city'],
                    'district' => $input['district'],
                    'address' => $input['address'],
                    'payment' => $input['payment'],
                    'status' => $input['status'],
                    'quantity' => $input['quantity'],
                    'evidence' => $nama_file,
                ]);
            } else {
                $result = $this->model->find($decryptID)->update([
                    'productId' => $input['productId'],
                    'sizeId' => $input['sizeId'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'city' => $input['city'],
                    'district' => $input['district'],
                    'address' => $input['address'],
                    'payment' => $input['payment'],
                    'status' => $input['status'],
                    'quantity' => $input['quantity'],
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
