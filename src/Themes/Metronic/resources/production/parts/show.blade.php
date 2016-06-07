@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parça Detayları </h3>
	<table class="table table-bordered">
		<tr>
			<th>Parça Kodu</th>
			<td>{{$detail['part_code']}}</td>
		</tr>
		<tr>
			<th>Parça Adı</th>
			<td>{{$detail['title']}}</td>
		</tr>
		<tr>
			<th>Bağlı Bomlar</th>
			<td>
				@if($detail->getBomlar->count()>0)
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>BOM</th>
								<th>Açıklama</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail->getBomlar as $e)
								<tr>
									<td>{{$e->getBom['title']}}</td>
									<td>
										@if($e['default']==2)
											Ön tanımlı
										@endif
									</td>
									<td>
										{{tableTool('Kaldır', 'removeConnectionPartBom', $e['id'])}}
										@if($e['default']==1)
											{{tableTool('Öntanımlı yap', 'makeBomDefaultForPart', $e['id'])}}
										@else
											{{tableTool('Öntanımı Kaldır', 'removeDefaultBomFromPart', $e['id'])}}
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					Bağlı BOM yok
				@endif
			</td>
		</tr>
		<tr>
			<th>Depodaki Toplam</th>
			<td>{{numberFormat($detail->getToplam['sumOf'])}}</td>
		</tr>
	</table>
@endsection

@section('title')
	Parça Detayları
@endsection

@section('breadcrumb')
<li>
    <a href="{{route('homePage')}}">Home</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <a href="#">Üretim</a>
    <i class="fa fa-circle"></i>
</li>
<li>
	<a href="{{route('parts')}}">Parçalar</a>
	<i class="fa fa-circle"></i>
<li>
    <span>{{$detail['title']}}</span>
</li>
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
                <a href="{{route('editPart', $detail['id'])}}">
                    <i class="icon-bell"></i> Düzenle </a>
            </li>
            <li>
            	<a href="{{route('defineBomToPart', $detail['id'])}}">
            		<i class="icon-star"></i> Ürün Ağacı Tanımla </a>
           	</li>
        </ul>
    </div>
</div>
{{modal('sil', 'deletePart', $detail['id'])}}
@endsection