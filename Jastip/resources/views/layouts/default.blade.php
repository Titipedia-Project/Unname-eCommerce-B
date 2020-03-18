

<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body>

    <!-- Navigation -->

    @include('includes.header')
    <!-- Page Content -->
    <div style="padding-top: 56px;" class="container">

        <div class="row">

            <div class="col-lg-3">
                <!-- Sidebar -->
                @include('includes.sidebar')
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <!-- Home -->
                @yield('content')
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
    @include('includes.footer')
        <!-- /.container -->
    </footer>

</body>

</html>