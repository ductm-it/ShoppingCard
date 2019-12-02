<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <title>Adminto - Responsive Admin Dashboard Template</title>

    <!-- Custom box css -->
    <link href="{{asset('assets/plugins/custombox/dist/custombox.min.css')}}" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />


    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/admin" class="logo"><span>C-H-D<span></span></span><i class="mdi mdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">

                    <!-- Page title -->
                    <ul class="nav navbar-nav list-inline navbar-left">
                        <li class="list-inline-item">
                            <button class="button-menu-mobile open-left">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="page-title">AdminPage</h4>
                        </li>
                    </ul>

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            
                                <!-- Notification -->
                                
                                <!-- End Notification bar -->
                            <

                            <li class="hide-phone">
                                <form class="app-search">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>

                        </ul>
                    </nav>
                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    @if(Auth::check())
                    <h5><a id="user-name" style="color:white;font-size:25px">{{Auth::user()->fullname}}</a> </h5>
                    @endif
                    <ul class="list-inline">
                        {{-- <li class="list-inline-item">
                            <a id="btn-logout" class="text-custom">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li> --}}
                        <li class="list-inline-item">
                            <a id="btn-logout" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-log-out"></span> Log out
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <!-- Quản lý nhân viên -->
                        <li>
                            <a href="/admin/manageStaff" class="waves-effect"><i class="mdi mdi-format-font"></i> <span>
                                    Staff Management </span> </a>
                        </li>


                        <!--
                            <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="mdi mdi-chart-donut-variant"></i><span> Quản lý sản phẩm </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#">Sản phẩm 1</a></li>
                                <li><a href="#">Sản phẩm 2</a></li>
                                <li><a href="#">Sản phẩm 3</a></li>
                            </ul>
                       
                        </li>
                         -->

                        <!-- quản lý người dùng -->
                        <li>
                            <a href="/admin/manageUser" class="waves-effect"><i class="mdi mdi-format-font"></i> <span>
                                    User Management </span> </a>
                        </li>


                        <!--quản lý sản phẩm -->
                        <li>
                            <a href="/admin/manageProduct" class="waves-effect"><i class="mdi mdi-format-font"></i> <span>
                                    Product Management </span> </a>
                        </li>

                        <!--quản lý category -->
                        <li>
                            <a href="/admin/category" class="waves-effect"><i class="mdi mdi-format-font"></i> <span>
                                    category Management </span> </a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">

                    @section('main-content')
                    @show


                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2016 - 2019 © Adminto. Coderthemes.com
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/detect.js')}}"></script>
    <script src="{{asset('assets/js/fastclick.js')}}"></script>
    <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    



    


    <!-- App js -->
    <script src="{{asset('assets/js/jquery.core.js')}}"></script>
    <script src="{{asset('assets/js/jquery.app.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
        $('#tableStaffs').DataTable()
        });
    </script>

    <!-- Modal-Effect -->
    <script src="{{asset('assets/plugins/custombox/dist/custombox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/custombox/dist/legacy.min.js')}}"></script>

    <!-- XEditable Plugin -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/pages/jquery.xeditable.js')}}"></script>

    <script src="{{asset('assets/pages/staffManagement.js')}}"></script>
    <script src="{{asset('assets/pages/categoryManagement.js')}}"></script>
    <script src="{{asset('assets/pages/productManagement.js')}}"></script>
    <script src="{{asset('assets/pages/userManagement.js')}}"></script>

    <script>
        $('#btn-logout').click(() => {
            $.post("/api/logout",
                {
                  
                },
                function (data, status) {
                   location.reload() 
                });
        })
    </script>

</body>

</html>