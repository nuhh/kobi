				<div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu page-sidebar-menu-light  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="50" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  sidebar-search-bordered" action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start @if(isset($theme['first']) and $theme['first'] == 'production') active @endif">
                            <a href="{{route('productionOrders')}}" class="nav-link nav-toggle">
                                <i class="fa fa-industry"></i>
                                <span class="title">İmalat</span>
                            </a>
                        </li>
                        <li class="nav-item last @if(isset($theme['first']) and $theme['first'] == 'stock') active @endif">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bolt"></i>
                                <span class="title">Ürünler</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item @if(isset($theme['second']) and $theme['second'] == 'parts') active @endif">
                                    <a href="{{route('parts')}}" class="nav-link ">
                                        <span class="title">Parçalar</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(isset($theme['second']) and $theme['second'] == 'lots') active @endif">
                                    <a href="{{route('lots')}}" class="nav-link ">
                                        <span class="title">Lotlar</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(isset($theme['second']) and $theme['second'] == 'bom') active @endif"">
                                    <a href="{{route('boms')}}" class="nav-link ">
                                        <span class="title">Ürün Ağaçları</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(isset($theme['second']) and $theme['second'] == 'rotasyon') active @endif">
                                    <a href="{{route('routes')}}" class="nav-link ">
                                        <span class="title">Rotasyonlar</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(isset($theme['second']) and $theme['second'] == 'inventory') active @endif">
                                    <a href="{{route('inventory')}}" class="nav-link ">
                                        <span class="title">Depo</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
           <!-- END SIDEBAR -->
            </div>