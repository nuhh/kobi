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
    <span>Yeni</span>
</li>
@endsection