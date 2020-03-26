

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

        @yield('content')
       

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 mt-5 bg-dark">
        @include('includes.footer')
        <!-- /.container -->
    </footer>

</body>

</html>