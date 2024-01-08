<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - گزارش اتوماتیک</title>
        @include('panel.layouts.style')
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/dist/jalalidatepicker.min.css') }}" />
        <script type="text/javascript" src="{{ asset('assets/dist/jalalidatepicker.min.js') }}"></script>

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
                            گزارش گیری
                            <span class="text-muted fw-light">/ گزارش اتوماتیک </span>
                        </h4>
                        <div class="row fv-plugins-icon-container">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">ساخت گزارش</h5>
                                    <hr class="my-0">
                                    <div class="card-body">
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
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                <strong>تایید! </strong> {{ session('success') }}
                                            </div>
                                        @endif
                                        <form id="formAccountSettings" method="POST"
                                            action="{{ url('panel/AutomaticReport') }}"
                                            class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                                    <label for="deviceType" class="form-label">انتخاب دستگاه</label>
                                                    <select class="form-control" id="deviceType" name="device_serial">
                                                        @foreach ($devices as $device)
                                                            <option value="{{ $device->serial_number }}">
                                                                {{ $device->device_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                                    <label for="deviceType" class="form-label">زمان بندی</label>
                                                    <select class="form-control" id="deviceType" name="period">
                                                        <option value="0">روزانه</option>
                                                        <option value="1">هفتگی</option>
                                                        <option value="2">ماهانه</option>
                                                    </select>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit"
                                                    class="btn btn-primary me-2 waves-effect waves-light">ساخت
                                                    گزارش</button>
                                            </div>
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
</body>

</html>
