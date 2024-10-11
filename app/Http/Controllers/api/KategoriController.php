<?php

namespace App\Http\Controllers\api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Kategori::get();
        return response()->json([
            'code'=>200,
            'message'=>'Data Berhasil di Temukan',
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
            'nama_kategori' => ['required', 'unique:kategoris'],

        ],[
            'nama_kategori.required'=> 'Category Name Required !',
            'nama_kategori.unique' => 'Category Name already exists !',
        ]);

        if ($cek->fails()) {
            return response()->json([
                'code'=>404,
                'message'=>'Gagal Menyimpan Data!',
                'error'=>$cek
            ]);
        }else{
        $data = new Kategori();
        $data->nama_kategori = $request['nama_kategori'];
        $data->save();
        $data2 = Kategori::get();
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
        $data = Kategori::find($id);

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
    public function update(Request $request, $kategori)
    {
        $cek = Validator::make($request->all(), [
            'nama_kategori' => ['required'],
    
        ],[
            'nama_kategori.required' => 'Category Name Required !',
        ]);

        if ($cek->fails()) {
            return response()->json([
                'code'=>404,
                'message'=>'Update Data Gagal!',
                'error'=>$cek
            ]);
        }else{
        $data = Kategori::where('id', $kategori)->first();
        $data->nama_kategori = $request['nama_kategori'];
        $data->update();
        $data2 = Kategori::get();
        return response()->json([
            'code'=>200,
            'message'=>'Update Data Berhasil',
            'data'=>$data2
        ]);
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
        return response()->json([
            'code'=>200,
            'message'=>'Berhasil Menghapus Data',
            'data'=>$data
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);
    
        // Retrieve the search query from the request
        $kategori = $request->input('kategori');
    
        // Search for products that match the query
        $data = Kategori::where('nama_kategori', 'LIKE', '%' . $kategori . '%')
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
