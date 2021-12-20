<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Hasil Pencarian | Online Library</title>
    <!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/templatemo-art-factory.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

</head>

<body style="background-color: #FFF;">
    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="katalog">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-12 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="text-center pt-2 pb-5">
                        <h5>HASIL PENCARIAN BUKU PERPUSTAKAAN</h5>
                        <p>Katalog Buku yang Ada di Perpustakaan</p>
                        <hr>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <form action="{{ route('search') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Buku..." name="key">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <center><button class="btn btn-info">Hasil yang sama dengan keyword</button></center>
                    <table id="example" class="table table-striped table-bordered mt-5" style="width:100%">
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
                                $str = preg_replace("/".$request->key."/i","<span style='background:yellow;'>".$request->key."</span>",$data->judul);
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! $str !!}</td>
                                <td><img src="{{ Storage::url('public/buku/'.$data->foto) }}" width="120px"></td>
                                <td>{{ $data->kategori->nama }}</td>
                                <td>{{ $data->penerbit }}</td>
                            </tr>
                            @endforeach
                    </table>

                    <center><button class="btn btn-info">Hasil yang relevan dengan keyword</button></center>
                    <table id="example2" class="table table-striped table-bordered mt-5" style="width:100%">
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
                                <td><img src="{{ Storage::url('public/buku/'.$data->foto) }}" width="120px"></td>
                                <td>{{ $data->kategori->nama }}</td>
                                <td>{{ $data->penerbit }}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <center><a href="{{ url('/') }}"><button class="btn btn-primary" style="width: 100%;">Kembali</button></a></center>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('home/js/popper.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('home/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('home/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('home/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('home/js/imgfix.min.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "searching": false
            });
            $('#example2').DataTable({
                "searching": false
            });
        });

    </script>

</body>

</html>
