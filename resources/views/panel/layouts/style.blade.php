<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-5J3LMKC"></script>
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
</script>
<!-- End Google Tag Manager -->

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
    rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}">

<!-- Core CSS -->


<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">

<!-- Helpers -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<style type="text/css">
    .layout-menu-fixed .layout-navbar-full .layout-menu,
    .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
        top: 62px !important;
    }

    .layout-page {
        padding-top: 62px !important;
    }

    .content-wrapper {
        padding-bottom: 56px !important;
    }
</style>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/rtl/core.css') }}"
    class="template-customizer-core-css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/rtl/theme-semi-dark.css') }}"
    class="template-customizer-theme-css">
<style>
    @font-face {
        font-family: MyFont;
        src: url("{{ url('assets/font/Sans.woff') }}") format("woff");
    }

    body,
    .leaflet-container {
        font-family: MyFont, sans-serif;
    }

    .leaflet-popup-content {
        font-family: MyFont, sans-serif;
    }

    .leaflet-control {
        font-family: MyFont, sans-serif;
    }
</style>
