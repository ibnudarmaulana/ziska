@extends('layouts.app')
@section('main')
@if(session('success'))
<script>
    Swal.fire({
        title: 'success',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
<section class="section dashboard">
    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Muzaki <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill-add"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$muzaki}}</h6>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Mustahiq <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill-dash"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$mustahiq}}</h6>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">UPZ <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$upz}}</h6>

                        </div>
                    </div>

                </div>
            </div>

        </div><!-- End Customers Card -->

        <!-- Recent Sales -->


    </div>
</section>
@endsection