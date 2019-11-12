<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SEPIK | Sistem Pemesanan Ikan Lele</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
      ============================================ -->
      @include('layouts.css')
      <!-- ============================================ -->
      <script src="template/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
          @include('layouts.header')

          @include('layouts.mobileMenu')

          @include('layouts.main-menu')

          @include('layouts.breadcumb')

          @include('layouts.data-table')

          @include('layouts.footer')

          @include('layouts.js')




          <script src="{{ asset('js/app.js') }}"></script>
          @stack('script')
        </body>

        </html>