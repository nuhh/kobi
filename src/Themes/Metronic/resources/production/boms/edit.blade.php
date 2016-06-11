@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Parça </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['editBom', $detail['id']])}}
			<div class="form-body">
			{{text('BOM Kodu', 'bom_code', $detail['bom_code'])}}
			{{text('BOM Başlık', 'title', $detail['title'])}}
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-2 col-md-9">
						{{submit('Düzenle')}}
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
    ['Ürün Ağaçları', 'boms']
    ['Düzenle']
])}}
@endsection