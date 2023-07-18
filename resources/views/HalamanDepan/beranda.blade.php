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

        @include('layouts.content')


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