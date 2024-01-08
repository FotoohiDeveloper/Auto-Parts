<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - لیست گزارش ها</title>
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
                            <span class="text-muted fw-light">گزارش ها/</span> لیست گزارش ها
                        </h4>


                        <div class="card">
                            <h5 class="card-header">لیست تمام گزارش ها</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام دستگاه</th>
                                            <th>سریال دستگاه</th>
                                            <th>دوره گزارش</th>
                                            <th>تاریخ ساخت</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $report->device->device_name }}</td>
                                                <td><a href="{{ url("panel/Device/My/{$report->device->serial_number}/Show") }}"
                                                        target="_blanl">{{ $report->device->serial_number }}</a></td>
                                                <td>
                                                    @switch($report->period)
                                                        @case(0)
                                                            روزانه
                                                        @break

                                                        @case(1)
                                                            هفتگی
                                                        @break

                                                        @case(2)
                                                            ماهانه
                                                        @break
                                                    @endswitch
                                                </td>
                                                <td>{{ convertNormal($report->created_at) }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown"><i
                                                                class="ti ti-dots-vertical"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/AutomaticReport/$report->id/Delete") }}"><i
                                                                    class="ti ti-pencil me-1"></i>حذف گزارش</a>
                                                        </div>
                                                    </div>
                                                </td>
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
