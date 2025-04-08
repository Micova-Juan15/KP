<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selekta Prima Sukses</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('images/foto/logo.jpeg') }}" />
    <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    {{-- <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet"> --}}
    {{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}
    <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet">

    <script src="{{asset('js/datatables.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset ('fontawesome-free-5.15.4-web/css/all.css')}}"  />
    {{-- font awesome --}}


</head>

<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item sidebar-category">
                    <p>Navigation</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    @can('view', App\Models\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="mdi mdi-account-multiple-plus
                            menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>   
                    @endcan 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('barangmentah.index') }}">
                        <i class="fas fa-hand-holding menu-icon"style="font-size: 14px"></i>
                        <span class="menu-title">Bahan Mentah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('barangjadi.index') }}">
                        <i class="fas fa-hand-holding menu-icon" style="font-size: 14px"></i>
                        <span class="menu-title">Barang Jadi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penjualan.index') }}">
                        <i class="fas fa-money-check menu-icon"style="font-size: 14px"></i>
                        <span class="menu-title">Penjualan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pembelian.index') }}">
                        <i class="fas fa-shopping-cart menu-icon " style="font-size: 14px"></i>
                        <span class="menu-title">Pembelian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengantaran.index') }}">
                        <i class="fas fa-truck-loading menu-icon" style="font-size: 14px"></i>
                        <span class="menu-title">Pengantaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#dataMasterMenu" aria-expanded="false"
                        aria-controls="dataMasterMenu">
                        <i class="fas fa-database menu-icon" style="font-size: 14px"></i>
                        <span class="menu-title">Data Master</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="dataMasterMenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sopir.index') }}">Sopir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('penjual.index') }}">Penjual</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pembeli.index') }}">Pembeli</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('truk.index') }}">Truk</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                src="{{ url('images/logo-mini.svg') }}" alt="logo" /></a>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" >  Welcome back, {{ Auth::user()->name }}
                    </h4>
                    <ul class="navbar-nav navbar-nav-right">
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-search d-none d-lg-block">
                            
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                id="profileDropdown">
                                <i class="fas fa-user menu-icon" ></i>
                                <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        class="dropdown-item">
                                        <i class="mdi mdi-logout text-primary"></i> {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>

                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ url('js/off-canvas.js') }}"></script>
    <script src="{{ url('js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ url('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var nama = $(this).data("nama");
            event.preventDefault();
            swal({
                    title: `Apakah Anda yakin ingin menghapus data ${nama} ini?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $.noConflict();
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
        
    </script>
</body>

</html>
