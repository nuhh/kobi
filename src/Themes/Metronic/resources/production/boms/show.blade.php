@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parça Detayları </h3>
	<table class="table table-bordered">
		<tr>
			<th>{{trans('e.bomCode')}}</th>
			<td>{{$detail['bom_code']}}</td>
		</tr>
		<tr>
			<th>{{trans('e.bomTitle')}}</th>
			<td>{{$detail['title']}}</td>
		</tr>
		<tr>
			<th>Oluşan Parçalar</th>
			<td>
				@if($detail->getComposedParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{trans('e.part')}}</th>
								<th>{{trans('e.transactions')}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getComposedParts as $e)
								<tr>
									<td>{{$e->getItem['title']}}</td>
									<td>{{sil('deleteComposedPartFromBom', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					{{trans('thereIsNoComposedPart')}}
				@endif
			</td>
		</tr>
		<tr>
			<th>{{trans('e.neededParts')}}</th>
			<td>
				@if($detail->getNeededParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{trans('e.part')}}</th>
								<th>Adet</th>
								<th>{{trans('e.transactions')}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getNeededParts as $e)
								<tr>
									<td>{{$e->getPart['title']}}</td>
									<td>{{numberFormat($e['quantity'])}}</td>
									<td>{{sil('deleteNeededPartFromBom', $e['id'])}} {{edit('editNeededPartForBom', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					{{trans('thereIsNoNeededPart')}}
				@endif
			</td>
		</tr>
		<tr>
			<th>{{trans('e.connectedPartsForBom')}}</th>
			<td>
				@if($detail->getConnectedParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{trans('e.part')}}</th>
								<th>{{trans('e.transactions')}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getConnectedParts as $e)
								<tr>
									<td>{{$e->getItem['title']}}</td>
									<td>{{tableTool(trans('e.remove'), 'removeConnectionPartBom', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					{{trans('e.thereIsNoConnectedPartForBom')}}
				@endif
			</td>
		</tr>
		<tr>
			<th>{{trans('e.connectedRotationsForBom')}}</th>
			<td>
				@if($detail->getConnectedRoutes->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>{{trans('e.route')}}</th>
								<th>{{trans('e.description')}}</th>
								<th>{{trans('e.transactions')}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getConnectedRoutes as $e)
								<tr>
									<td>{{$e->getRoute['title']}}</td>
									<td>
										@if($e['default']==2)
											{{trans('e.default')}}
										@endif
									</td>
									<td>
										{{tableTool('Kaldır', 'removeConnectionBomRoute', $e['id'])}}
										@if($e['default']==1)
											{{tableTool('Öntanımlı yap', 'makeRouteDefaultForBom', $e['id'])}}
										@else
											{{tableTool('Öntanımı Kaldır', 'removeDefaultRouteFromRoute', $e['id'])}}
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					{{trans('e.thereIsNoConnectedRotationForBom')}}
				@endif
			</td>
		</tr>
	</table>
@endsection

@section('title')
	Parça Detayları
@endsection

@section('breadcrumb')
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Ürün Ağaçları', 'boms'],
	[$detail['title']]
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
				 <a data-toggle="modal" href="#sil">
				 	<i class="icon-trash"></i> Sil </a>
			</li>
			<li>
				<a href="{{route('editBom', $detail['id'])}}">
					<i class="icon-bell"></i> Düzenle </a>
			</li>
			<li>
				<a href="{{route('addComposedPartToBom', $detail['id'])}}">
					<i class="icon-star"></i> Oluşan Parça Ekle </a>
		   	</li>
			<li>
				<a href="{{route('addNeededPartToBom', $detail['id'])}}">
					<i class="icon-star"></i> Gerekli Parça Ekle </a>
		   	</li>
		</ul>
	</div>
</div>
{{modal('sil', 'deleteBom', $detail['id'])}}
@endsection