<?php

namespace App\Http\Controllers\Client;

use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    protected $path = 'image-save/image-user/';
    protected $pathOrder = 'image-save/image-order/';
    protected $pathTestimonial = 'image-save/image-testimonial/';

    public function __construct(Order $model)
    {
        View::share('path', $this->path);
        View::share('pathOrder', $this->pathOrder);
        View::share('pathTestimonial', $this->pathTestimonial);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $decryptID = Crypt::decryptString($id);
        $orderUser = Order::where('userId' , $decryptID)->get(); 
        return view('client.profile.index' , compact('orderUser'));
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
    public function storePaymentCustomer(Request $request, $id)
    {
        try { 
            $decryptID = Crypt::decryptString($id);
 
            $this->validate($request, [
                'evidence' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);

            $input = $request->all();
    
            $file = $request->file('evidence');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = $this->pathOrder;
            $file->move($tujuan_upload,$nama_file);

            $result = Order::find($decryptID)->update([
                'evidence' => $nama_file,  
                'status' => 'paidOrder',  
            ]);

            if($result){
                Alert::success('Pembayaran berhasil!', 'Terimakasih Pesanan anda akan segera dikirim');
                return back();
            }

            Alert::error('Mohon Maaf!', 'Pembayaran Gagal silahkan kakukan kembali');
            return back();

        } catch (DecryptException $e) {
            Alert::error('Maaf gagal!', 'sistem gagal');
            return back();
        }
    }

    public function statusConfrmCustomer(Request $request, $id)
    {
        try { 
            $decryptID = Crypt::decryptString($id);

            $input = $request->all();

            $result = Order::find($decryptID)->update([
                'status' => 'successOrder',  
            ]);

            if($result){
                Alert::success('Terimakasih! '. auth('customer')->user()->name , 'Terimakasih Atas konfirmasi Barang Anda');
                return back();
            }

            Alert::error('Mohon Maaf!', 'Konfirmasi Gagal');
            return back();

        } catch (DecryptException $e) {
            Alert::error('Maaf gagal!', 'sistem gagal');
            return back();
        }
    }

    public function statusCommentCustomer(Request $request, $id)
    {
        try { 
            $decryptID = Crypt::decryptString($id);

            $this->validate($request, [
                'image' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);

            $input = $request->all();

            $productOrder = Order::find($decryptID);
                
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = $this->pathTestimonial;
            $file->move($tujuan_upload,$nama_file);

            $result = Testimonial::create([
                'name' => auth('customer')->user()->name,  
                'division' => 'customer',  
                'userId' => auth('customer')->user()->id,  
                'orderId' => $decryptID,  
                'productId' => $productOrder->product->id,  
                'status' => 'hold',  
                'datePost' => Carbon::now(),  
                'image' => $nama_file,  
                'message' => $input['message'],  
            ]);

            if($result){
                Alert::success('Terimakasih! '. auth('customer')->user()->name , 'Terimakasih Atas Komentar Anda, komentar anda akan di validasi oleh admin');
                return back();
            }

            Alert::error('Mohon Maaf!', 'komentar Gagal');
            return back();

        } catch (DecryptException $e) {
            Alert::error('Maaf gagal!', 'sistem gagal');
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
    public function updateProfile(Request $request, $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
                $input = $request->all();
                if($request->file('image')) {
                    $this->validate($request, [
                        'image' => 'required|file|image|mimes:jpeg,png,jpg',
                    ]);
            
                    $file = $request->file('image');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = $this->path;
                    $file->move($tujuan_upload,$nama_file);
            
                    $passwordHash = @$input['passwordtugas'];
                    $result = User::find($decryptID)->update([
                        'email' => $input['email'],
                        'name' => $input['name'],
                        'gender' => $input['gender'],
                        'phone' => $input['phone'],
                        'image' => $nama_file,
                        'password' => Hash::make($passwordHash),
                    ]);
                } 

            $result = User::find($decryptID)->update([
                'email' => $input['email'],
                'name' => $input['name'],
                'gender' => $input['gender'],
                'phone' => $input['phone'],
                'password' => Hash::make($passwordHash),
            ]);
                
            if($result){
                Alert::success('Selamat Berhasil!', 'Anda telah berhasil mengupdate profile anda');
                return back();
            }
   
            Alert::error('Mohon Maaf!', 'Anda telah gagal mengupdate profile anda');
            return back();
        } catch (DecryptException $e) {
            Alert::error('Mohon Maaf!', 'Anda telah gagal mengupdate profile anda');
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
        //
    }
}
