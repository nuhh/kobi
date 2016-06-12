 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Parça </h3>
<div class="row">
	<div class="col-md-12">
		{{open('newPart')}}
			<div class="form-body">
			{{text('BOM Kodu', 'bom_code')}}
			{{text('BOM Başlık', 'title')}}
			{{select('Öntanımlı Rota', 'default_route', listThem($routes, 'id', 'title', true))}}			</div>
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
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Ürün Ağaçları', 'boms'],
	['Yeni']
])}}
@endsection