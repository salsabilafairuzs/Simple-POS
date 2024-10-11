@extends('template.template')
@section('konten')
<style>
    /* Gaya untuk tabel */
    .table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #dee2e6;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        padding: 10px;
        text-align: center;
    }

    .table th {
        background-color: #f8f9fa;
    }
</style>
<div class="row">
    <div style="display: flex; justify-content: flex-end;">
        <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-3"
            style="margin-top: -10px; display: inline-flex; align-items: center;">
            <i class="ti ti-plus" style="font-size: 1.3rem; margin-right: 8px; height: 1.5rem; width: 1rem;"></i>
            <span class="fw-semibold">Add Category</span>
        </a>
    </div>
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Category Name List</h5>
                <p style="margin-top: -20px; font-size: 12px;">View/Search Category Name</p>
                <div class="mb-3 d-flex"> 
                    <div class="mb-3 d-flex"> 
                        <form action="{{ url('kategori/search') }}" method="post" class="d-flex"> 
                            @csrf
                            <div class="position-relative" style="width: 250px;"> 
                                <i class="ti ti-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%); font-size: 1rem;"></i> 
                                <input type="text" name="query" class="form-control ps-5" placeholder="Search..." aria-label="Search" style="width: 100%;">
                            </div>
                            <button type="submit" class="btn btn-primary ms-2 fw-semibold">Search</button> <!-- Tombol Search -->
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Category Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($kategori->isEmpty())
                                <tr>
                                    <td colspan="3">No matching records found</td>
                                </tr>
                            @else
                                @foreach ($kategori as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-normal mb-0">{{ $loop->iteration }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-normal mb-0">{{ $item->nama_kategori }}</h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <div>
                                            <a href="{{ route('kategori.show', $item->id) }}" class="text-dark me-2" title="View"><i class="ti ti-eye" style="font-size: 1.5rem;"></i>
                                            </a>
                                            <a href="{{ route('kategori.edit', $item->id) }}" class="text-primary me-2" title="Edit">
                                                <i class="ti ti-edit" style="font-size: 1.5rem;"></i>
                                            </a>
                                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-danger" title="Delete" style="border: none; background: none; padding: 0;">
                                                    <i class="ti ti-trash" style="font-size: 1.5rem;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection