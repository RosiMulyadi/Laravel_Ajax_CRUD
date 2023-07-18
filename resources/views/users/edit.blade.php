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
                            <h1 class="m-0">Data User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $user->name ?? old('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ $user->email ?? old('email') }}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-control">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="roles">Role:</label>
                                <select name="roles[]" id="roles" class="form-control" multiple>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                            <a class="btn btn-danger" href="{{ route('users.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        @include('layouts.footer')

        <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    </div>
</body>

</html>