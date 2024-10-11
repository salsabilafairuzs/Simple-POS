<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kategori']=Kategori::get();
        return view('kategori.kategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.tambah');
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
            'nama_kategori' => ['required', 'unique:kategoris'],

        ],[
            'nama_kategori.required'=> 'Category Name Required !',
            'nama_kategori.unique' => 'Category Name already exists !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
        $data = new Kategori();
        $data->nama_kategori = $request['nama_kategori'];
        $data->save();
        return redirect('kategori');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori)
    {
        $data['kategori'] = Kategori::where('id', $kategori)->first();
        return view('kategori.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori)
    {
        $data['kategori'] = Kategori::where('id', $kategori)->first();
        return view('kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori)
    {
        $cek = Validator::make($request->all(), [
            'nama_kategori' => ['required'],
    
        ],[
            'nama_kategori.required' => 'Category Name Required !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
        $data = Kategori::where('id', $kategori)->first();
        $data->nama_kategori = $request['nama_kategori'];
        $data->update();

        return redirect('kategori');
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
        $data = Kategori::findOrFail($id);
        $data->delete();
        return redirect('kategori');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $kategori = Kategori::where('nama_kategori', 'LIKE', "%{$query}%")->get();

        return view('kategori.kategori', compact('kategori'));
    }

}
