 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Gerekli Parça Düzenle </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['editNeededPartForBom', $detail['id']])}}
			<div class="form-body">
				{{select('Parça', 'part_id', listThem($parts, 'id', 'title'), $detail['part_id'])}}
				{{text('Adet', 'quantity', $detail['quantity'])}}
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
	Gerekli Parça Düzenle
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