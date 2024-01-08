<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>لوازم یدکی اسما - همه فاکتور ها</title>
    @include('panel.layouts.style')
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


                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">مدیریت/</span> همه فاکتور ها
                        </h4>


                        <div class="card">
                            <h5 class="card-header">لیست تمام فاکتور ها</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>نام محصول</th>
                                            <th>برند محصول</th>
                                            <th>رنگ محصول</th>
                                            <th>وضعیت محصول</th>
                                            <th>تغییر وضعیت</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$invoice->user->first_name . ' ' . $invoice->user->last_name}}</td>
                                                <td>{{$invoice->product->name}}</td>
                                                <td>{{$invoice->product->brand}}</td>
                                                <td>{{$invoice->product->color}}</td>
                                                <td>
                                                    @if ($invoice->status == 0)
                                                        تکمیل نشده
                                                    @else
                                                        تکمیل شده
                                                    @endif
                                                </td>
                                                @if ($invoice->status == 0)
                                                    <td><a href="{{route('invoices.change', [$invoice->id])}}">تغییر وضعیت فاکتور</a></td>
                                                @else
                                                    <td>تکمیل شده</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
</body>

</html>
