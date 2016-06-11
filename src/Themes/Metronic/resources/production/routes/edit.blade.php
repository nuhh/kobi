@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Rota Düzenle </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['editRoute', $detail['id']])}}
			<div class="form-body">
				{{text('Rota Kodu', 'route_code', $detail['route_code'])}}
				{{text('Rota Başlık', 'title', $detail['title'])}}
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
	Rota Düzenle
@endsection

@section('breadcrumb')
{{breadcrumb([
    ['Home', 'homePage'],
    ['Üretim', '#'],
    ['Rotasyonlar', 'routes'],
    [$detail['title']. ' Düzenle1']
])}}
@endsection