<!DOCTYPE html>

<html lang="en">

<head>
    @include('layouts.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="Welcome" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Welcome</span>
            </a>

            @include('layouts.sidebar')

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Restoran Makanan Khas Sumenep</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Restoran Makanan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <div class="card-body">
                        <form method="POST" action=" {{route('restoran.store')}} " enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="deskripsi">Kode Restoran</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="kode_restoran" value="{{ $data->kode_restoran ?? old('kode_restoran') }}">
                                </div>
                                @error('kode_restoran')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Nama Restoran</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="nama_restoran" value="{{ $data->nama_restoran ?? old('nama_restoran') }}">
                                </div>
                                @error('nama_restoran')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Kode Makanan</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="kode_makanan" value="{{ $data->kode_makanan ?? old('kode_makanan') }}">
                                </div>
                                @error('kode_makanan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Nama Makanan</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="nama_makanan" value="{{ $data->nama_makanan ?? old('nama_makanan') }}">
                                </div>
                                @error('nama_makanan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Alamat</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="alamat" value="{{ $data->alamat ?? old('alamat') }}">
                                </div>
                                @error('alamat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <a class="btn btn-danger" href="{{ route('restoran.index') }}"> Back </a>
                        </form>
                    </div>
                </div>

            </div>


            <aside class="control-sidebar control-sidebar-dark">

                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>


            @include('layouts.footer')



            <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>

            <script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>

</html>