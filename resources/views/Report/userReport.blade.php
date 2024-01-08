{{-- <!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>لیست کاربران</title>
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
        <h1>لیست تمام کاربران</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره موبایل</th>
                    <th>کد ملی</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->number }}</td>
                        <td>{{ $user->national_code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html> --}}


