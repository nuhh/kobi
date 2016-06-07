 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Parça </h3>
<div class="row">
	<div class="col-md-12">
		{{open('newPart')}}
			<div class="form-body">
				{{text('Parça Kodu', 'part_code')}}
				{{text('Başlık', 'title')}}
				{{select('Öntanımlı Bom', 'default_bom', listThem($boms, 'id', 'title', true))}}
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-9">
						{{submit('Ekle')}}
					</div>
				</div>
			</div>
		{{close()}}
	</div>
</div>

@endsection

@section('title')
	Yeni İtem
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