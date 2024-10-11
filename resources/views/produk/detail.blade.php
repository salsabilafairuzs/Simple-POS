@extends('template.template')
@section('konten')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Product Details</h5>
            <p style="margin-top: -20px; font-size: 12px;">Full details of a product</p>
            <div class="d-flex">
                <div class="col-md-6">
                    <table class="table table-striped mt-3"> 
                        <tbody>
                            <tr>
                                <th>Product</th>
                                <td>{{ $produk->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $produk->kategori->nama_kategori}}</td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td>{{ $produk->nama_brand }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $produk->deskripsi }}</td>
                            </tr>
                        </tbody>
                    </table>
                <a href="/produk" class="btn btn-danger ms-2">Back</a>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/gambar/'.$produk->gambar) }}" width="70%" alt="MacBook Pro" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection