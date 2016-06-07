<div class="page-bar">
    @if($__env->yieldContent('breadcrumb'))
    <ul class="page-breadcrumb">
        @yield('breadcrumb')
    </ul>
    @endif
    @yield('pageToolBar')
</div>