<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Tambahkan link CSS lainnya di sini jika diperlukan -->
    
    <style>
        /* Tambahkan CSS kustom Anda di sini */
    </style>
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
                            <h1 class="m-0">Data Role</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Role</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Something went wrong.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('roles.store') }}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>Permission:</label><br />
                                @foreach($permission as $value)
                                <div class="form-check">
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input">
                                    <label class="form-check-label">{{ $value->name }}</label>
                                </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <a class="btn btn-danger" href="{{ route('roles.index') }}">Back</a>
                        </form>
                    </div>
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
    </div>
</body>

</html>
