<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">گزارش</title>
    <link rel="stylesheet" href="{{asset('assets/ksr/index.css')}}">
    <script src="{{asset('assets/ksr/chart.js')}}"></script>
    <script src="{{asset('assets/ksr/axios.min.js')}}"></script>
    <script defer>
        const ReqURL = "http://localhost:8000/api/ManualReport/{{$token}}"
    </script>
    <script src="{{asset('assets/ksr/index.js')}}" defer></script>
</head>
<body>
    <div id="root">
        <header>
            <div class="header">
                <div class="header-item">
                    <p>گزارش دوره ای دستگاه مدل <span id="deviceModel"></span></p>
                </div>
                <div class="header-item">
                    <p>نام دستگاه : <span id="DeviceName"></span></p>
                </div>
                <div class="header-item">
                    <p>شماره سریال : <span id="DeviceSerial"></span></p>
                </div>
                <div class="header-item">
                    <div class="header-time-range">
                        <h5>بازه زمانی:</h5>
                        <div class="header-Dates">
                            <p>از تاریخ : <span id="StartDate"></span></p>
                            <p>تا تاریخ : <span id="EndDate"></span></p>
                        </div>
                    </div>
                </div>
                <div class="header-item">
                    <p>تاریخ گزارش : <span id="ReportDate"></span></p>
                </div>
                <svg onclick="printFunc()" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                </svg>
            </div>
        </header>
        <main>
            <div class="ChartContainer">
                <h2>نمودار رطوبت</h2>
                <div class="Chart">
                    <canvas width="1200px" height="600px" id="humidutyChart">

                    </canvas>
                </div>
            </div>
            <div class="ChartContainer">
                <h2>نمودار دما</h2>

            <div class="Chart">
                <canvas width="1200px" height="600px" id="tempChart">

                </canvas>
            </div>
            </div>
            <div class="TableContainer">
                <h2>جدول رطوبت</h2>
                <div class="Table">
                    <table id="humidityTable"></table>
                </div>
            </div>
            <div class="TableContainer">
                <h2>جدول دما</h2>
                <div class="Table">
                    <table id="tempTable"></table>
                </div>
            </div>
        </main>
    </div>
    <div id="loader">
        <div class="dot-spinner">
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
        </div>
    </div>
</body>
</html>
