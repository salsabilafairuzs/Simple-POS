@extends('template.template')
@section('konten')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
            <form action="{{ route('produk.update', $produk->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="produk" required value="{{ $produk->nama_produk }}">
                    <span class="text-danger">{{ $errors->first('produk') }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <select name="kategori" class="form-control">
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('kategori') }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand Name</label>
                    <input type="text" class="form-control" name="brand" required value="{{ $produk->nama_brand }}">
                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="deskripsi" require value="{{ $produk->deskripsi }}"d>
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="gambar" required value="{{ $produk->gambar}}">
                    <span class="text-danger">{{ $errors->first('gambar') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/produk" class="btn btn-danger ms-2">Cancel</a>
            </form>
        </div>
    </div>
@endsection
