@extends('admin.layout.main')
@section('title', 'Buku | Perpustakaan')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Buku</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Buku</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Buku</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title float-left">Daftar Buku</h4>
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#add">Tambah</button>
                        </div>
                        <!-- Add -->
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Buku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.buku.list.store') }}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <select name="kategori_id" class="form-control">
                                                    <option value="0">Pilih</option>
                                                    @foreach($kategori as $kat)
                                                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input required type="text" name="judul" class="form-control"
                                                    placeholder="Masukkan judul buku...">
                                            </div>
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input required type="text" name="penulis" class="form-control"
                                                    placeholder="Masukkan penulis...">
                                            </div>
                                            <div class="form-group">
                                                <label>Penerbit</label>
                                                <input required type="text" name="penerbit" class="form-control"
                                                    placeholder="Masukkan penerbit...">
                                            </div>
                                            <div class="form-group">
                                                <label>Tahun Terbit</label>
                                                <input required type="text" name="tahun" class="form-control"
                                                    placeholder="Masukkan tahun terbit...">
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input required type="file" name="foto" class="form-control"
                                                    placeholder="Masukkan foto...">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Foto</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buku as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->kategori->nama }}</td>
                                            <td>{{ $data->penulis }}</td>
                                            <td>{{ $data->penerbit }}</td>
                                            <td>{{ $data->tahun }}</td>
                                            <td>
                                                <img src="{{Storage::url('public/buku/'.$data->foto)}}" style="width: 80px; height: 70px; border-radius: 2px;" class="m-2">
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')"
                                                    href="{{ route('admin.buku.list.delete', $data->id) }}">
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </a>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $data->id }}"><i
                                                        class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Edit -->
                                        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori
                                                            Buku</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.buku.list.update', $data->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label>Nama Kategori</label>
                                                                <select name="kategori_id" class="form-control">
                                                                    <option value="0">Pilih</option>
                                                                    @foreach($kategori as $kat)
                                                                        <option {{ $kat->id == $data->kategori_id ? 'selected' : '' }} value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Judul</label>
                                                                <input required type="text" value="{{ $data->judul }}" name="judul" class="form-control"
                                                                    placeholder="Masukkan judul buku...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Penulis</label>
                                                                <input required type="text" value="{{ $data->penulis }}" name="penulis" class="form-control"
                                                                    placeholder="Masukkan penulis...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Penerbit</label>
                                                                <input required type="text" value="{{ $data->penerbit }}" name="penerbit" class="form-control"
                                                                    placeholder="Masukkan penerbit...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun Terbit</label>
                                                                <input required type="text" value="{{ $data->tahun }}" name="tahun" class="form-control"
                                                                    placeholder="Masukkan tahun terbit...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Foto</label>
                                                                <input type="file" name="foto" class="form-control"
                                                                    placeholder="Masukkan foto...">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                    href="https://www.themekita.com">ThemeKita</a>
            </div>
        </div>
    </footer>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#basic-datatables').DataTable({});
    });

</script>
@endpush
