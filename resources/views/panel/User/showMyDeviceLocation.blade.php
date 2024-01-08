<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ url('asset') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>کربن تجهیز - نمایش نقشه</title>
    @include('panel.layouts.style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        .map-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #map {
            width: 600px;
            height: 400px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body class="" style="">
    <!-- بقیه بخش‌های body -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('panel.layouts.sidebar')
            <div class="layout-page">
                @include('panel.layouts.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">دستگاه /</span> نقشه
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">نقشه تغییرات لحظه ای</h5>
                                    <div class="card-body">
                                        <div id="map" style="width: 100%; height: 400px;"></div>
                                    </div>
                                </div>
                                <script>
                                    var map = L.map("map").setView([51.505, -0.09], 13);
                                    var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                        maxZoom: 19,
                                        attribution: "<a>Ali</a>",
                                    }).addTo(map);
                                
                                    var Myurl = '{{ url("panel/getDeviceLocations/$serial") }}';
                                
                                    function getCoordinatesFromApi() {
                                        fetch(Myurl)
                                            .then(response => response.json())
                                            .then(data => {
                                                updateMapWithCoordinates(data);
                                            })
                                            .catch(error => {
                                                console.error('خطا در دریافت مختصات جغرافیایی از API:', error);
                                            });
                                    }
                                
                                    function updateMapWithCoordinates(coordinates) {
                                        var polyline = L.polyline(coordinates, {
                                            color: 'red'
                                        }).addTo(map);
                                
                                        map.fitBounds(polyline.getBounds());
                                    }
                                
                                    getCoordinatesFromApi();
                                </script>
                                
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
