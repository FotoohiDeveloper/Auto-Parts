<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>لوازم یدکی اسما - داشبورد</title>
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
                            @if (checkRole())
                                <div class="col-xl-4 mb-4 col-lg-5 col-12">
                                    <div class="card">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-7">
                                                <div class="card-body text-nowrap">
                                                    <h5 class="card-title mb-0">تبریک {{ auth()->user()->first_name }}
                                                    </h5>
                                                    <p class="mb-2">این ماه فروش عالی بوده</p>
                                                    <h4 class="text-primary mb-1">6 قطعه</h4>
                                                    <a href="javascript:;"
                                                        class="btn btn-primary waves-effect waves-light">مشاهده لیست
                                                        خرید
                                                        ها</a>
                                                </div>
                                            </div>
                                            <div class="col-5 text-center text-sm-left">
                                                <div class="card-body pb-0 px-0 px-md-4">
                                                    <img src="../../assets/img/illustrations/card-advance-sale.png"
                                                        height="140" alt="view sales">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h5 class="card-title mb-0">اطلاعات آماری</h5>
                                                <small class="text-muted">آمار سایت</small>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                <div class="col-md-3 col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                                                class="ti ti-chart-pie-2 ti-sm"></i></div>
                                                        <div class="card-info">
                                                            <h5 class="mb-0">319</h5>
                                                            <small>بیننده های سایت</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge rounded-pill bg-label-info me-3 p-2"><i
                                                                class="ti ti-users ti-sm"></i></div>
                                                        <div class="card-info">
                                                            <h5 class="mb-0">2</h5>
                                                            <small>تعداد مشتریان</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                                                class="ti ti-shopping-cart ti-sm"></i></div>
                                                        <div class="card-info">
                                                            <h5 class="mb-0">3</h5>
                                                            <small>تعداد محصولات</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                                                class="ti ti-currency-dollar ti-sm"></i></div>
                                                        <div class="card-info">
                                                            <h5 class="mb-0">500,000</h5>
                                                            <small>درآمد کل</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-xl-4 mb-4 col-lg-5 col-12">
                                    <div class="card">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-7">
                                                <div class="card-body text-nowrap">
                                                    <h5 class="card-title mb-0">سلام {{ auth()->user()->first_name }}
                                                    </h5>
                                                    <p class="mb-2">خرید محصولات ما از این لینک</p>
                                                    <h4 class="text-primary mb-1">لوازم یدکی اسما</h4>
                                                    <a href="{{route('products')}}"
                                                        class="btn btn-primary waves-effect waves-light">مشاهده لیست
                                                        خرید</a>
                                                </div>
                                            </div>
                                            <div class="col-5 text-center text-sm-left">
                                                <div class="card-body pb-0 px-0 px-md-4">
                                                    <img src="../../assets/img/illustrations/card-advance-sale.png"
                                                        height="140" alt="view sales">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
