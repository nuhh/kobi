@extends('zahmetsizce::themes.main')

@set('datatablesContent', true)

@section('content')
<h3 class="page-title"> Ürün Ağaçları </h3>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
			<thead>
				<tr>
					<th> BOM Kodu </th>
					<th> BOM Adı </th>
					<th> İşlemler </th>
				</tr>
			</thead>
			<tbody>
				@foreach($boms as $bom)
					<tr>
						<td>{{$bom['bom_code']}}</td>
						<td>{{$bom['title']}}</td>
						<td>
                           <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlemler
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('editBom', $bom['id'])}}">
                                            <i class="icon-docs"></i> Düzenle </a>
                                    </li>
                                    <li>
                                        <a href="{{route('showBom', $bom['id'])}}">
                                            <i class="icon-tag"></i> İncele </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="#sil{{$bom['id']}}">
                                            <i class="icon-user"></i> Sil </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{route('definePartToBom', $bom['id'])}}">
                                            <i class="icon-flag"></i> Parça Tanımla
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('defineRouteToBom', $bom['id'])}}">
                                            <i class="icon-star"></i> Rota Tanımla
                                        </a>
                                    </li>
                                </ul>
                            </div>
						</td>
					</tr>
                    {{modal('sil'.$bom['id'], 'deleteBom', $bom['id'])}}
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('title')
	Ürün Ağaçları
@endsection

@section('breadcrumb')
{{breadcrumb([
    ['Home', 'homePage'],
    ['Üretim', '#'],
    ['Ürün Ağaçları']
])}}
@endsection

@section('ekjs')
<script type="text/javascript">
var TableDatatablesManaged = function () {

    var initTable1 = function () {

        var table = $('#sample_1');

        // begin first table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records found",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "columnDefs": [{
				"targets": 2,
				"orderable": false,
				"searchable": false
			}],

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,            
            "pagingType": "bootstrap_full_number",
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

	}

	return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
}
</script>
@endsection


@section('pageToolBar')
<div class="page-toolbar">
    <div class="btn-group pull-right">
        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> İşlemler
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <a href="{{route('newBom')}}">
                    <i class="icon-bell"></i> Yeni </a>
            </li>
        </ul>
    </div>
</div>
@endsection