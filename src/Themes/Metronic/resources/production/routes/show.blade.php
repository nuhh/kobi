	@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Rotasyon İncele </h3>
	<table class="table table-bordered">
		<tr>
			<th>Rota Kodu</th>
			<td>{{$detail['route_code']}}</td>
		</tr>
		<tr>
			<th>Rota Adı</th>
			<td>{{$detail['title']}}</td>
		</tr>
		<tr>
			<th>Rota Detayları</th>
			<td>
				@if($detail->getRotaDetaylari->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>İşlem Adı</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getRotaDetaylari as $e)
								<tr>
									<td>{{$e['operation']}}</td>
									<td>{{edit('editRouteDetail', $e['id'])}} {{sil('deleteRouteDetail', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					Tanımlı işlem yok
				@endif
			</td>
		</tr>
		<tr>
			<th>Tanımlı Olduğu Bomlar</th>
			<td>
				@if($detail->getTanimliBomlar->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>BOM</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getTanimliBomlar as $e)
								<tr>
									<td>{{$e->getBom['title']}}</td>
									<td>{{tableTool('Kaldır', 'removeConnectionBomRoute', $e['id'])}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					Tanımlı olduğu BOM yok
				@endif
			</td>
		</tr>
	</table>
@endsection

@section('title')
	Rota Detayları
@endsection

@section('breadcrumb')
{{breadcrumb([
    ['Home', 'homePage'],
    ['Üretim', '#'],
    ['Rotasyonlar', 'routes'],
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
            	<a href="{{route('newRouteDetail', $detail['id'])}}">
            		<i class="icon-star"></i> İşlem Ekle </a>
           	</li>
            <li>
            	<a href="{{route('defineBomToRoute', $detail['id'])}}">
            		<i class="icon-star"></i> Ürün Ağacına Bağla </a>
           	</li>
        </ul>
    </div>
</div>
{{modal('sil', 'deleteRoute', $detail['id'])}}
@endsection