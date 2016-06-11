 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parça Düzenle </h3>
	{{open(['editPart', $detail['id']])}}
		<div class="form-body">
			{{text('Parça Kodu', 'part_code', $detail['part_code'])}}
			{{text('Başlık', 'title', $detail['title'])}}
		</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					{{submit('Düzenle')}}
				</div>
			</div>
		</div>
	{{close()}}
@endsection

@section('title')
	Parça Düzenle
@endsection

@section('breadcrumb')
{{breadcrumb([
    ['Home', 'homePage'],
    ['Üretim', '#'],
    ['Parçalar', 'parts'],
    [$detail['title']. ' Düzenle']
])}}
@endsection