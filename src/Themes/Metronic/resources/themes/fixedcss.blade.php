		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		{{css('assets/global/css/font-family.css')}}
		{{css('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
		{{css('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
		{{css('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
		{{css('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN THEME GLOBAL STYLES -->
		{{css('assets/global/css/components-rounded.min.css', ['id'=>'style_components'])}}
		{{css('assets/global/css/plugins.min.css')}}
		<!-- END THEME GLOBAL STYLES -->
		<!-- BEGIN THEME LAYOUT STYLES -->
		{{css('assets/layouts/layout/css/layout.min.css')}}
		{{css('assets/layouts/layout/css/themes/light2.min.css', ['id' => 'style_color'])}}
		{{css('assets/layouts/layout/css/custom.min.css')}}
		<!-- END THEME LAYOUT STYLES -->
		<link rel="shortcut icon" href="favicon.ico" />

		@if(isset($datatablesContent) and $datatablesContent == true)
		{{css('assets/global/plugins/datatables/datatables.min.css')}}
		{{css('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}
		@endif