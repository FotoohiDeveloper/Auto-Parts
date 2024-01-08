<!DOCTYPE html>
<html lang="fa" class="light-style  customizer-hide" dir="rtl" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>لوازم یدکی اسما - ساخت حساب</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">

    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo/logo.png')}}">

    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
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
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    <style>
        @font-face {
            font-family: MyFont;
            src: url("{{url('assets/font/Sans.woff')}}") format("woff");
        }

        body {
            font-family: MyFont, sans-serif;
        }
    </style>

</head>

<body dir="rtl">


    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="Logo" height="32" width="32">
                                </span>
                                <span class="app-brand-text demo text-body fw-bold ms-1">لوازم یدکی اسما</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 pt-2">به لوازم یدکی اسما خوش آمدید👋</h4>
                        <p class="mb-4">اطلاعات خود را به درستی وارد کنید هرگونه مشکل به عهده کاربر میباشد</p>
                        @if (session('errors'))
                            <div class="alert alert-danger">
                                <strong>خطا! </strong>
                                <ul>
                                    @foreach (session('errors') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session ('success'))
                            <div class="alert alert-success">
                                <strong>تایید! </strong> {{session ('success')}}
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{route('register.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">نام</label>
                                <input type="text" class="form-control" id="username" name="first_name"
                                    placeholder="نام خود را وارد کنید" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" id="username" name="last_name"
                                    placeholder="نام خانوادگی خود را وارد کنید" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">شماره موبایل</label>
                                <input type="text" class="form-control" id="number" name="phone_number"
                                    placeholder="شماره موبایل خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="national_code" class="form-label">کد ملی</label>
                                <input type="text" class="form-control" id="national_code" name="national_code"
                                    placeholder="کد ملی خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="ایمیل خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">آدرس</label>
                                <textarea type="text" class="form-control" id="email" name="address" placeholder="آدرس خود را وارد کنید"></textarea>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">کلمه عبور</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" type="submit">
                                ثبت نام
                            </button>
                        </form>

                        <p class="text-center">
                            <span>آیا شما حساب دارید ؟</span>
                            <a href="{{url('login')}}">
                                <span>وارد شوید</span>
                            </a>
                        </p>

                        <div class="divider my-4">
                            <div class="divider-text">یا</div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                                <i class="tf-icons fa-brands fa-google fs-5"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="../../assets/js/pages-auth.js"></script>

</body>

</html>
