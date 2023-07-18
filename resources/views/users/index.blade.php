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


            <div class="content">
                <div class="container-fluid">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="{{ route('users.create')}}" class="btn btn-success">Tambah Data User<i class="fas fa-plus-square"></i></a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            <?php $no = 1 ?>
                            @foreach($data as $key=>$users)
                            <tr>
                                <td>
                                    {{$no++}}
                                </td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>
                                    @if(!empty($users->getRoleNames()))
                                    @foreach($users->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                <td>
                                    <a href="{{ url('users/edit', $users->id) }}"><i class="fas fa-edit"></i></a> |
                                    <a href="{{ url('users/delete', $users->id) }}"><i class="fas fa-trash-alt" style="color: red" onclick="return confirm('kAMU YAKIN INGIN MENGHAPUS DATA TERSEBUT?')"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
            @include('layouts.footer')

        </div>
        @include('layouts.script')

        @include('sweetalert::alert')
</body>

</html>