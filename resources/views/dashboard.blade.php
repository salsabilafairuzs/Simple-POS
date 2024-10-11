@extends('template.template')
@section('konten')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="height: 150px;">
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-3 fw-semibold">Total Category</h5>
                                <h4 class="fw-semibold mb-3">{{ $countkategori }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-category-2 fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="height: 150px;">
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-3 fw-semibold">Jumlah Product</h5>
                                <h4 class="fw-semibold mb-3">{{ $countproduk }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-shopping-cart fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection