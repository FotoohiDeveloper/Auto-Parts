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
        <li class="menu-item" style="">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="خرید ها">خرید ها</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('invoices') }}" class="menu-link">
                        <div data-i18n="لیست فاکتور ها">لیست فاکتور ها</div>
                    </a>
                </li>
            </ul>
            <li class="menu-item active">
                <a href="{{ route('products') }}" class="menu-link">
                    <div data-i18n="ثبت سفارش جدید">ثبت سفارش جدید</div>
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
                <li class="menu-item">
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
                    <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                    <div data-i18n="مدیریت محصولات">مدیریت محصولات</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('products.list') }}" class="menu-link">
                            <div data-i18n="لیست محصولات">لیست محصولات</div>
                        </a>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('products.add') }}" class="menu-link">
                            <div data-i18n="افزودن محصول">افزودن محصول</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="مدیریت کاربران">مدیریت کاربران</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('users') }}" class="menu-link">
                            <div data-i18n="لیست کاربران">لیست کاربران</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div data-i18n="مدیریت فاکتور ها">مدیریت فاکتور ها</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('invoices.list') }}" class="menu-link">
                            <div data-i18n="لیست فاکتور ها">لیست فاکتور ها</div>
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
