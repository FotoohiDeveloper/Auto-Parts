<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>لوازم یدکی اسما - اتمام خرید</title>
    @include('panel.layouts.style')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="" style="">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('panel.layouts.sidebar')
            <div class="layout-page">
                @include('panel.layouts.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">فرم ثبت خرید</h5> <small class="text-muted float-end"></small>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('products.buy', [$product->id])}}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">نام و نام خانوادگی</label>
                                                <input type="text" class="form-control" id="basic-default-fullname" value="{{$user->first_name . ' ' . $user->last_name}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-company">شماره موبایل</label>
                                                <input type="text" class="form-control" id="basic-default-company" value="{{$user->phone_number}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-company">نام کامل محصول</label>
                                                <input type="text" class="form-control" id="basic-default-company" value="{{$product->name . ' از برند ' . $product->brand . ' با رنگ ' . $product->color}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-company">قیمت</label>
                                                <input type="text" class="form-control" id="basic-default-company" value="{{number_format($product->price) . ' تومان'}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">آدرس محل سکونت</label>
                                                <input type="text" class="form-control" id="basic-default-company" value="{{$user->address}}" name="address">
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">اینجانت {{$user->first_name . ' ' . $user->last_name}} با رضایت خود خرید را تکمیل میکنم</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('panel.layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"
            style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>
    </div>
    <div class="buy-now">
    </div>
    @include('panel.layouts.script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
