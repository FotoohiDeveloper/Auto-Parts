<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo ">
        <a href="{{ url('panel') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">داشبورد</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow" style="display: none;"></div>



    <ul class="menu-inner py-1 ps ps__rtl">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::is('Device') ? 'active' : '' }}" style="">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="دستگاه ها">دستگاه ها</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('CarT') ? 'active' : '' }}">
                    <a href="{{ url('panel/Device/My') }}" class="menu-link">
                        <div data-i18n="لیست دستگاه ها">لیست دستگاه ها</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('Device') ? 'active' : '' }}">
                    <a href="{{ url('panel/CarT/My') }}" class="menu-link">
                        <div data-i18n="مدیریت Car-T">مدیریت Car-T</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('Device/Add') ? 'active' : '' }}">
                    <a href="{{ url('panel/Device/My/Add') }}" class="menu-link">
                        <div data-i18n="افزودن دستگاه">افزودن دستگاه</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-car"></i>
                <div data-i18n="رانندگان">رانندگان</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('panel/Driver/My') }}" class="menu-link">
                        <div data-i18n="لیست تمام راننده ها">لیست تمام راننده ها</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('panel/Driver/Add') }}" class="menu-link">
                        <div data-i18n="افزودن راننده">افزودن راننده</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-exclamation fa-beat"></i>
                <div data-i18n="هشدار ها">هشدار ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('panel/Errors/My') }}" class="menu-link">
                        <div data-i18n="لیست هشدار ها">لیست هشدار ها</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-location"></i>
                <div data-i18n="موقعیت">موقعیت</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('panel/CarT/Location') }}" class="menu-link">
                        <div data-i18n="موقعیت Car-T">موقعیت Car-T</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">پروفایل</span>
        </li>
        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="تنظیمات حساب">تنظیمات حساب</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('panel/Profile') }}" class="menu-link">
                        <div data-i18n="پروفایل">پروفایل</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('panel/ChangePassword') }}" class="menu-link">
                        <div data-i18n="تغییر کلمه عبور">تغییر کلمه عبور</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('panel/logout') }}" class="menu-link">
                        <div data-i18n="خروج">خروج</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-report"></i>
                <div data-i18n="گزارش گیری">گزارش گیری</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('panel/ManualReport') }}" class="menu-link">
                        <div data-i18n="گزارش دستی">گزارش دستی</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('panel/AutomaticReport') }}" class="menu-link">
                        <div data-i18n="گزارش اتوماتیک">گزارش اتوماتیک</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('panel/AutomaticReportList') }}" class="menu-link">
                        <div data-i18n="لیست گزارش اتوماتیک">لیست گزارش اتوماتیک</div>
                    </a>
                </li>
            </ul>
        </li>
        @if (checkRole())
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">مدیریت</span>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="مدیریت دستگاه ها">مدیریت دستگاه ها</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/Device/all') }}" class="menu-link">
                            <div data-i18n="لیست تمام دستگاه ها">لیست تمام دستگاه ها</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('Device') ? 'active' : '' }}">
                        <a href="{{ url('panel/CarT/All') }}" class="menu-link">
                            <div data-i18n="مدیریت Car-T">مدیریت Car-T</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('panel/Device/Add') }}" class="menu-link">
                            <div data-i18n="افزودن دستگاه">افزودن دستگاه</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-location"></i>
                    <div data-i18n="موقعیت">موقعیت</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/CarT/Locations') }}" class="menu-link">
                            <div data-i18n="موقعیت Car-T">موقعیت Car-T</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="مدیریت کاربر ها">مدیریت کاربر ها</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/User/All') }}" class="menu-link">
                            <div data-i18n="لیست تمام کاربر ها">لیست تمام کاربر ها</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-car"></i>
                    <div data-i18n="رانندگان">رانندگان</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/Driver/All') }}" class="menu-link">
                            <div data-i18n="لیست تمام راننده ها">لیست تمام راننده ها</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-category"></i>
                    <div data-i18n="دسته بندی">دسته بندی</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/Category/All') }}" class="menu-link">
                            <div data-i18n="لیست تمام دسته بندی ها">لیست تمام دسته بندی ها</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('panel/Category/Add') }}" class="menu-link">
                            <div data-i18n="ساخت دسته بندی">ساخت دسته بندی</div>
                        </a>
                    </li>
                </ul>

            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-report"></i>
                    <div data-i18n="گزارش گیری ادمین">گزارش گیری ادمین</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/AdminManualReport') }}" class="menu-link">
                            <div data-i18n="گزارش دستی">گزارش دستی</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('panel/AdminAutomaticReport') }}" class="menu-link">
                            <div data-i18n="گزارش اتوماتیک">گزارش اتوماتیک</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('panel/AdminAutomaticReportList') }}" class="menu-link">
                            <div data-i18n="لیست گزارش اتوماتیک">لیست گزارش اتوماتیک</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 690px; left: 254px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </ul>



</aside>
<!-- / Menu -->
