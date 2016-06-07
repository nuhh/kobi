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