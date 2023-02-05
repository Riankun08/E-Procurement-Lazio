<?php

namespace App\Http\Controllers\Client;

use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDetail($id)
    {
        $decryptID = Crypt::decryptString($id);
        $data = Product::find($decryptID);
        $title = "Detail " . @$data->name;
        return view('client.detail.detail-product' , compact('data' , 'title'));
    }

    public function showPayOrder($id)
    {
        $decryptID = Crypt::decryptString($id);
        $order = Order::find($decryptID);
        $title = "Checkout"; 
        return view('client.detail.checkout' , compact('order' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $decryptID = Crypt::decryptString($id);
        $input = $request->all();

        if($input['quantity'] == "") {
            Alert::error('Mohon Maaf!', 'isi jumlah barang dengan benar');
            return back();
        }
            
            $product = Product::find($decryptID);
         if($input['quantity'] <= $product->quantity) {
            $resultQty = $product->quantity - $input['quantity'];
    
            $dataProduct = Product::find($decryptID)->update([
                'quantity' => $resultQty,
            ]);
        } else {
            Alert::error('Mohon Maaf!', 'Jumlah Barang kurang dari yang anda inginkan');
            return back();
        }
            
        $totalPrice = $product->price * $input['quantity'];

        $CreateOrder = Order::create([
           'productId' => $decryptID, 
           'userId' => auth('customer')->user()->id, 
           'quantity' => $input['quantity'], 
           'totalPrice' => $totalPrice,
           'shipping' => 7000,
        ]);

        $order = Order::find($CreateOrder->id);
        return redirect()->route('client.chekout.order' , Crypt::encryptString($order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkoutOrderSuccess(Request $request, $id)
    {
        $decryptID = Crypt::decryptString($id);
        $input = $request->all();

        $CreateOrder = Order::find($decryptID)->update([
            'name' => $input['name'], 
            'city' => $input['city'], 
            'district' => $input['district'], 
            'phone' => $input['phone'], 
            'email' => auth('customer')->user()->email, 
            'type' => 'online', 
            'address' => $input['address'],
            'payment' => $input['payment'],
        ]);

        if($input['payment'] == "COD") {
            $status = Order::find($decryptID)->update([
                'status' => 'packingOrder', 
            ]);
        } else {
            $status = Order::find($decryptID)->update([
                'status' => 'payOrder', 
            ]);
        }

        $order = Order::find($decryptID);
        return redirect()->route('client.page.success.order' , Crypt::encryptString($order->id));
    }

    public function OrderSuccess($id) 
    {
        $title = "Order Sukses";
        $decryptID = Crypt::decryptString($id);
        $order = Order::find($decryptID);
        return view('client.detail.success' , compact('order' , 'title'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
