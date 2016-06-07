 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parçaya Ürün Ağacı Tanımla </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['defineBomToPart', $detail['id']])}}
			<input type="hidden" name="part_id" value="{{$detail['id']}}" />
			<div class="form-body">
				{{select('Öntanımlı Bom', 'bom_id', listThem($boms, 'id', 'title'))}}
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-9">
						{{submit('Tanımla')}}
					</div>
				</div>
			</div>
		{{close()}}
	</div>
</div>

@endsection

@section('title')
	Parçaya Ürün Ağacı Tanımla
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