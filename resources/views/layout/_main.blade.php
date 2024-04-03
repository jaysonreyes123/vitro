<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>{{$title}}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        
       @include('layout.style')
      </head>
      <style>
        body{
            font-size: 13px;
        }
        #main{
            min-height: calc(100vh - 130px);
        }
      </style>

<body>
    @include('layout._header')
    @include('layout._sidemenu')
    <main id="main" class="main">
        @yield('content')
    </main>
    @include('layout.script')
    @include('layout._footer')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var swal = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 2000,
		});
    </script>
</body>
</html>
