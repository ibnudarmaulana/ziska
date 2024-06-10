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
                                                <label for="validationCustom04" class="form-label">Nama Mustahiq</label>
                                                <select class="form-select" id="validationCustom04" name="mustahiq_id"
                                                    required>
                                                    @foreach ($mustahiq as $item)
                                                    <option value="{{$item->mustahiq_id}}">{{$item->nama_mustahiq}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon ketik nama mustahiq
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Status Asnaf</label>
                                                <select class="form-select" id="validationCustom04" name="status_asnaf"
                                                    required>
                                                    <option value="fakir">fakir</option>
                                                    <option value="miskin">miskin</option>
                                                    <option value="amil">amil</option>
                                                    <option value="mualaf">mualaf</option>
                                                    <option value="riqab">riqab</option>
                                                    <option value="gharim">gharim</option>
                                                    <option value="fisabilillah">fisabilillah</option>
                                                    <option value="ibnusabil">ibnusabil</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon ketik status asnaf
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Jumlah
                                                    Distribusi</label>
                                                <input type="number" class="form-control" id="validationCustom03"
                                                    name="jumlah_distribusi" required>
                                                <div class="invalid-feedback">
                                                    Mohon ketik jumlah distribusi
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Metode
                                                    Pembayaran</label>
                                                <select class="form-select" id="validationCustom04"
                                                    name="metode_pembayaran" required>
                                                    <option value="cash">cash</option>
                                                    <option value="transfer">transfer</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon ketik status asnaf
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationTextarea" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="validationTextarea"
                                                    name="ket_distribusi" required></textarea>
                                                <div class="invalid-feedback">
                                                    Mohon ketik keterangan
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
                                <th>Status Asnaf</th>
                                <th>Tanggal Distribusi</th>
                                <th>Jumlah Distribusi</th>
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
                                <td>{{$item->mustahiq->nama_mustahiq}}</td>
                                <td>{{$item->status_asnaf}}</td>
                                <td>{{$item->tgl_distribusi}}</td>
                                <td>{{$item->jumlah_distribusi}}</td>
                                <td>{{$item->metode_pembayaran}}</td>
                                <td>{{$item->ket_distribusi}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$item->distribusi_id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->distribusi_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation" action="{{url('upz/kelola-distribusi/'.$item->distribusi_id)}}" method="POST"
                                                            novalidate>
                                                            @csrf
                                                            @method('put')
                                                            <div class="col-md-6">
                                                                <label for="validationCustom04" class="form-label">Nama
                                                                    Mustahiq</label>
                                                                <select class="form-select" id="validationCustom04"
                                                                    name="mustahiq_id" required>
                                                                    <option value="{{$item->mustahiq_id}}">{{$item->mustahiq->nama_mustahiq}}</option>
                                                                    @foreach ($mustahiq as $m)
                                                                    <option value="{{$m->mustahiq_id}}">
                                                                        {{$m->nama_mustahiq}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik nama mustahiq
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom04"
                                                                    class="form-label">Status Asnaf</label>
                                                                <select class="form-select" id="validationCustom04"
                                                                    name="status_asnaf" required>
                                                                    <option value="{{$item->status_asnaf}}">{{$item->status_asnaf}}</option>
                                                                    <option value="fakir">fakir</option>
                                                                    <option value="miskin">miskin</option>
                                                                    <option value="amil">amil</option>
                                                                    <option value="mualaf">mualaf</option>
                                                                    <option value="riqab">riqab</option>
                                                                    <option value="gharim">gharim</option>
                                                                    <option value="fisabilillah">fisabilillah</option>
                                                                    <option value="ibnusabil">ibnusabil</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik status asnaf
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom03"
                                                                    class="form-label">Jumlah
                                                                    Distribusi</label>
                                                                <input type="number" class="form-control"
                                                                    id="validationCustom03" value="{{$item->jumlah_distribusi}}" name="jumlah_distribusi"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik jumlah distribusi
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="validationCustom04"
                                                                    class="form-label">Metode
                                                                    Pembayaran</label>
                                                                <select class="form-select" id="validationCustom04"
                                                                    name="metode_pembayaran" value="{{$item->metode_pembayaran}}" required>
                                                                    <option value="cash">cash</option>
                                                                    <option value="transfer">transfer</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik status asnaf
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="validationTextarea"
                                                                    class="form-label">Keterangan</label>
                                                                <textarea class="form-control" id="validationTextarea"
                                                                    name="ket_distribusi" required>{{$item->ket_distribusi}}</textarea>
                                                                <div class="invalid-feedback">
                                                                    Mohon ketik keterangan
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('upz/kelola-distribusi/'.$item->distribusi_id)}}" method="post" id="hapusdistribusi">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="button" onclick="btndistribusi()"><i
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
    function btndistribusi() {
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
              document.getElementById('hapusdistribusi').submit();
          }
      });
      
  }
</script>
@endsection