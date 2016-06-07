@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Ürün Ağacına Parça Tanımla </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['definePartToBom', $detail['id']])}}
			<input type="hidden" name="bom_id" value="{{$detail['id']}}" />
			<div class="form-body">
				{{select('Öntanımlı Parça', 'part_id', listThem($parts, 'id', 'title'))}}
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
	Ürün Ağacına Parça Tanımla
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