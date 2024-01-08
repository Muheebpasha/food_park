<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="">Muheeb Technicals</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('admin/assets/css/toastr.min.css') }}"></script>

  <script>
    toastr.options.progressBar = true;
    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>
<script>
$.uploadPreview({
    input_field : "#image-upload",
    preview_box : "#image-preview",
    label_field : "#image-label",
    label_default : "Choose File",
    label_selection : "Choose File",
    no_label : false,
    success_callback : null
});
</script>
@stack('scripts')
</body>
</html>
