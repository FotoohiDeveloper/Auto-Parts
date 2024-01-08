<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>لوازم یدکی اسما - ثبت سفارش</title>
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">محصولات /</span> ثبت سفارش جدید
                        </h4>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="card card-border-shadow-primary h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2 pb-1">
                                                <div class="avatar me-2">
                                                    <span class="avatar-initial rounded bg-label-primary"><i
                                                            class="ti ti-truck ti-md"></i></span>
                                                </div>
                                                <a href="{{route('products.buy', [$product->id])}}"><h4 class="ms-1 mb-0">{{$product->name}}</h4></a>
                                            </div>
                                            <p class="mb-1">قیمت : {{number_format($product->price)}}</p>
                                            <p class="mb-0">
                                                <span class="fw-medium me-1">برند : {{$product->brand}}</span>
                                                <small class="text-muted">رنگ : {{$product->color}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
