                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                                    href="javascript:void(0);">
                                    <i class="ti ti-search ti-md me-2"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Quick links  -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-layout-grid-add ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end py-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">دسترسی سریع</h5>
                                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Add shortcuts" data-bs-original-title="Add shortcuts"><i
                                                    class="ti ti-sm ti-apps"></i></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container ps ps__rtl">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                                    <i class="ti ti-calendar fs-4"></i>
                                                </span>
                                                @if (checkRole())
                                                    <a href="{{ route('products.add') }}"
                                                        class="stretched-link">افزودن
                                                        محصول</a>
                                                @endif
                                                <small class="text-muted mb-0">لوازم یدکی اسما</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/Default.png') }}" alt=""
                                            class="h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/Default.png') }}"
                                                            alt="" class="h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-medium d-block">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                                                    <small class="text-muted">
                                                        @if (checkRole())
                                                            مدیر
                                                        @else
                                                            کاربر
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">پروفایل من</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('invoices') }}">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                                <span class="flex-grow-1 align-middle">فاکتور های من</span>
                                            </span>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="ti ti-logout me-2 ti-sm"></i>
                                    <span class="align-middle">خروج</span>
                                </a>
                            </li>
                        </ul>
                        </li>
                        <!--/ User -->
                        </ul>
                    </div>


                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input
                                type="text" class="form-control search-input container-xxl border-0 tt-input"
                                placeholder="Search..." aria-label="Search..." autocomplete="off" spellcheck="false"
                                dir="auto" style="position: relative; vertical-align: top;">
                            <pre aria-hidden="true"
                                style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;">p</pre>
                            <div class="tt-menu navbar-search-suggestion ps ps__rtl tt-empty"
                                style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                                <div class="tt-dataset tt-dataset-pages"></div>
                                <div class="tt-dataset tt-dataset-files"></div>
                                <div class="tt-dataset tt-dataset-members"></div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 896px; height: 448px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>
                        </span>
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>



                </nav>

                <!-- / Navbar -->
