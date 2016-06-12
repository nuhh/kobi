 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Gerekli Parça Ekle </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['addNeededPartToBom', $detail['id']])}}
			<input type="hidden" value="{{$detail['id']}}" name="bom_id" />
			<div class="form-body">
				{{select('Parça', 'part_id', listThem($parts, 'id', 'title'))}}
				{{text('Kaç Adet', 'quantity')}}
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
	Gerekli Parça Ekle
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