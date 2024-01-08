<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - داشبورد</title>
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
                            @foreach ($devices as $device)
                                @if ($device->lastStatus)
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="card-title mb-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="mb-0"><a
                                                                    href="{{ url("panel/Device/My/$device->serial_number/Show") }}">{{ $device->device_name }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="col">
                                                            <button class="update-btn btn btn-primary"
                                                                data-device-id="{{ $device->serial_number }}">بروزرسانی</button>
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">
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
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="p-0 m-0">
                                                    <li
                                                        class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                        <div class="badge bg-label-success rounded p-2"><span
                                                                class="material-symbols-outlined">
                                                                schedule
                                                            </span></div>
                                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                                            <h6 class="mb-0 ms-3">آخرین بروزرسانی</h6>
                                                            <div class="d-flex">
                                                                <p class="mb-0 fw-medium ">
                                                                    @if ($device->lastStatus)
                                                                        {{ convertNormal($device->lastStatus->created_at) }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li
                                                        class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                        <div class="badge bg-label-danger rounded p-2"><span class="material-symbols-outlined">
                                                            device_thermostat
                                                            </span></div>
                                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                                            <h6 class="mb-0 ms-3">میانگین دما در 24 ساعت</h6>
                                                            <div class="d-flex">
                                                                <p
                                                                    class="mb-0 fw-medium average-temperature-{{ $device->serial_number }}">
                                                                    بروزرسانی</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                        <div class="badge bg-label-warning rounded p-2"><span class="material-symbols-outlined">
                                                            device_thermostat
                                                            </span></div>
                                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                                            <h6 class="mb-0 ms-3">حداقل دما در 24 ساعت</h6>
                                                            <div class="d-flex">
                                                                <p
                                                                    class="mb-0 fw-medium min-temperature-{{ $device->serial_number }}">
                                                                    بروزرسانی</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                        <div class="badge bg-label-info rounded p-2"><span class="material-symbols-outlined">
                                                            device_thermostat
                                                            </span></div>
                                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                                            <h6 class="mb-0 ms-3">حداکثر دما در 24 ساعت</h6>
                                                            <div class="d-flex">
                                                                <p
                                                                    class="mb-0 fw-medium max-temperature-{{ $device->serial_number }}">
                                                                    بروزرسانی</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                        <div class="badge bg-label-primary rounded p-2"><span class="material-symbols-outlined">
                                                            humidity_percentage
                                                            </span></div>
                                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                                            <h6 class="mb-0 ms-3">میانگین رطوبت در 24 ساعت</h6>
                                                            <div class="d-flex">
                                                                <p
                                                                    class="mb-0 fw-medium average-humidity-{{ $device->serial_number }}">
                                                                    بروزرسانی</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- @endif --}}
                                                    @if ($device->model_id == 0)
                                                        <li
                                                            class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                                                            <div class="badge bg-label-secondary rounded p-2"><span
                                                                    class="material-symbols-outlined">
                                                                    sensors
                                                                </span></div>
                                                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                                                <h6 class="mb-0 ms-3">وضعیت سنسور</h6>
                                                                <div class="d-flex">
                                                                    <p class="mb-0 fw-medium">
                                                                        @if ($device->lastStatus->IO == 0)
                                                                            باز
                                                                        @else
                                                                            بسته
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h4>دستگاه {{ $device->device_name }} تاکنون به سرور متصل نشده است</h4>
                                @endif
                            @endforeach
                            <script>
                                document.querySelectorAll('.update-btn').forEach(button => {
                                    button.addEventListener('click', function() {
                                        const deviceId = this.getAttribute('data-device-id');

                                        // Disable the button and show loading sign
                                        this.disabled = true;
                                        const originalButtonText = this.textContent;
                                        this.textContent = "در حال بروزرسانی...";

                                        // ارسال درخواست به سرور
                                        fetch('{{ url("panel/CheckDeviceStatus") }}', {
                                                method: 'POST',
                                                body: JSON.stringify({
                                                    serial_number: deviceId,
                                                    _token: '{{ csrf_token() }}'
                                                }),
                                                headers: {
                                                    'Content-Type': 'application/json'
                                                }
                                            })
                                            .then(response => {
                                                if (response.status === 429) {
                                                    showError('error', 'شما به حداکثر تعداد درخواست‌های مجاز رسیده‌اید.', 2000);
                                                    throw new Error('Rate limit exceeded');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                document.querySelector(`.average-temperature-${deviceId}`).textContent =
                                                    calculateAverage(data.average_temperatures) + ' °C';
                                                document.querySelector(`.min-temperature-${deviceId}`).textContent =
                                                    calculateAverage(data.minimum_temperatures) + ' °C';
                                                document.querySelector(`.max-temperature-${deviceId}`).textContent =
                                                    calculateAverage(data.maximum_temperatures) + ' °C';
                                                document.querySelector(`.average-humidity-${deviceId}`).textContent =
                                                    calculateAverage(data.average_humidities) + ' %';
                                                showError('success', 'داده ها با موفقیت بروز شدند', 1000);
                                            })
                                            .catch(error => {
                                                console.log(error);
                                            })
                                            .finally(() => {
                                                // Re-enable the button and hide loading sign
                                                button.disabled = false;
                                                button.textContent = originalButtonText;
                                            });
                                    });
                                });

                                function showError(status, title, time) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: status,
                                        title: title,
                                        showConfirmButton: false,
                                        timer: time
                                    });
                                }

                                function calculateAverage(dataArray) {
                                    const validData = dataArray.filter(value => value !== null);
                                    const sum = validData.reduce((acc, currentValue) => acc + currentValue, 0);
                                    return sum / validData.length;
                                }
                            </script>
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
