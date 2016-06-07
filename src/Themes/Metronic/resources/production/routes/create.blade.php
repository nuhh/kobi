@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Rota </h3>
<div class="row">
	<div class="col-md-12">
		{{open('newRoute')}}
			<div class="form-body">
				{{text('Rota Kodu', 'route_code')}}
				{{text('Rota Başlık', 'title')}}
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
	Yeni Rota
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