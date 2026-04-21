<!DOCTYPE html>
<html lang="az">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="ABV Admin">
    <meta name="keywords" content="ABV, dashboard">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    {{-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts - Manrope + Sora + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/phosphor-icons/phosphor-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/lucide-icons/lucide.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/choices.js/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  </head>

  <body>
      @yield('content')

      <!-- Vendor JS Files -->
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
      <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
      <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
      <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/choices.js/choices.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

      <!-- Template Main JS Files -->
      <script src="{{ asset('assets/js/forms.js') }}"></script>
      <script src="{{ asset('assets/js/theme.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>

      <!-- App Sidebar Toggle (for app pages with sidebars) -->
      <script src="{{ asset('assets/js/apps-sidebar-toggle.js') }}"></script>
  </body>
</html>