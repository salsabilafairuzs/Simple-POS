@extends('template.template')
@section('konten')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add Category Name</h5>
            <form action="{{ url('kategori') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="nama_kategori">
                    <span class="text-danger">{{ $errors->first('nama_kategori') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/kategori" class="btn btn-danger ms-2">Back</a>
            </form>
        </div>
    </div>
@endsection
