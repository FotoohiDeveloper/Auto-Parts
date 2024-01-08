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
                                            <th>نوع دستگاه</th>
                                            <th>نام دستگاه</th>
                                            <th>سریال دستگاه</th>
                                            <th>نام مالک دستگاه</th>
                                            <th>دسته بندی</th>
                                            <th>روشن/خاموش</th>
                                            <th>وضعیت دستگاه</th>
                                            <th>کد رمز فعالسازی</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @switch($device->model_id)
                                                        @case(0)
                                                            Car-T
                                                        @break

                                                        @case(1)
                                                            Loggy 100
                                                        @break

                                                        @case(2)
                                                            Loggy 400
                                                        @break

                                                        @case(3)
                                                            Loggy GPSP
                                                        @break

                                                        @case(4)
                                                            GPS
                                                        @break
                                                    @endswitch
                                                </td>
                                                <td>{{ $device->device_name }}</td>
                                                <td><a href="{{ url("panel/Device/My/{$device->serial_number}/Show") }}"
                                                        target="_blanl">{{ $device->serial_number }}</a></td>
                                                <td>
                                                    @if ($device->owner_id == null)
                                                        مالک ندارد
                                                    @else
                                                        <a href="{{ url("panel/User/{$device->owner_id}/Show") }}"
                                                            target="_blank">{{ $device->owner->first_name . ' ' . $device->owner->last_name }}</a>
                                                    @endif
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
                                                <td>
                                                    @if ($device->power_status == 0)
                                                        <span class="badge bg-label-danger me-1">خاموش</span>
                                                    @else
                                                        <span class="badge bg-label-success me-1">روشن</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($device->status == 0)
                                                        <span class="badge bg-label-danger me-1">غیر فعال</span>
                                                    @else
                                                        <span class="badge bg-label-success me-1">فعال</span>
                                                    @endif
                                                </td>
                                                <td>{{ $device->password }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown"><i
                                                                class="ti ti-dots-vertical"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/{$device->id}/Show") }}"><i
                                                                    class="ti ti-pencil me-1"></i>ویرایش</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/{$device->id}/Delete") }}"><i
                                                                    class="ti ti-trash me-1"></i>حذف دستگاه</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/My/{$device->id}/Down") }}"><i
                                                                    class="ti ti-x me-1"></i>غیر فعالسازی دستگاه</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/My/{$device->id}/Up") }}"><i
                                                                    class="ti ti-check me-1"></i>فعالسازی دستگاه</a>
                                                        </div>
                                                    </div>
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

                                                            fetch('{{ url("panel/editAdmin") }}', {
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
