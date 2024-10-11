@extends('template.template')
@section('konten')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Category Name Details</h5>
            <p style="margin-top: -20px; font-size: 12px;">Details of category name</p>
            <div class="d-flex">
                <div class="col-md-6">
                    <table class="table table-striped mt-3"> 
                        <tbody>
                            <tr>
                                <th>Category name</th>
                                <td>{{ $kategori->nama_kategori}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="/kategori" class="btn btn-danger ms-2">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection