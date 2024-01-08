<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - همه مالک  ها</title>
    @include('panel.layouts.style')
</head>

<body class="" style="">
    <noscript>You Need to enable JavaScript</noscript>
    <script>
        function addPhoneNumber() {
            Swal.fire({
                title: 'لطفاً شماره موبایل را وارد نمایید',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'ارسال',
                showLoaderOnConfirm: true,
                preConfirm: (phoneNumber) => {
                    return fetch('/panel/Device/My/{{ $device->serial_number }}/AddPhoneNumber/' + phoneNumber)
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => {
                                    throw new Error(data.message);
                                });
                            }
                            return response.json();
                        })
                        .catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error}`);
                        });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: result.value.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(() => {
                        location.reload(); // بروزرسانی صفحه
                    }, 2000);
                }
            });
        }

        function addEmail() {
        Swal.fire({
            title: 'لطفاً ایمیل را وارد نمایید',
            input: 'email',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ارسال',
            showLoaderOnConfirm: true,
            preConfirm: (email) => {
                return fetch('/panel/Device/My/{{ $device->serial_number }}/AddEmail/' + email)
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.message);
                            });
                        }
                        return response.json();
                    })
                    .catch(error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: result.value.message,
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(() => {
                    location.reload(); // بروزرسانی صفحه
                }, 2000);
            }
        });
    }
    </script>


    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('panel.layouts.sidebar')
            <div class="layout-page">
                @include('panel.layouts.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">مالک ها/</span> همه دستگاه ها
                        </h4>
                            <div class="container text-center">
                                <div class="row align-items-start">
                                  <div class="col">
                                    <button onclick="addPhoneNumber()" class="btn btn-primary me-2 waves-effect waves-light">افزودن شماره</button onclick="showSweet()">
                                  </div>
                                  <div class="col">
                                    <button onclick="addEmail()" class="btn btn-primary me-2 waves-light">افزودن ایمیل</button>
                                  </div>
                                </div>
                            </div>

                        <div class="card my-4">
                            <h5 class="card-header">لیست شماره های مالک</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>شماره تماس</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($owners["owner_numbers"] as $number)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $number }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown"><i
                                                                class="ti ti-dots-vertical"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/My/{$device->serial_number}/DeletePhoneNumber/{$number}") }}"><i
                                                                    class="ti ti-trash me-1"></i>حذف مالک</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card my-4">
                            <h5 class="card-header">لیست ایمیل های مالک</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ایمیل</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($owners["owner_emails"] as $email)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $email }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown"><i
                                                                class="ti ti-dots-vertical"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ url("panel/Device/My/{$device->serial_number}/DeleteEmail/{$email}") }}"><i
                                                                    class="ti ti-trash me-1"></i>حذف مالک</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
