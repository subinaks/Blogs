<!DOCTYPE html>
<html lang="en">
    <head>
    @include('user/layouts/header')
    </head>
    <body>
    @include('user/layouts/navbar')
       @section('main')
       @show    
    
        <!-- Footer-->
        <footer class="border-top">
            @include('user/layouts/footer')
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
