@extends('admin.layout.main')
@section('title', 'Hasil Pencarian Buku | Perpustakaan')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Kategori Buku</h4>
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
                        <a href="#">Kategori</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title float-left">Hasil yang sama dengan keyword</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>Kategori</th>
                                            <th>Penerbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buku as $data)
                                        @php
                                            $str = preg_replace("/".$request->keyword."/i","<span style='background:yellow;'>".$request->keyword."</span>",$data->judul);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $str !!}</td>
                                            <td><img src="{{ Storage::url('public/buku/'.$data->foto) }}" width="120px"></td>
                                            <td>{{ $data->kategori->nama }}</td>
                                            <td>{{ $data->penerbit }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title float-left">Hasil yang relevan dengan keyword</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables1" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>Kategori</th>
                                            <th>Penerbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buku as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td><img src="{{ Storage::url('public/buku/'.$data->foto) }}" width="120px">
                                            </td>
                                            <td>{{ $data->kategori->nama }}</td>
                                            <td>{{ $data->penerbit }}</td>
                                        </tr>
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
        $('#basic-datatables').DataTable({
            "searching": false
        });

        $('#basic-datatables1').DataTable({
            "searching": false
        });
    });

</script>
@endpush
