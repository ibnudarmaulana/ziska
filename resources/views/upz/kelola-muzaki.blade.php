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
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body table-responsive">
                    <div class="card-title d-flex justify-content-between">
                        <h5>Tabel {{$title}}</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-plus-square-fill"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Nama Muzaki</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="nama_muzaki" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik nama muzaki
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="nik" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik NIK
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationServer04" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select is-invalid" id="validationServer04"
                                                    aria-describedby="validationServer04Feedback" name="jk_muzaki"
                                                    required>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan">perempuan</option>
                                                </select>
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    Mohon ketik jenis kelamin
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">No telp</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="no_telp_muzaki" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik no telp muzaki
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationCustom03" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="validationCustom03"
                                                    name="email_muzaki" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik email muzaki
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationCustom03" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="validationCustom03"
                                                    name="tgl_lahir_muzaki" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik email muzaki
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <th>
                                    Nama
                                </th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->tgl_lahir_muzaki}}</td>
                                <td>{{$item->nama_muzaki}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->alamat_muzaki}}</td>
                                <td>{{$item->jk_muzaki}}</td>
                                <td>{{$item->no_telp_muzaki}}</td>
                                <td>{{$item->email_muzaki}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->muzaki_id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->muzaki_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation"
                                                            action="{{url('upz/kelola-muzaki/'.$item->muzaki_id)}}"
                                                            method="POST" novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">Nama
                                                                    Muzaki</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="nama_muzaki"
                                                                    value="{{$item->nama_muzaki}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik nama muzaki
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03"
                                                                    class="form-label">NIK</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="nik"
                                                                    value="{{$item->nik}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik NIK
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationServer04" class="form-label">Jenis
                                                                    Kelamin</label>
                                                                <select class="form-select is-invalid"
                                                                    id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback"
                                                                    name="jk_muzaki" required>
                                                                    <option value="{{$item->jk_muzaki}}">
                                                                        {{$item->jk_muzaki}}</option>
                                                                    <option value="laki-laki">laki-laki</option>
                                                                    <option value="perempuan">perempuan</option>
                                                                </select>
                                                                <div id="validationServer04Feedback"
                                                                    class="invalid-feedback">
                                                                    Mohon ketik jenis kelamin
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">No
                                                                    telp</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="no_telp_muzaki"
                                                                    value="{{$item->no_telp_muzaki}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik no telp muzaki
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="validationCustom03" name="email_muzaki"
                                                                    value="{{$item->email_muzaki}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik email muzaki
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Tanggal Lahir</label>
                                                                <input type="date" class="form-control"
                                                                    id="validationCustom03" name="tgl_lahir_muzaki"
                                                                    value="{{$item->tgl_lahir_muzaki}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik email muzaki
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('upz/kelola-muzaki/'.$item->muzaki_id)}}" method="post"
                                            id="hapusmuzaki">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="btnmuzaki()"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function btnmuzaki() {
      Swal.fire({
          title: 'Konfirmasi',
          text: 'Apakah Anda yakin ingin menghapus ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('hapusmuzaki').submit();
          }
      });
      
  }
</script>
@endsection