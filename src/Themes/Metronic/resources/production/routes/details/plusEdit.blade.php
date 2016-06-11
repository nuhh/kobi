@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Rota Detayı Düzenle </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['editRouteDetail', $detail['id']])}}
			<div class="form-body">
				{{text('İşlem', 'operation', $detail['operation'])}}
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-10">
						{{submit('Düzenle')}}
					</div>
				</div>
			</div>
		{{close()}}
	</div>
</div>

@endsection

@section('title')
	Rota Detayı Düzenle
@endsection

@section('breadcrumb')
{{breadcrumb([
    ['Home', 'homePage'],
    ['Üretim', '#'],
    ['Rotasyonlar', 'routes'],
    [$detail->getRoute['title'], 'showRoute', $detail['route_id']],
    ['İşlem Düzenle']
])}}
@endsection