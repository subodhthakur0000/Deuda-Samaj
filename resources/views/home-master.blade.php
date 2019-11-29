<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Page Title -->
    <title>@yield('page-title')</title>
    <meta name="description" content="@yield('seo-description')">
    <meta name="keywords" content="@yield('seo-keyword')">


    <!-- FavIcon Link -->
    <link rel="icon" type="image/ico" href="{{url('public/favicon.ico')}}">


    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="description" content="">
    <meta name="keywords" content="">


    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{URL('public/css/bootstrap.min.css')}}">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Lightbox CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('public/css/lightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">


    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('public/css/style.css')}}">


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Jquery 1.9.1 -->
    <script type="text/javascript" src="{{('public/js/jquery-1.9.1.min.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>


    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    
</head>
<body>
    
    
 <div>
    @include('header.header')
</div>

<div>
    @yield('content')
</div>

<div>
    @include('footer.footer')
</div>
</body>

<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script>
       @if(Session::has('success'))
           const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 4000,
              timerProgressBar: true,
              onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })

          Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}'
          })
       @elseif(Session::has('error'))
         const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 4000,
              timerProgressBar: true,
              onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })

          Toast.fire({
            icon: 'error',
            title: '{{ Session::get('error') }}'
          })
      @endif


</script>

<!-- Popper, Boostrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{url('public/js/bootstrap.js')}}"></script>

<!-- Lightbox JS -->
<script type="text/javascript" src="{{url('public/js/lightbox-plus-jquery.min.js')}}"></script>



<!-- Global JS -->
<script type="text/javascript" src="{{url('public/js/js.js')}}"></script>
</html>