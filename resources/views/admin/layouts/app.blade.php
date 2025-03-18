<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
<title>@yield('title') || {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{assets/images/favicon.ico}"> --}}
    <link href="{{ asset('website/assets/img/favicon.png')}}" rel="icon">
    <!-- Fullcalendar css -->
    {{-- <link href="assets/vendor/fullcalendar/main.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{asset('theme/dist/assets/vendor/fullcalendar/main.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    {{-- <script src="assets/js/config.js"></script> --}}
    <script src="{{asset('theme/dist/assets/js/config.js')}}"></script>
    <!-- Quill css -->
    <link href="{{ asset('theme/dist/assets/vendor/quill/quill.core.css" rel="stylesheet')}}" type="text/css" />
    <link href="{{ asset('theme/dist/assets/vendor/quill/quill.snow.css" rel="stylesheet')}}" type="text/css" />
    <link href="{{ asset('theme/dist/assets/vendor/quill/quill.bubble.css" rel="stylesheet')}}" type="text/css" />
    <!-- App css -->
    {{-- <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" /> --}}
    <link href="{{asset('theme/dist/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    {{-- <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{asset('theme/dist/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables css -->
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/dist/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        @include('admin.layouts.header')
        <!-- ========== Topbar End ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- ========== Left Sidebar End ========== -->

        <div class="content-page">
            @yield('content')

            <!-- Footer Start -->
            @include('admin.layouts.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">
                                    <img src="assets/images/layouts/dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label" for="layout-mode-fluid">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>

                            <div class="col-4">
                                <div id="layout-boxed">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label" for="layout-mode-boxed">
                                            <img src="assets/images/layouts/boxed.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">
                                    <img src="assets/images/layouts/topbar-dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        <img src="assets/images/layouts/sidebar-light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">
                                        <img src="assets/images/layouts/compact.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        <img src="assets/images/layouts/sm.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>


                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">
                                        <img src="assets/images/layouts/full.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velonic" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/images/favicon.ico') }}">
    <link href="{{ asset('theme/dist/assets/vendor/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('theme/dist/assets/js/config.js') }}"></script>
    <link href="{{ asset('theme/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('theme/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Datatables js -->
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('theme/dist/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>


</body>

</html>
