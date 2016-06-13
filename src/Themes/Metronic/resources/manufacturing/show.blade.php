@extends('zahmetsizce::themes.main')

@set('datatablesContent', true)

@section('content')
<h3 class="page-title"> Üretim Emri İçin Gerekli Olan Parça Detayları </h3>
	<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
		<thead>
			<tr>
				<th>Parça</th>
				<th>Gereken Adet</th>
				<th>Ayırtılan Adet</th>
				<th>Açıklama</th>
				<th>Alt Parçaları</th>
				<th>İşlemler</th>
			</tr>
		</thead>
		<tbody>
			@foreach($gerekenMalzemeler as $partId => $value)
				@foreach($value as $k)
					@if($k['is_lower_part']==1)
						<tr>
							<td>{{$k->getPart['title']}}</td>
							<td>{{numberFormat($k['quantity'])}}</td>
							<td>{{numberFormat($k['reserved'])}}</td>
							<td>
								@if($partId==0)
									Ana Parça
								@endif
							</td>
							<td>
								@foreach($k->emirId($detail['id'])->itemId($k['part_id'])->get() as $key => $e)
									{{$e->getPart['title']}}
									@if(isset($k->emirId($detail['id'])->itemId($k['part_id'])->get()[$key+1]))
										,
									@endif
								@endforeach
							</td>
							<td>
							   <div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlemler
										<i class="fa fa-angle-down"></i>
									</button>
										<ul class="dropdown-menu" role="menu">
										<li>
											@if($k['remainder']>0)
												@if($k->getUygunLotlar->count()>0)
													<a href="{{route('consumeProductionNeededParts', $k['id'])}}">Tüket</a>
												@else
													Depoda tanımlı parça yok
												@endif
											@else
												Tamamlandı
											@endif
										</li>
									</ul>
								</div>
							</td>
						</tr>
					@else
						<tr>
							<td>{{$k->getPart['title']}}</td>
							<td>{{numberFormat($k['quantity'])}}</td>
							<td>{{numberFormat($k['reserved'])}}</td>
							<td>
								Üretimin Alt Parçası
							</td>
							<td>
								@foreach($k->emirId($detail['id'])->itemId($k['part_id'])->get() as $key => $e)
									{{$e->getPart['title']}}
									@if(isset($k->emirId($detail['id'])->itemId($k['part_id'])->get()[$key+1]))
										,
									@endif
								@endforeach
							</td>
							<td>
							   <div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlemler
										<i class="fa fa-angle-down"></i>
									</button>
										<ul class="dropdown-menu" role="menu">
										<li>
											@if($k['remainder']>0)
												@if($k->getUygunLotlar->count()>0)
													<a href="{{route('consumeProductionNeededParts', $k['id'])}}">Tüket</a>
												@else
													Depoda tanımlı parça yok
												@endif
											@else
												Tamamlandı
											@endif
										</li>
									</ul>
								</div>
							</td>
						</tr>
					@endif
				@endforeach
			@endforeach
		</tbody>
	</table>
	<h3>Yapılacak işlemler</h3>
	<table class="table table-bordered">
		@foreach($islemler as $partId => $value)
			<tr>
				<th colspan="2">{{$value[0]->getPart['title']}} Parçası İçin Yapılacak İşlemler</th>
			</tr>
			@foreach($value as $k)
				<tr>
					<td>{{$k['operation']}}</td>
					<td>
						@if($k['status']==1)
						   <div class="btn-group">
								<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlemler
									<i class="fa fa-angle-down"></i>
								</button>
									<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{route('finishProductionRotation', $k['id'])}}">Tamamla</a>
									</li>
								</ul>
							</div>
						@else
							Tamamlandı
						@endif
					</td>
				</tr>
			@endforeach
		@endforeach
	</table>
	<h3>Üretim Sonucu Oluşacak Parçalar</h3>
	<table class="table table-bordered">
		<tr>
			<th>Parça</th>
			<th>Adet</th>
		</tr>
		@foreach($olusacaklar as $e)
			<tr>
				<td>{{$e->getPart['title']}}</td>
				<td>{{$e['quantity']}}</td>
			</tr>
		@endforeach
	</table>
@endsection

@section('title')
	{{$detail['production_order_code']}} Kodlu Üretim Emri
@endsection

@section('ekjs')
<script type="text/javascript">
var TableDatatablesManaged = function () {

	var initTable1 = function () {

		var table = $('#sample_1');

		// begin first table
		table.dataTable({

			// Or you can use remote translation file
			"language": {
			   url: '{{asset('assets/global/scripts/datatable.json')}}'
			},

			// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
			// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
			// So when dropdowns used the scrollable div should be removed. 
			//"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

			"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

			"columnDefs": [{
				"targets": 5,
				"orderable": false,
				"searchable": false
			}],

			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "All"] // change per page values here
			],
			// set the initial value
			"pageLength": -1,			
			"pagingType": "bootstrap_full_number" // set first column as a default sort by asc
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

@section('breadcrumb')
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim Emirleri', 'productionOrders'],
	[$detail['production_order_code']]
])}}
@endsection

@section('pageToolBar')
<div class="page-toolbar">
	<div class="btn-group pull-right">
		<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> İşlemler
			<i class="fa fa-angle-down"></i>
		</button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>
				 <a data-toggle="modal" href="#sila">
				 	<i class="icon-trash"></i> Sil </a>
			</li>
		</ul>
	</div>
</div>
{{modal('sila', 'deleteProductionOrder', $detail['id'])}}
@endsection