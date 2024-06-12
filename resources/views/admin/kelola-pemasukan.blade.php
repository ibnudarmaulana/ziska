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
                                                <label for="validationServer04" class="form-label">Nama Muzaki</label>
                                                <select class="form-select " id="validationServer04"
                                                    aria-describedby="validationServer04Feedback" name="muzaki_id"
                                                    required>
                                                    @foreach ($muzaki as $item)
                                                    <option value="{{$item->muzaki_id}}">{{$item->nama_muzaki}}</option>
                                                    @endforeach
                                                </select>
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    Mohon ketik nama muzaki
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Jumlah
                                                    Pemasukan</label>
                                                <input type="number" class="form-control" id="validationCustom03"
                                                    name="jumlah_pemasukan" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik jumlah pemasukan
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="validationServer04" class="form-label">Metode
                                                    Pembayaran</label>
                                                <select class="form-select " id="validationServer04"
                                                    aria-describedby="validationServer04Feedback"
                                                    name="metode_pembayaran" required>
                                                    <option value="cash">cash</option>
                                                    <option value="transfer">transfer</option>
                                                </select>
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    Mohon ketik metode pembayaran
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationTextarea" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="validationTextarea"
                                                    name="ket_pemasukan" maxlength="30" required></textarea>
                                                <div class="invalid-feedback">
                                                    Mohon ketik keterangan pemasukan
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
                                    Nama Muzaki
                                </th>
                                <th>Tanggal Pemasukan</th>
                                <th>Jumlah Pemasukan</th>
                                <th>Metode Pembayaran</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->muzaki->nama_muzaki}}</td>
                                <td>{{$item->tgl_pemasukan}}</td>
                                <td>{{$item->jumlah_pemasukan}}</td>
                                <td>{{$item->metode_pembayaran}}</td>
                                <td>{{$item->ket_pemasukan}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->pemasukan_id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->pemasukan_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation" action="{{url('admin/kelola-pemasukan/'.$item->pemasukan_id)}}" method="POST" novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div class="col-md-6">
                                                                <label for="validationServer04" class="form-label">Nama Muzaki</label>
                                                                <select class="form-select " id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback" name="muzaki_id"
                                                                    required>
                                                                    <option value="{{$item->muzaki_id}}">{{$item->muzaki->nama_muzaki}}</option>
                                                                    @foreach ($muzaki as $m)
                                                                    <option value="{{$m->muzaki_id}}">{{$m->nama_muzaki}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                                    Mohon ketik nama muzaki
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03" class="form-label">Jumlah
                                                                    Pemasukan</label>
                                                                <input type="number" class="form-control" id="validationCustom03"
                                                                    name="jumlah_pemasukan" value="{{$item->jumlah_pemasukan}}" required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik jumlah pemasukan
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label for="validationServer04" class="form-label">Metode
                                                                    Pembayaran</label>
                                                                <select class="form-select is-invalid" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback"
                                                                    name="metode_pembayaran" required>
                                                                    <option value="{{$item->metode_pembayaran}}">{{$item->metode_pembayaran}}</option>
                                                                    <option value="cash">cash</option>
                                                                    <option value="transfer">transfer</option>
                                                                </select>
                                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                                    Mohon ketik metode pembayaran
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="validationTextarea" class="form-label">Keterangan</label>
                                                                <textarea class="form-control" id="validationTextarea"
                                                                    name="ket_pemasukan" maxlength="30" required>{{$item->ket_pemasukan}}</textarea>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik keterangan pemasukan
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('admin/kelola-pemasukan/'.$item->pemasukan_id)}}" method="post"
                                            id="hapuspemasukan">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="btnpemasukan()"><i
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
    function btnpemasukan() {
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
              document.getElementById('hapuspemasukan').submit();
          }
      });
      
  }
</script>
@endsection