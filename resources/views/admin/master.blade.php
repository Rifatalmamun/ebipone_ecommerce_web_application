
 @php
     $ac='';
     $count_pending_product = DB::table('products')->where('status','pending')->count(); 
     $count_block_product = DB::table('products')->where('status','block')->count(); 
     $count_pending_order = DB::table('orders')->where('orders.status','complete')->where('admin_status','pending')->count(); 

     $count_unverified_customer = DB::table('users')->where('email_verified_at',null)->count();
     
     $count_pending_shop = DB::table('users')->where('isVendor',1)->where('shop_status','pending')->count();
     $count_pending_pickup_point =  DB::table('warehouses')->where('w_status','pending')->count();

 @endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>eBipone Admin Panel</title>
        <link rel="shortcut icon" href="{{asset('public/backend/dist/images/favicon.ico')}}">
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/simple-line-icons/css/simple-line-icons.css')}}">        
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/flags-icon/css/flag-icon.min.css')}}">         

        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/chartjs/Chart.min.css')}}">  

        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/morris/morris.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/chartjs/Chart.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/starrr/starrr.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/ionicons/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css')}}">

         <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}">
         <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}">

        <link rel="stylesheet" href="{{asset('public/backend/dist/css/main.css')}}">

                <!-- Sweet alert CDN link -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    </head>

    <body id="main-container" class="default">


        <div id="header-fix" class="header fixed-top">
            <div class="site-width">
                <nav class="navbar navbar-expand-lg  p-0">
                    <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">  
                        <a href="{{route('admin.dashboard')}}" class="horizontal-logo text-left">
                            
                            <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">eBipone</span>              
                        </a>                   
                    </div>
                    <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                        <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                    </div>

                    <form class="float-left d-none d-lg-block search-form">
                        <div class="form-group mb-0 position-relative">
                            <input type="text" class="form-control border-0 rounded bg-search pl-5" placeholder="Search anything...">
                            <div class="btn-search position-absolute top-0">
                                <a href="#"><i class="h6 icon-magnifier"></i></a>
                            </div>
                            <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>                               
                            </a>

                        </div>
                    </form>
                    <div class="navbar-right ml-auto h-100">
                        <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                            <li class="d-inline-block align-self-center  d-block d-lg-none">
                                <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>                               
                                </a>
                            </li>                        

                            <li class="dropdown align-self-center">
                                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-reload h4"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right border  py-0">
                                    <li>
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                                <div class="media-body">
                                                    <p class="mb-0">john</p>
                                                    <span class="text-success">New user registered.</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                                <div class="media-body">
                                                    <p class="mb-0">Peter</p>
                                                    <span class="text-success">Server #12 overloaded.</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                                <div class="media-body">
                                                    <p class="mb-0">Bill</p>
                                                    <span class="text-danger">Application error.</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li><a class="dropdown-item text-center py-2" href="#"> See All Tasks <i class="icon-arrow-right pl-2 small"></i></a></li>
                                </ul>

                            </li>
                            <li class="dropdown align-self-center d-inline-block">
                                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right border   py-0">
                                    <li>
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle w-50">
                                                <div class="media-body">
                                                    <p class="mb-0 text-success">john send a message</p>
                                                    12 min ago
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li >
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                                <div class="media-body">
                                                    <p class="mb-0 text-danger">Peter send a message</p>
                                                    15 min ago
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li >
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                            <div class="media">
                                                <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                                <div class="media-body">
                                                    <p class="mb-0 text-warning">Bill send a message</p>
                                                    5 min ago
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li><a class="dropdown-item text-center py-2" href="#"> Read All Message <i class="icon-arrow-right pl-2 small"></i></a></li>
                                </ul>
                            </li>
                            <li class="dropdown user-profile align-self-center d-inline-block">
                                <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false"> 
                                    <div class="media">                                   
                                        <span class="font-weight-bold">ADMIN</span>
                                    </div>
                                </a>

                                <div class="dropdown-menu border dropdown-menu-right p-0">
                                    
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('admin.logout')}}" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="sidebar">
            <div class="site-width">

                <ul id="side-menu" class="sidebar-menu">
                    <li class="dropdown active"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Dashboard</span></a>                  
                        <ul>

                            <li class="{{ Request::path() == 'admin/dashboard' ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="icon-rocket"></i>Dashboard</a></li>
                            <li class="{{ Request::path() == 'admin/customer' ? 'active' : '' }}"><a href="{{route('admin.index.customer')}}"><i class="icon-briefcase"></i>Verified Customer</a></li>
                            
                            <li class="{{ Request::path() == 'admin/unveried-customer' ? 'active' : '' }}"><a href="{{route('admin.unverified.customer')}}"><i class="icon-briefcase"></i>Un-verified Customer 
                                        @if ($count_unverified_customer>0)
                                            <span class="badge badge-danger">{{$count_unverified_customer}}</span> 

                                  

                                        @endif
                                </a>
                            </li>
                            
                        </ul>
                    </li>


                    <li class="dropdown active"><a href="{"><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Transection Section</span></a>                  
                        <ul>

                            <li class="{{ Request::path() == 'admin/order-transaction-list' ? 'active' : '' }}"><a href="{{route('admin.order.transaction.index')}}"><i class="icon-rocket"></i>Order Transaction</a></li>
                            <li class="{{ Request::path() == 'admin/upload-transaction-list' ? 'active' : '' }}"><a href="{{route('admin.upload.transaction.index')}}"><i class="icon-briefcase"></i>Upload Transaction</a></li>

                        </ul>
                    </li>



                    <li class="dropdown active"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Category & Brand</span></a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/category' ? 'active' : '' }}"><a href="{{route('admin.index.category')}}"><i class="icon-layers"></i>Category</a></li>

                            <li class="{{ Request::path() == 'admin/subcategory' ? 'active' : '' }}"><a href="{{route('admin.index.subcategory')}}"><i class="icon-layers"></i>Sub Category</a></li>

                            <li class="{{ Request::path() == 'admin/microcategory' ? 'active' : '' }}"><a href="{{route('admin.index.microcategory')}}"><i class="icon-layers"></i>Micro Category</a></li>

                            <li class="{{ Request::path() == 'admin/brand' ? 'active' : '' }}"><a href="{{route('admin.index.brand')}}"><i class="icon-layers"></i>Brand</a></li> 
                        </ul>
                    </li>

                    <li class="dropdown active"><a href=""><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Shop Section</span></a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/shop' ? 'active' : '' }}"><a href="{{route('admin.index.shop')}}"><i class="icon-layers"></i>Active Shop</a></li>
                            <li class="{{ Request::path() == 'admin/shop/pending' ? 'active' : '' }}"><a href="{{route('admin.pending.shop')}}"><i class="icon-layers"></i>Pending Shop 
                            
                                @if ($count_pending_shop>0)
                                            <span class="badge badge-danger">{{$count_pending_shop}}</span> 


                                        @endif
                            
                            </a></li>
                            <li class="{{ Request::path() == 'admin/shop/block' ? 'active' : '' }}"><a href="{{route('admin.block.shop')}}"><i class="icon-layers"></i>Block Shop</a></li>


                        </ul>
                    </li>


                    <li class="dropdown active"><a href=""><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Pickup Point Section</span></a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/Warehouse' ? 'active' : '' }}"><a href="{{route('admin.all.warehouse')}}"><i class="icon-layers"></i>Active Pickup Point</a></li>
                            <li class="{{ Request::path() == 'admin/pending-pickup-point' ? 'active' : '' }}"><a href="{{route('admin.pending.warehouse')}}"><i class="icon-layers"></i>Pending Pickup Point 
                            
                                @if ($count_pending_pickup_point>0)
                                            <span class="badge badge-danger">{{$count_pending_pickup_point}}</span> 
                                @endif
                            
                            </a></li>
                            <li class="{{ Request::path() == 'admin/block-pickup-point' ? 'active' : '' }}"><a href="{{route('admin.block.warehouse')}}"><i class="icon-layers"></i>Block Pickup Point</a></li>


                        </ul>
                    </li>












                    <li class="dropdown"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Product Section</span></a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/all/products' ? 'active' : '' }}"><a href="{{route('admin.all.products')}}"><i class="icon-rocket"></i>All Product </a></li>

                            <li class="{{ Request::path() == 'admin/active/products' ? 'active' : '' }}"><a href="{{route('admin.active.products')}}"><i class="icon-rocket"></i>Active Product </a></li>

                            <li class="{{ Request::path() == 'admin/pending/products' ? 'active' : '' }}"><a href="{{route('admin.pending.products')}}"><i class="icon-rocket"></i>Pending Product  
                                
                                    @if ($count_pending_product>0)
                                    <sup class="badge badge-sm badge-danger ml-3 "> {{$count_pending_product}} </sup>
                                    @else
                                    <sup class="badge badge-sm badge-secondary ml-3 "> {{$count_pending_product}} </sup>
                                    @endif

                                 </a></li> 

                            <li class="{{ Request::path() == 'admin/block/products' ? 'active' : '' }}"><a href="{{route('admin.block.products')}}"><i class="icon-rocket"></i>Block Product  
                                
                                @if ($count_block_product>0)
                                <sup class="badge badge-sm badge-danger ml-3 "> {{$count_block_product}} </sup>
                                @else
                                <sup class="badge badge-sm badge-secondary ml-3 "> {{$count_block_product}} </sup>
                                @endif
                                </a></li> 


                        </ul>
                    </li>

                    <!-- <li class="dropdown"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i><span class="text-primary font-weight-bold">Order Section</span> </a>               
                        <ul>
                            <li class="{{ Request::path() == 'admin/all/orders' ? 'active' : '' }}"><a href="{{route('admin.all.orders')}}"><i class="icon-rocket"></i>All Order </a></li>

                            <li class="{{ Request::path() == 'admin/pending/orders' ? 'active' : '' }}"><a href="{{route('admin.pending.orders')}}"><i class="icon-rocket"></i>Pending Order 
                                
                                @if ($count_pending_order>0)
                                <sup class="badge badge-sm badge-danger ml-3 "> {{$count_pending_order}} </sup>
                                @else
                                <sup class="badge badge-sm badge-secondary ml-3 "> {{$count_pending_order}} </sup>
                                @endif
                            
                            </a></li>

                            <li class="{{ Request::path() == 'admin/delivery/orders' ? 'active' : '' }}"><a href="{{route('admin.delivery.orders')}}"><i class="icon-rocket"></i>Delivery Order   </a></li> 
                            <li class="{{ Request::path() == 'admin/delivered/orders' ? 'active' : '' }}"><a href="{{route('admin.delivered.orders')}}"><i class="icon-rocket"></i>Delivered Order   </a></li> 
                        </ul>
                    </li> -->

                    <li class="dropdown"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i> <span class="text-primary font-weight-bold">Home page setting</span> </a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/section' ? 'active' : '' }}"><a href="{{route('admin.section')}}"><i class="icon-rocket"></i>Product Section </span> </a></li> 

                            <li class="{{ Request::path() == 'admin/admin/homepage/brand' ? 'active' : '' }}"><a href="{{route('admin.homebrand')}}"><i class="icon-rocket"></i>Brand Section </span> </a></li> 

                            <li class="{{ Request::path() == 'admin/admin/homepage/shop' ? 'active' : '' }}"><a href="{{route('admin.homeshop')}}"><i class="icon-rocket"></i>Shop Section </span> </a></li> 

                        </ul>
                    </li>

                    <!--GIFT VOUCHER MODULE-->

                    <li class="dropdown"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i> <span class="text-primary font-weight-bold">Gift Voucher</span> </a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/giftvoucher' ? 'active' : '' }}"><a href="{{route('admin.index.giftvoucher')}}"><i class="icon-rocket"></i>All gift voucher </span> </a></li> 
                            <li class="{{ Request::path() == 'admin/create/giftvoucher' ? 'active' : '' }}"><a href="{{route('admin.create.giftvoucher')}}"><i class="icon-rocket"></i>Add gift voucher </span> </a></li> 

                        </ul>
                    </li>

                    <!--PROFIT CALCULATION MODULE-->

                    <li class="dropdown"><a href="{{route('admin.dashboard')}}"><i class="text-primary font-weight-bold icon-home mr-1"></i> <span class="text-primary font-weight-bold">Profit Percentage</span> </a>                  
                        <ul>
                            <li class="{{ Request::path() == 'admin/profit/percent' ? 'active' : '' }}"><a href="{{route('admin.profit.percent')}}"><i class="icon-rocket"></i>View & Edit</span> </a></li> 
                        </ul>
                    </li>
                    
                </ul>
                <!-- END: Menu-->
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">Dashboard</li> 
                </ol>
            </div>
        </div>
        <!-- END: Main Menu-->


        @yield('content')


        <!-- END: Content-->
        <!-- START: Footer-->
        {{-- <footer class="site-footer">
            2020 &copy; ONGSHO
        </footer> --}}
        <!-- END: Footer-->


        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center"> 
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="{{asset('public/backend/dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/moment/moment.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>    
        <script src="{{asset('public/backend/dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="{{asset('public/backend/dist/js/app.js')}}"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="{{asset('public/backend/dist/vendors/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/morris/morris.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/starrr/starrr.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.canvaswrapper.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.colorhelpers.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.saturated.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.browser.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.drawSeries.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.uiConstants.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.legend.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-flot/jquery.flot.pie.js')}}"></script>        
        <script src="{{asset('public/backend/dist/vendors/chartjs/Chart.min.js')}}"></script>  
        <script src="{{asset('public/backend/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/apexcharts/apexcharts.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="{{asset('public/backend/dist/js/home.script.js')}}"></script>
        <!-- END: Page JS-->
        <script src="{{asset('public/backend/dist/js/app.contactlist.js')}}"></script>
        <!-- END: Template JS-->       



        <!-- START: Page Vendor JS-->
        <script src="{{asset('public/backend/dist/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page Script JS-->        
        <script src="{{asset('public/backend/dist/js/datatable.script.js')}}"></script>
        <!-- END: Page Script JS-->






    <!--Normal sweet alert nonification-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){ 
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
   </script>  

<script>  
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "OK? or Cancle",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Data!");
             }
           });
       });
  </script>

  <!-- APPROVE PRODUCT SCRIPT -->

  <script>  
    $(document).on("click", "#approveProduct", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to approve this product? ",
             text: "Approve? or Cancle",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Pending!"); 
             }
           });
       });
  </script>
    <!-- BLOCK PRODUCT SCRIPT -->

    <script>  
        $(document).on("click", "#blockProduct", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to block this product? ",
                 text: "Block? or Cancle",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe!"); 
                 }
               });
           });
      </script>
          <!-- UNBLOCK PRODUCT SCRIPT -->

    <script>  
        $(document).on("click", "#unblockProduct", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to unblock this product? ",
                 text: "Un Block? or Cancle",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe!"); 
                 }
               });
           });
      </script>

<script>  
    $(document).on("click", "#unblock", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to unblock?",
             text: "Unblock? or Cancle",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe!"); 
             }
           });
       });
  </script>

<script>  
    $(document).on("click", "#block", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to block?",
             text: "Block? or Cancle",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe!"); 
             }
           });
       });
  </script>

<script>  
    $(document).on("click", "#approve", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to approve?",
             text: "Approve? or Not",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe!"); 
             }
           });
       });
  </script>

<script>  
    $(document).on("click", "#verifyMail", function(e){
        e.preventDefault();
        var link = 'verify/email-for-all-user';
           swal({
             title: "Email verify for all customer? ",
             text: "Are you sure? or Cancle",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Data no change!"); 
             }
           });
       });
  </script>


<!--black list word-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script>
            var txtBox = $('.blockBox');
            var blackList =  ['.'];
            function checkBlackList(str) {
            $.each(blackList, function(i, n) {
                //alert(i,n)
                if(new RegExp(n, "i").test(str)) {
                txtBox.val(txtBox.val().replace(new RegExp(n, "gi"), '')) 
                }
            })
            }
            txtBox.on('keyup', function(e) {
            checkBlackList(this.value);
            })
</script>

























    </body>
    <!-- END: Body-->
</html>
