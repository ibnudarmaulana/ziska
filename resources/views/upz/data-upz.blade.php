@extends('layouts.app')
@section('main')
@if(session('profil'))
<script>
    Swal.fire({
        title: 'Profil',
        text: '{{ session('profil') }}',
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif
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
<section class="section">
    <div class="card">
        <h5 class="card-header">Data {{Auth::user()->username}}</h5>
        <div class="card-body">
            <form class="row g-3 needs-validation" method="POST" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="validationCustom03" name="nama_upz"
                        value="{{ optional($data)->nama_upz }}" required>
                    <div class="invalid-feedback">
                        Mohon ketik nama
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="validationCustom03" name="no_telp_upz"
                        value="{{ optional($data)->no_telp_upz }}" required>
                    <div class="invalid-feedback">
                        Mohon ketik alamat
                    </div>
                </div>
                <div class="">
                    <label for="validationCustom03" class="form-label">Alamat (Kecamatan)</label>
                    <input type="text" class="form-control" id="validationCustom03" name="alamat_upz"
                        value="{{ optional($data)->alamat }}" required>
                    <div class="invalid-feedback">
                        Mohon ketik alamat
                    </div>
                </div>
                <div class="col-12">
                    @if (!$data)
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
@endsection