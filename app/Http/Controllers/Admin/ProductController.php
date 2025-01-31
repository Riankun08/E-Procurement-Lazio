<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Vendor;

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
            $vendor = Vendor::where('user_id', auth()->user()->id)->first();
            if ($vendor) {
                $datas = $this->model->where('vendor_id', $vendor->id)->with('vendor')->get();
            } else {
                $datas = $this->model->with('vendor')->get();
            }
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
            $vendor = Vendor::where('approve', true)->get();
            $category = [
                "Barang Konsumsi",
                "Bahan Makanan dan Minuman",
                "Alat Tulis Kantor",
                "Peralatan Kebersihan",
                "Perlengkapan Kesehatan",
                "Barang Elektronik",
                "Komputer dan Aksesori",
                "Perangkat Jaringan",
                "Alat Pengukur dan Pengendali",
                "Peralatan Kantor",
                "Meja dan Kursi Kantor",
                "Lemari Arsip",
                "Peralatan Presentasi",
                "Alat Keamanan Kantor",
                "Jasa Konstruksi",
                "Pembangunan Gedung dan Infrastruktur",
                "Renovasi dan Pemeliharaan",
                "Penyediaan Material Konstruksi",
                "Jasa Profesional",
                "Konsultan IT",
                "Lainnya",
            ];
            return view($this->view.'create', compact('vendor', 'category'));
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

            $result = $this->model->create([
                'vendor_id' => $input['vendor_id'],
                'name' => $input['name'],
                'price' => $input['price'],
                'image' => $nama_file,
                'quantity' => $input['quantity'],
                'status' => $input['status'],
                'category' => $input['category'],
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
        $vendor = Vendor::where('approve', true)->get();
        $category = [
            "Barang Konsumsi",
            "Bahan Makanan dan Minuman",
            "Alat Tulis Kantor",
            "Peralatan Kebersihan",
            "Perlengkapan Kesehatan",
            "Barang Elektronik",
            "Komputer dan Aksesori",
            "Perangkat Jaringan",
            "Alat Pengukur dan Pengendali",
            "Peralatan Kantor",
            "Meja dan Kursi Kantor",
            "Lemari Arsip",
            "Peralatan Presentasi",
            "Alat Keamanan Kantor",
            "Jasa Konstruksi",
            "Pembangunan Gedung dan Infrastruktur",
            "Renovasi dan Pemeliharaan",
            "Penyediaan Material Konstruksi",
            "Jasa Profesional",
            "Konsultan IT",
            "Lainnya",
        ];
        return view($this->view.'detail' , compact('data', 'vendor', 'category'));
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
        $vendor = Vendor::where('approve', true)->get();
        $category = [
            "Barang Konsumsi",
            "Bahan Makanan dan Minuman",
            "Alat Tulis Kantor",
            "Peralatan Kebersihan",
            "Perlengkapan Kesehatan",
            "Barang Elektronik",
            "Komputer dan Aksesori",
            "Perangkat Jaringan",
            "Alat Pengukur dan Pengendali",
            "Peralatan Kantor",
            "Meja dan Kursi Kantor",
            "Lemari Arsip",
            "Peralatan Presentasi",
            "Alat Keamanan Kantor",
            "Jasa Konstruksi",
            "Pembangunan Gedung dan Infrastruktur",
            "Renovasi dan Pemeliharaan",
            "Penyediaan Material Konstruksi",
            "Jasa Profesional",
            "Konsultan IT",
            "Lainnya",
        ];
        return view($this->view.'edit' , compact('data', 'vendor', 'category'));
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
    
            // $this->validate($request, [
            //     'image' => 'required|file|image|mimes:jpeg,png,jpg,webp',
            // ]);
     
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = $this->path;
                $file->move($tujuan_upload,$nama_file);
    
                $result = $this->model->find($decryptID)->update([
                    'vendor_id' => $input['vendor_id'],
                    'name' => $input['name'],
                    'price' => $input['price'],
                    'image' => $nama_file,
                    'quantity' => $input['quantity'],
                    'status' => $input['status'],
                    'category' => $input['category'],
                    'description' => $input['description'],
                ]);
            } else {
                $result = $this->model->find($decryptID)->update([
                    'vendor_id' => $input['vendor_id'],
                    'name' => $input['name'],
                    'price' => $input['price'],
                    'quantity' => $input['quantity'],
                    'status' => $input['status'],
                    'category' => $input['category'],
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
