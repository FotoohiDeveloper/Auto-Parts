<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>لیست دستگاه ها</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        @charset "utf-8";



        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #3498db;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body dir="rtl">
    <div class="container">
        <h1>لیست تمام دستگاه ها</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام دستگاه</th>
                    <th>مدل دستگاه</th>
                    <th>شماره سریال</th>
                    <th>وضعیت دستگاه</th>
                    <th>مالک دستگاه</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $device->device_name }}</td>
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
                        <td>{{ $device->serial_number }}</td>
                        <td>
                            @if ($device->status == 0)
                                <span class="badge bg-label-danger me-1">غیر فعال</span>
                            @else
                                <span class="badge bg-label-success me-1">فعال</span>
                            @endif
                        </td>
                        <td>
                            @if ($device->owner_id == null)
                                مالک ندارد
                            @else
                                {{ $device->owner->first_name . ' ' . $device->owner->last_name }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
