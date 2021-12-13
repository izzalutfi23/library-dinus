@extends('admin.layout.main')
@section('title', 'Pinjam | Perpustakaan')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Peminjaman Buku</h4>
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
                        <a href="#">Pinjam</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title float-left">Data Peminjaman Buku</h4>
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
                                        <form action="{{ route('admin.pinjam.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Pengunjung</label>
                                                <select name="pengunjung_id" class="form-control">
                                                    <option value="0">Pilih</option>
                                                    @foreach($pengunjung as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <select name="buku_id" class="form-control">
                                                    <option value="0">Pilih</option>
                                                    @foreach($buku as $b)
                                                    <option value="{{ $b->id }}">{{ $b->judul }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tgl Pinjam</label>
                                                <input required type="date" name="tgl_pinjam" class="form-control"
                                                    placeholder="Masukkan tgl pinjam...">
                                            </div>
                                            <div class="form-group">
                                                <label>Tgl Kembali</label>
                                                <input required type="date" name="tgl_kembali" class="form-control"
                                                    placeholder="Masukkan tgl kembali...">
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
                                            <th>Nama Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tgl Pinjam</th>
                                            <th>Tgl Kembali</th>
                                            <th>Status</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pinjam as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->buku->judul }}</td>
                                            <td>{{ $data->pengunjung->nama }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tgl_pinjam)) }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tgl_kembali)) }}</td>
                                            <td>
                                                @if($data->status == "1")
                                                    <i class='badge badge-info'>Dikembalikan</i>
                                                @else
                                                    <i class='badge badge-warning'>Dipinjam</i>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')"
                                                    href="{{ route('admin.pinjam.delete', $data->id) }}">
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
                                                        <form
                                                            action="{{ route('admin.pinjam.update', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label>Nama Pengunjung</label>
                                                                <select name="pengunjung_id" class="form-control">
                                                                    <option value="0">Pilih</option>
                                                                    @foreach($pengunjung as $p)
                                                                    <option {{ $p->id == $data->pengunjung_id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Judul Buku</label>
                                                                <select name="buku_id" class="form-control">
                                                                    <option value="0">Pilih</option>
                                                                    @foreach($buku as $b)
                                                                    <option {{ $b->id == $data->buku_id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->judul }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tgl Pinjam</label>
                                                                <input required type="date" value="{{ $data->tgl_pinjam }}" name="tgl_pinjam" class="form-control"
                                                                    placeholder="Masukkan tgl pinjam...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tgl Kembali</label>
                                                                <input required type="date" value="{{ $data->tgl_kembali }}" name="tgl_kembali" class="form-control"
                                                                    placeholder="Masukkan tgl kembali...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select name="status" class="form-control">
                                                                    <option {{ $data->sttaus == '0' ? 'selected' : '' }} value="0">Dipinjam</option>
                                                                    <option {{ $data->sttaus == '1' ? 'selected' : '' }} value="1">Dikembalikan</option>
                                                                </select>
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
