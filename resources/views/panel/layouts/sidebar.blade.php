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
                <div data-i18n="خرید ها">خرید ها</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('CarT') ? 'active' : '' }}">
                    <a href="{{ url('panel/Device/My') }}" class="menu-link">
                        <div data-i18n="لیست خرید ها">لیست خرید ها</div>
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
            <li class="menu-item {{ Request::is('Device') ? 'active' : '' }}">
                <a href="{{ url('panel/CarT/My') }}" class="menu-link">
                    <div data-i18n="خرید جدید">خرید جدید</div>
                </a>
            </li>
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
                    <a href="{{ route('profile') }}" class="menu-link">
                        <div data-i18n="پروفایل">پروفایل</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('panel/change-password') ? 'active' : '' }}">
                    <a href="{{ route('changepassword') }}" class="menu-link">
                        <div data-i18n="تغییر کلمه عبور">تغییر کلمه عبور</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('logout') }}" class="menu-link">
                        <div data-i18n="خروج">خروج</div>
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
                    <div data-i18n="مدیریت خرید ها">مدیریت خرید ها</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('panel/Device/all') }}" class="menu-link">
                            <div data-i18n="لیست تمام خرید ها">لیست تمام خرید ها</div>
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
