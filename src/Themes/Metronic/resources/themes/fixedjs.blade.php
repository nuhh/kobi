        <!--[if lt IE 9]>
                        {{script('assets/global/plugins/respond.min.js')}}
                        {{script('assets/global/plugins/excanvas.min.js')}}
                <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {{script('assets/global/plugins/jquery.min.js')}}
        {{script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
        {{script('assets/global/plugins/js.cookie.min.js')}}
        {{script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}
        {{script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
        {{script('assets/global/plugins/jquery.blockui.min.js')}}
        {{script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {{script('assets/global/scripts/app.min.js')}}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {{script('assets/layouts/layout/scripts/layout.min.js')}}
        {{script('assets/layouts/layout/scripts/demo.min.js')}}
        <!-- END THEME LAYOUT SCRIPTS -->
        @if(isset($datatablesContent) and $datatablesContent == true)
        {{script('assets/global/scripts/datatable.js')}}
        {{script('assets/global/plugins/datatables/datatables.min.js')}}
        {{script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}
        @endif