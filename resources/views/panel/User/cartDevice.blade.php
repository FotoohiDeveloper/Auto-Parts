<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - همه دستگاه ها</title>
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
                            <span class="text-muted fw-light">مدیریت/</span> همه دستگاه ها
                        </h4>


                        <div class="card">
                            <h5 class="card-header">لیست تمام دستگاه ها</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام دستگاه</th>
                                            <th>سریال دستگاه</th>
                                            <th>راننده دستگاه</th>
                                            <th>دسته بندی دستگاه</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $device->device_name }}</td>
                                                <td>{{ $device->serial_number }}</td>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="driver" name="driver"
                                                        serial="{{ $device->serial_number }}">
                                                        <option value="n">انتخاب کنید</option>
                                                        @foreach ($drivers as $driver)
                                                            <option value="{{ $driver->id }}"
                                                                @if ($device->driver_id == $driver->id) selected @endif>
                                                                {{ $driver->first_name . ' ' . $driver->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="category" name="category"
                                                        serial="{{ $device->serial_number }}">
                                                        <option value="n">انتخاب کنید</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" @if ($device->category == $category->id) selected @endif>{{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var formControls = document.querySelectorAll('.form-control');

                                                formControls.forEach(function(control) {
                                                    control.addEventListener('change', function() {
                                                        var selectId = this.getAttribute('id');
                                                        var selectedValue = this.value;
                                                        var serial = this.getAttribute('serial');

                                                        if (selectedValue != 'n') {
                                                            var data = {
                                                                serial: serial,
                                                                selectId: selectId,
                                                                value: selectedValue,
                                                                _token: '{{ csrf_token() }}'
                                                            };

                                                            fetch('{{ url("panel/editCart") }}', {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Content-Type': 'application/x-www-form-urlencoded'
                                                                    },
                                                                    body: new URLSearchParams(data).toString()
                                                                })
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    if (data.message == 'success') {
                                                                        sendError('success', 'با موفقیت تغییر کرد', 1500);
                                                                    } else {
                                                                        sendError('error', 'خطایی بوجود آمد', 1500);
                                                                    }
                                                                })
                                                                .catch(error => {
                                                                    sendError('error', 'خطایی در ارتباط با سرور رخ داد', 1500);
                                                                });
                                                        }
                                                    });
                                                });
                                            });


                                            function sendError(status, title, time) {
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: status,
                                                    title: title,
                                                    showConfirmButton: false,
                                                    timer: time
                                                })
                                            }
                                        </script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
