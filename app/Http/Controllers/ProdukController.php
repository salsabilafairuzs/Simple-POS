<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['produk']=Produk::with(['kategori'])->get();
        // return $data;
        return view('produk.produk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori']=Kategori::get();
        return view('produk.tambah', $data);
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
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ],[
            'produk.required'=> 'Product Name Required !',
            'kategori.required'=> 'Category Name Required !',
            'brand.required'=> 'Brand Name Required !',
            'deskripsi.required'=> 'Description required !',
            'gambar.required' => 'Image required !',
            'gambar.image' => 'File must be an image !',
            'gambar.mimes' => 'File format must be jpeg, png, or jpg !',
            'gambar.max' => 'Maximum file size is 2MB !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
        $data = new Produk();
        $data->nama_produk = $request['produk'];
        $data->kategori_id = $request['kategori'];
        $data->nama_brand = $request['brand'];
        $data->deskripsi = $request['deskripsi'];
        if ($request->file('gambar')->isValid()) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $path = $file->storeAs('gambar', $filename, 'public');
        }
        $data->gambar = $filename;
        $data->save();
        return redirect('produk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($produk)
    {
        $data['produk'] = Produk::where('id', $produk)
        ->with(['kategori'])
        ->first();
        return view('produk.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($produk)
    {
        $data['produk'] = Produk::where('id', $produk)->first();
        $data['kategori'] = Kategori::get();
        
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produk)
    {
        $cek = Validator::make($request->all(), [
            'produk' => ['required'],
            'kategori' => ['required'],
            'brand' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ],[
            'produk.required'=> 'Product Name Required !',
            'kategori.required'=> 'Category Name Required !',
            'brand.required'=> 'Brand Name Required !',
            'deskripsi.required'=> 'Description required !',
            'gambar.required' => 'Image required !',
            'gambar.image' => 'File must be an image !',
            'gambar.mimes' => 'File format must be jpeg, png, or jpg !',
            'gambar.max' => 'Maximum file size is 2MB !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
        $data = Produk::where('id', $produk)->first();
        $data->nama_produk = $request['produk'];
        $data->kategori_id = $request['kategori'];
        $data->nama_brand = $request['brand'];
        $data->deskripsi = $request['deskripsi'];
        if ($request->file('gambar')->isValid()) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $path = $file->storeAs('gambar', $filename, 'public');
        }
        $data->gambar = $filename;
        $data->update();

        return redirect('produk');
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
        $data = Produk::findOrFail($id);
        if ($data->gambar) {
            Storage::delete('public/gambar/' . $data->gambar);
        }    
        $data->delete();
        return redirect('produk');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $produk = Produk::where('nama_produk', 'LIKE', "%{$query}%")->get();

        return view('produk.produk', compact('produk'));
    }
}