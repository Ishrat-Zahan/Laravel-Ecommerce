<!DOCTYPE html>
<html lang="zxx">



<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Shop Dashboard</title>

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" href="{{asset('assets2/assets/img/logo.png') }}" type="image/png">

    <link rel="stylesheet" href="{{asset('assets2/assets/css/bootstrap1.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/swiper_slider/css/swiper.min.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/select2/css/select2.min.css' )}}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/owl_carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/gijgo/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/tagsinput/tagsinput.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/text_editor/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/morris/morris.css') }}">

    <link rel="stylesheet" href="{{asset('assets2/assets/vendors/material_icon/material-icons.css' )}}" />

    <link rel="stylesheet" href="{{asset('assets2/assets/css/metisMenu.css') }}">

    <link rel="stylesheet" href="{{asset('assets2/assets/css/style1.css') }}" />
    <link rel="stylesheet" href="{{asset('assets2/assets/css/invoice.css' )}}" />
    <link rel="stylesheet" href="{{asset('assets2/assets/css/colors/default.css' ) }}" id="colorSkinCSS">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @yield('style');
</head>

<body class="crm_body_bg">



    <nav class="sidebar">

        <div class="logo d-flex justify-content-between">
            <a href="index.html"><img src="{{asset('assets2/assets/img/logo.png') }}" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <img src="{{asset('assets2/assets/img/menu-icon/1.svg') }}" alt="">
                    <span>Products</span>
                </a>
                <ul>
                    <li><a href="{{route('product.index') }}">Manage Product</a></li>
                    <li><a href="{{route('product.create') }}">Create Product</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/2.svg' ) }}" alt="">
                    <span>Category</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('category.index') }}">Manage Category</a></li>
                    <li><a class="active" href="{{route('category.create') }}">Create Category</a></li>

                </ul>

            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/3.svg' ) }}" alt="">
                    <span>Sub-Category</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('subcategory.index') }}">Manage Sub-Category</a></li>
                    <li><a class="active" href="{{route('subcategory.create') }}">Create Sub-Category</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/3.svg' ) }}" alt="">
                    <span>Sub-Sub-Category</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('subsubcategory.index') }}">Manage Sub-Sub-Category</a></li>
                    <li><a class="active" href="{{route('subsubcategory.create') }}">Create Sub-Sub-Category</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/2.svg' ) }}" alt="">
                    <span>Brands</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('brand.index') }}">Manage Brands</a></li>
                    <li><a class="active" href="{{route('brand.create') }}">Create Brands</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/4.svg' ) }}" alt="">
                    <span>Short Banner</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('shortbanner.index') }}">Manage Short Banner</a></li>
                    <li><a class="active" href="{{route('shortbanner.create') }}">Create Short Banner</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/4.svg' ) }}" alt="">
                    <span>Users</span>
                </a>
                <ul>
                    <li><a class="active" href="">Manage User</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/5.svg' ) }}" alt="">
                    <span>Orders</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('order.index') }}">Manage Order</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/6.svg' ) }}" alt="">
                    <span>Supplier</span>
                </a>
                <ul>

                    <li><a href="{{route('supplier.index') }}">Manage Supplier</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/5.svg' ) }}" alt="">
                    <span>Purches</span>
                </a>
                <ul>
                    <li><a class="active" href="{{route('purches.index') }}">Manage Purches</a></li>
                    <li><a class="active" href="{{route('purches.create') }}">Create Purches</a></li>

                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="{{asset('assets2/assets/img/menu-icon/7.svg') }}" alt="">
                    <span>Charts</span>
                </a>
                <ul>
                    <li><a href="chartjs.html">ChartJS</a></li>
                    <li><a href="apex_chart.html">Apex Charts</a></li>
                    <li><a href="chart_sparkline.html">chart sparkline</a></li>
                </ul>
            </li>
        </ul>
    </nav>


    <section class="main_content dashboard_part">

        <div class="container-fluid g-0">
            <div class="row ">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img src="{{asset('assets2/assets/img/icon/icon_search.svg' ) }}" alt=""> </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a href="#"> <img src="{{asset('assets2/assets/img/icon/bell.svg') }}" alt=""> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="{{asset('assets2/assets/img/icon/msg.svg' ) }}" alt=""> </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="{{asset('assets2/assets/img/client_img.png' ) }}" alt="#">
                                <div class="profile_info_iner">
                                    @if (Auth::check())
                                    <p>Welcome </p>
                                    <h5>{{ Auth::user()->name }}!</h5>
                                    <div class="profile_info_details">
                                        <a href="#">My Profile <i class="ti-user"></i></a>
                                        <a href="#">Settings <i class="ti-settings"></i></a>
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                    @else
                                    <!-- Code for when no user is logged in -->
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">


                @yield('content')


            </div>
        </div>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>2023 © - Designed by<a href="#"> Ishrat Zahan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="{{asset('assets2/assets/js/jquery1-3.4.1.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/js/popper1.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/js/bootstrap1.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/js/metisMenu.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/count_up/jquery.waypoints.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/chartlist/Chart.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/count_up/jquery.counterup.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/swiper_slider/js/swiper.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/niceselect/js/jquery.nice-select.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/owl_carousel/js/owl.carousel.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/gijgo/gijgo.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/datatable/js/jquery.dataTables.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/dataTables.responsive.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/dataTables.buttons.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/buttons.flash.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/jszip.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/pdfmake.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/vfs_fonts.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/buttons.html5.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/datatable/js/buttons.print.min.js' ) }}"></script>
    <script src="{{asset('assets2/assets/js/chart.min.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/progressbar/jquery.barfiller.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/tagsinput/tagsinput.js' ) }}"></script>

    <script src="{{asset('assets2/assets/vendors/text_editor/summernote-bs4.js' ) }}"></script>
    <script src="{{asset('assets2/assets/vendors/apex_chart/apexcharts.js' ) }}"></script>

    <script src="{{asset('assets2/assets/js/custom.js' ) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets2/assets/js/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

@yield('script');

</body>

</html>