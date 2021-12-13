@extends('admin.layout.main')
@section('title', 'Pengunjung | Perpustakaan')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengunjung</h4>
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
                        <a href="#">Pengunjung</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title float-left">Data Pengunjung</h4>
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#add">Tambah</button>
                        </div>
                        <!-- Add -->
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengunjung</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.pengunjung.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama pengunjung</label>
                                                <input required type="text" name="nama" class="form-control"
                                                    placeholder="Masukkan nama pengunjung...">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea required name="alamat" class="form-control" placeholder="Masukkan alamat..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>No HP</label>
                                                <input required type="number" name="no_hp" class="form-control"
                                                    placeholder="Masukkan no hp...">
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
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Tanggal</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengunjung as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ date('d M Y', strtotime($data->created_at)) }}</td>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')"
                                                    href="{{ route('admin.pengunjung.delete', $data->id) }}">
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
                                                        <form action="{{ route('admin.pengunjung.update', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label>Nama Kategori</label>
                                                                <input type="text" name="nama" value="{{ $data->nama }}" class="form-control"
                                                                    placeholder="Masukkan nama kategoru...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea required name="alamat" class="form-control" placeholder="Masukkan alamat...">{{ $data->alamat }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No HP</label>
                                                                <input required type="number" value="{{ $data->no_hp }}" name="no_hp" class="form-control"
                                                                    placeholder="Masukkan no hp...">
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
