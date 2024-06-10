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
                                                <label for="validationCustom03" class="form-label">Nama Mustahiq</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="nama_mustahiq" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik nama mustahiq
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
                                                    aria-describedby="validationServer04Feedback" name="jk_mustahiq"
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
                                                    name="no_telp_mustahiq" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik no telp mustahiq
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="validationCustom03"
                                                    name="email_mustahiq" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik email mustahiq
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationCustom03" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="validationCustom03"
                                                    name="tgl_lahir_mustahiq" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik tanggal lahir
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationServer04" class="form-label">Status
                                                    Mustahiq</label>
                                                <select class="form-select is-invalid" id="validationServer04"
                                                    aria-describedby="validationServer04Feedback" name="status_mustahiq"
                                                    required>
                                                    <option value="menikah">menikah</option>
                                                    <option value="lajang">lajang</option>
                                                    <option value="cerai">cerai</option>
                                                </select>
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    Mohon ketik status mustahiq
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationCustom03" class="form-label">Jumlah Anggota
                                                    Keluarga</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="jml_anggota_keluarga" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik jumlah anggota keluarga
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationTextarea" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="validationTextarea"
                                                    name="alamat_mustahiq" maxlength="30" required></textarea>
                                                <div class="invalid-feedback">
                                                    Mohon ketik alamat
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
                                <th>Status</th>
                                <th>Anggota Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->tgl_lahir_mustahiq}}</td>
                                <td>{{$item->nama_mustahiq}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->alamat_mustahiq}}</td>
                                <td>{{$item->jk_mustahiq}}</td>
                                <td>{{$item->no_telp_mustahiq}}</td>
                                <td>{{$item->email_mustahiq}}</td>
                                <td>{{$item->status_mustahiq}}</td>
                                <td>{{$item->jml_anggota_keluarga}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->mustahiq_id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->mustahiq_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation" action="{{url('admin/kelola-mustahiq/'.$item->mustahiq_id)}}" method="POST"
                                                            novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">Nama
                                                                    Mustahiq</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="nama_mustahiq"
                                                                    value="{{$item->nama_mustahiq}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik nama mustahiq
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">NIK</label>
                                                                <input type="text" class="form-control" id="validationCustom03"
                                                                    name="nik" value="{{$item->nik}}" required>
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
                                                                    name="jk_mustahiq" required>
                                                                    <option value="{{$item->jk_mustahiq}}">
                                                                        {{$item->jk_mustahiq}}</option>
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
                                                                    id="validationCustom03" name="no_telp_mustahiq"
                                                                    value="{{$item->no_telp_mustahiq}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik no telp mustahiq
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="validationCustom03" name="email_mustahiq"
                                                                    value="{{$item->email_mustahiq}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik email mustahiq
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Tanggal Lahir</label>
                                                                <input type="date" class="form-control"
                                                                    id="validationCustom03" name="tgl_lahir_mustahiq"
                                                                    value="{{$item->tgl_lahir_mustahiq}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik tanggal lahir
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationServer04" class="form-label">Status
                                                                    Mustahiq</label>
                                                                <select class="form-select is-invalid" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback" name="status_mustahiq"
                                                                    required>
                                                                    <option value="{{$item->status_mustahiq}}">{{$item->status_mustahiq}}</option>
                                                                    <option value="menikah">menikah</option>
                                                                    <option value="lajang">lajang</option>
                                                                    <option value="cerai">cerai</option>
                                                                </select>
                                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                                    Mohon ketik status mustahiq
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Jumlah Anggota Keluarga</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="jml_anggota_keluarga"
                                                                    value="{{$item->jml_anggota_keluarga}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik jumlah anggota keluarga
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="validationTextarea"
                                                                    class="form-label">Alamat</label>
                                                                <textarea class="form-control" id="validationTextarea"
                                                                    name="alamat_mustahiq" maxlength="30"
                                                                    required>{{$item->alamat_mustahiq}}</textarea>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik alamat
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('admin/kelola-mustahiq/'.$item->mustahiq_id)}}" method="post"
                                            id="hapusmustahiq">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="btnmustahiq()"><i
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
    function btnmustahiq() {
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
              document.getElementById('hapusmustahiq').submit();
          }
      });
      
  }
</script>
@endsection