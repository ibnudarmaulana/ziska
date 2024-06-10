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
                                        <form class="row g-3 needs-validation" action="{{url('admin/kelola-pengguna')}}"
                                            method="POST" novalidate>
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    name="username" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik username
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="validationCustom03"
                                                    name="password" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik password
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
                                <th>
                                    Nama
                                </th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ optional($item->dataupz)->nama_upz }}</td>
                                <td>{{ optional($item->dataupz)->alamat }}</td>
                                <td>{{ optional($item->dataupz)->no_telp_upz }}</td>
                                <td>@if ($item->dataupz != null)
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->dataupz->upz_id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->dataupz->upz_id}}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation"
                                                            action="{{url('admin/kelola-upz/'.$item->dataupz->upz_id)}}"
                                                            method="POST" novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">Nama
                                                                    Upz</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="nama_upz"
                                                                    value="{{$item->dataupz->nama_upz}}" maxlength="16"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik nama upz
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">No
                                                                    Telp</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom03" name="no_telp_upz"
                                                                    value="{{$item->dataupz->no_telp_upz}}"
                                                                    maxlength="13" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik no telp
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="validationTextarea"
                                                                    class="form-label">Alamat</label>
                                                                <textarea class="form-control" id="validationTextarea"
                                                                    name="alamat" maxlength="30"
                                                                    required>{{$item->dataupz->alamat}}</textarea>
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
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->user_id}}">
                                            <i class="bi bi-key-fill"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->user_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti
                                                            Password</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation"
                                                            action="{{url('admin/kelola-pengguna/'.$item->user_id)}}"
                                                            method="POST" novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div>
                                                                <label for="validationCustom03"
                                                                    class="form-label">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="validationCustom03" name="password" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik password
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('admin/kelola-pengguna/'.$item->user_id)}}" method="post"
                                            id="hapuspengguna">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="button"
                                                onclick="btnpengguna()"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </div>
                                    @endif
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
    function btnpengguna() {
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
              document.getElementById('hapuspengguna').submit();
          }
      });
      
  }
</script>
@endsection