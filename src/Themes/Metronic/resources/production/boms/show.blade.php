@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parça Detayları </h3>
	<table class="table table-bordered">
		<tr>
			<th>Ürün Ağacı Kodu</th>
			<td>{{$detail['bom_code']}}</td>
		</tr>
		<tr>
			<th>Ürün Ağacı Başlığı</th>
			<td>{{$detail['title']}}</td>
		</tr>
		<tr>
			<th>Oluşan Parçalar</th>
			<td>
				@if($detail->getComposedParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Parça</th>
								<th>İşlemler</th>
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
					Oluşacak Parça Yok
				@endif
			</td>
		</tr>
		<tr>
			<th>Gerekli Parçalar</th>
			<td>
				@if($detail->getNeededParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Parça</th>
								<th>Adet</th>
								<th>İşlemler</th>
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
					Gerekli parça yok
				@endif
			</td>
		</tr>
		<tr>
			<th>Bağlı Parçalar</th>
			<td>
				@if($detail->getConnectedParts->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Parça</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getConnectedParts as $e)
								<tr>
									<td>{{$e->getItem['title']}}</td>
									<td>{{tableTool('Kaldır', 'removeConnectionPartBom', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					Bağlı parça yok
				@endif
			</td>
		</tr>
		<tr>
			<th>Bağlı rotalar</th>
			<td>
				@if($detail->getConnectedRoutes->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Rota</th>
								<th>Açıklama</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getConnectedRoutes as $e)
								<tr>
									<td>{{$e->getRoute['title']}}</td>
									<td>
										@if($e['default']==2)
											Öntanımlı
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
					Bağlı rotasyon yok
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