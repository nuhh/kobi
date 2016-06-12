@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Rota Detayı </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['newRouteDetail', $detail['id']])}}
			<input type="hidden" name="route_id" value="{{$detail['id']}}" />
			<div class="form-body">
				{{text('İşlem', 'operation')}}
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-10">
						{{submit('Ekle')}}
					</div>
				</div>
			</div>
		{{close()}}
	</div>
</div>

@endsection

@section('title')
	Yeni Rota Detayı
@endsection

@section('breadcrumb')
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Rotasyonlar', 'routes'],
	[$detail['title'], 'showRoute', $detail['id']],
	['Yeni İşlem']
])}}
@endsection