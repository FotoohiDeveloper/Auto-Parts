
<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه نمایش</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
<style>
* {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.chartMenu {
    width: 100vw;
    height: 40px;
    background: #1A1A1A;
    color: rgba(54, 162, 235, 1);
}
.chartMenu p {
    padding: 10px;
    font-size: 20px;
}
.chartCard {
    width: 100vw;
    height: calc(100vh - 40px);
    background: rgba(54, 162, 235, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}
.chartBox {
    width: 700px;
    padding: 20px;
    border-radius: 20px;
    border: solid 3px rgba(54, 162, 235, 1);
    background: white;
}
</style>

  </head>
  <body dir="rtl">
    

    <div class="container mt-5">
        <h1 class="text-center">صفحه نمایش اطلاعات دستگاه</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <h2 class="text-center">{{ $device->device_name }}</h2>
                <table class="table table-responsive">
                    <thead>
                        <tr>
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
                            <th>تاریخ و ساعت</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statuses as $status)
                            <tr>
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
                                <td>{{ convertNormal($status->created_at) }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <h2 class="text-center">نمایش دما</h2>
            <div class="col-md-12">
                <canvas id="temperatureChart"></canvas>
            </div>
        </div>

        <div class="row mt-4">
            <h2 class="text-center">نمایش رطوبت</h2>
            <div class="col-md-12">
                <canvas id="humidityChart"></canvas>
            </div>
        </div>


    </div>

    <script>
        // Data and options for the first area chart


        // وقتی صفحه کاملاً بارگیری شد
        window.addEventListener('load', () => {
            // ایجاد یک تایمر کوتاه تا پرینت بلافاصله اجرا شود
            setTimeout(() => {
                // ایجاد یک فایل PDF با استفاده از Print
                window.print();
            }, 1000); // یک ثانیه تا پرینت انجام شود
        });

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
        const tempApiUrl = '{{ url("panel/getDeviceTemps/$device->serial_number") }}';
        const humApiUrl = '{{ url("panel/getDeviceHumidity/$device->serial_number") }}';
        getDataFromAPI(tempApiUrl)
            .then(data => drawTempChart(data));

        getDataFromAPI(humApiUrl)
            .then(data => drawHumidityChart(data));
    </script>


  </body>
</html>
