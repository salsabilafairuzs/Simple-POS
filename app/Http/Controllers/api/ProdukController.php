<?php

namespace App\Http\Controllers\api;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::get();
        return response()->json([
            'code'=>200,
            'message'=>'Data berhasil ditemukan',
            'data'=>$data
        ]);
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
    public function store(Request $request)
    {
        $cek = Validator::make($request->all(), [
            'produk' => ['required'],
            'kategori' => ['required'],
            'brand' => ['required'],
            'unit' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ],[
            'produk.required'=> 'Product Name Required !',
            'kategori.required'=> 'Category Name Required !',
            'brand.required'=> 'Brand Name Required !',
            'unit.required'=> 'Unit Required !',
            'deskripsi.required'=> 'Description required !',
            'foto.required' => 'Image required !',
            'foto.image' => 'File must be an image !',
            'foto.mimes' => 'File format must be jpeg, png, or jpg !',
            'foto.max' => 'Maximum file size is 2MB !',
        ]);

        if ($cek->fails()) {
            return response()->json([
                'code'=>404,
                'message'=>'Gagal menyimpan data!',
                'error'=>$cek
            ]);
        }else{
        $data = new Produk();
        $data->nama_produk = $request['produk'];
        $data->kategori_id = $request['kategori'];
        $data->nama_brand = $request['brand'];
        $data->unit = $request['unit'];
        $data->deskripsi = $request['deskripsi'];
        if ($request->file('gambar')->isValid()) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $path = $file->storeAs('gambar', $filename, 'public');
        }
        $data->gambar = $filename;
        $data->save();
        $data2 = Produk::get();
        return response()->json([
            'code'=>200,
            'message'=>'Berhasil Menyimpan Data',
            'data'=>$data2
        ]);
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
        $data = Produk::with(['kategori'])->find($id);

        // Check if any data was found
        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menampilkan data',
            'data' => $data
        ]);
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'produk' => ['required'],
            'kategori' => ['required'],
            'brand' => ['required'],
            'unit' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ], [
            'produk.required' => 'Product Name Required!',
            'kategori.required' => 'Category Name Required!',
            'brand.required' => 'Brand Name Required!',
            'unit.required' => 'Unit Required!',
            'deskripsi.required' => 'Description Required!',
            'gambar.image' => 'File must be an image!',
            'gambar.mimes' => 'File format must be jpeg, png, or jpg!',
            'gambar.max' => 'Maximum file size is 2MB!',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'code' => 404,
                'message' => 'Gagal menyimpan data!',
                'error' => $validator->errors()
            ]);
        }
    
        $data = Produk::find($id);
        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'Data tidak ditemukan!'
            ]);
        }
    
        $data->nama_produk = $request->input('produk');
        $data->kategori_id = $request->input('kategori');
        $data->nama_brand = $request->input('brand');
        $data->unit = $request->input('unit');
        $data->deskripsi = $request->input('deskripsi');
    
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('gambar', $filename, 'public');
            $data->gambar = $filename;
        }
    
        $data->save(); // Use save() to persist changes
    
        $data2 = Produk::all(); // Retrieve all data after update
    
        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menyimpan data',
            'data' => $data2
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return response()->json([
            'code'=>200,
            'message'=>'Berhasil menghapus data',
            'data'=>$data
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'produk' => 'required|string|max:255',
        ]);
    
        // Retrieve the search query from the request
        $produk = $request->input('produk');
    
        // Search for products that match the query
        $data = Produk::with(['kategori'])
            ->where('nama_produk', 'LIKE', '%' . $produk . '%')
            ->get();
    
        // Check if any data was found
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    
        return response()->json([
            'code' => 200,
            'message' => 'Data berhasil ditemukan',
            'data' => $data
        ]);
    }
}
