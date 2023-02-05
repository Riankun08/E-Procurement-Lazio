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
use App\Models\News;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Beranda";
        $testimonial = Testimonial::where('status' , 'publish')->get();
        $product = Product::where('status' , 'publish')->get();
        $news = News::paginate(3);
        return view('client.index' , compact('product' , 'testimonial' , 'title' , 'news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $title = "Tentang Kami";
        return view('client.about' , compact('title'));
    }

    public function news()
    {
        $news = News::all();
        $title = "Berita";
        return view('client.news' , compact('title' , 'news'));
    }

    public function product()
    {
        $product = Product::where('status' , 'publish')->get();
        $title = "Produk";
        return view('client.product' , compact('title' , 'product'));
    }

    public function contact()
    {
        $title = "Kontak";
        return view('client.contact' , compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {
        try {
            $input = $request->all();
            $result = Comment::create([
                'userId' => null,
                'name' => $input['name'],
                'subject' => $input['subject'],
                'status' => 'hold',
                'message' => $input['message'],
                'emot' => $input['emot'],
                'date' => Carbon::now('Asia/Jakarta')
            ]);
            if($result){
                Alert::success('Pesan Terkirim!', 'Pesan terkirim dan admin akan memvalidasi pesan anda');
                return back();
            }
        } catch (DecryptException $e) {
            Alert::error('Mohon Maaf', 'Pesan anda gagal terkirim');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function questionShow($id)
    {
        $decryptID = Crypt::decryptString($id);
        $consultation = Consultation::all();
        $data = Consultation::find($decryptID);
        return view('client.detail.questionDetail' , compact('data' , 'consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
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
