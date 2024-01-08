<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - نمایش دستگاه</title>
    @include('panel.layouts.style')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            اطلاعات
                            <span class="text-muted fw-light">/ اطلاعات دستگاه</span>
                        </h4>
                        <div class="row">
                            @if ($status)
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <h5 class="card-header">آخرین بروزرسانی : 
                                            {{ convertDate($status->created_at) }}</h5>
                                        <div class="card-body">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>نوع دستگاه</th>
                                                            <th>نام دستگاه</th>
                                                            @if ($device->model_id == 0)
                                                                <th>وضعیت سنسور</th>
                                                                <th>سرعت</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 1, 2, 3]))
                                                                <th>دما 1</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 2]))
                                                                <th>دما 2</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [2]))
                                                                <th>دما 3</th>
                                                                <th>دما 4</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 1, 2, 3]))
                                                                <th>رطوبت 1</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 2]))
                                                                <th>رطوبت 2</th>
                                                            @endif
                                                            @if (in_array($device->model_id, [2]))
                                                                <th>رطوبت 3</th>
                                                                <th>رطوبت 4</th>
                                                            @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
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
                                                            <td>{{$device->device_name}}</td>
                                                            @if ($device->model_id == 0)

                                                                @if ($status->IO)
                                                                    @if ($status->IO == 0)
                                                                        <td>باز</td>
                                                                    @else
                                                                        <td>بسته</td>
                                                                    @endif
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if ($device->model_id == 0)
                                                                @if ($status->speed)
                                                                    <td>{{ $status->speed }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 1, 2, 3]))
                                                                @if ($status->temp_1)
                                                                    <td>{{ number_format($status->temp_1, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 2]))
                                                                @if ($status->temp_2)
                                                                    <td>{{ number_format($status->temp_2, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [2]))
                                                                @if ($status->temp_3)
                                                                    <td>{{ number_format($status->temp_3, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                                @if ($status->temp_4)
                                                                    <td>{{ number_format($status->temp_4, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 1, 2, 3]))
                                                                @if ($status->humidity_1)
                                                                    <td>{{ number_format($status->humidity_1, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [0, 2]))
                                                                @if ($status->humidity_2)
                                                                    <td>{{ number_format($status->humidity_2, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                            @if (in_array($device->model_id, [2]))
                                                                @if ($status->humidity_3)
                                                                    <td>{{ number_format($status->humidity_3, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                                @if ($status->humidity_4)
                                                                    <td>{{ number_format($status->humidity_4, 2) }}</td>
                                                                @else
                                                                    <td>خطای 100</td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-header header-elements">
                                        <div>
                                            <h5 class="card-title mb-0">دما ها</h5>
                                            <small class="text-muted">دما</small>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <canvas id="temperatureChart" class="chartjs" data-height="500" height="625"
                                            width="1048"
                                            style="display: block; box-sizing: border-box; height: 500px; width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-header header-elements">
                                        <div>
                                            <h5 class="card-title mb-0">رطوبت ها</h5>
                                            <small class="text-muted">رطوبت</small>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <canvas id="humidityChart" class="chartjs" data-height="500" height="625"
                                            width="1048"
                                            style="display: block; box-sizing: border-box; height: 500px; width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // تابع برای درخواست AJAX
                                function getDataFromAPI(url) {
                                    return fetch(url)
                                        .then(response => response.json())
                                        .then(data => data['0']);
                                }

                                // تابع برای رسم نمودار
                                function drawTempChart(data) {
                                    const timeLabels = data.map(item => item.time);
                                    const temp1Data = data.map(item => item.temp_1 ? parseFloat(item.temp_1) : null);
                                    const temp2Data = data.map(item => item.temp_2 ? parseFloat(item.temp_2) : null);
                                    const temp3Data = data.map(item => item.temp_3 ? parseFloat(item.temp_3) : null);
                                    const temp4Data = data.map(item => item.temp_4 ? parseFloat(item.temp_4) : null);

                                    const ctx = document.getElementById('temperatureChart').getContext('2d');
                                    const chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: timeLabels,
                                            datasets: [{
                                                    label: 'دما 1',
                                                    data: temp1Data,
                                                    borderColor: 'red',
                                                    fill: false
                                                },
                                                {
                                                    label: 'دما 2',
                                                    data: temp2Data,
                                                    borderColor: 'blue',
                                                    fill: false
                                                },
                                                {
                                                    label: 'دما 3',
                                                    data: temp3Data,
                                                    borderColor: 'green',
                                                    fill: false
                                                },
                                                {
                                                    label: 'دما 4',
                                                    data: temp4Data,
                                                    borderColor: 'orange',
                                                    fill: false
                                                }
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: false
                                                }
                                            }
                                        }
                                    });
                                }

                                function drawHumidityChart(data) {
                                    const timeLabels = data.map(item => item.time);
                                    const humidity1Data = data.map(item => item.humidity_1 ? parseFloat(item.humidity_1) : null);
                                    const humidity2Data = data.map(item => item.humidity_2 ? parseFloat(item.humidity_2) : null);
                                    const humidity3Data = data.map(item => item.humidity_3 ? parseFloat(item.humidity_3) : null);
                                    const humidity4Data = data.map(item => item.humidity_4 ? parseFloat(item.humidity_4) : null);

                                    const ctx = document.getElementById('humidityChart').getContext('2d');
                                    const chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: timeLabels,
                                            datasets: [{
                                                    label: 'رطوبت 1',
                                                    data: humidity1Data,
                                                    borderColor: 'red',
                                                    fill: false
                                                },
                                                {
                                                    label: 'رطوبت 2',
                                                    data: humidity2Data,
                                                    borderColor: 'blue',
                                                    fill: false
                                                },
                                                {
                                                    label: 'رطوبت 3',
                                                    data: humidity3Data,
                                                    borderColor: 'green',
                                                    fill: false
                                                },
                                                {
                                                    label: 'رطوبت 4',
                                                    data: humidity4Data,
                                                    borderColor: 'orange',
                                                    fill: false
                                                }
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: false
                                                }
                                            }
                                        }
                                    });
                                }

                                // اجرای درخواست و رسم نمودار
                                const tempApiUrl = '{{ url("panel/getDeviceTemps/$serial") }}';
                                const humApiUrl = '{{ url("panel/getDeviceHumidity/$serial") }}';
                                getDataFromAPI(tempApiUrl)
                                    .then(data => drawTempChart(data));

                                getDataFromAPI(humApiUrl)
                                    .then(data => drawHumidityChart(data));
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
</body>

</html>
