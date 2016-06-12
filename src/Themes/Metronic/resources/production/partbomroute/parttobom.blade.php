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
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Ürün Ağaçları', 'boms'],
	[$detail['title'], 'showBom', $detail['id']],
	['Parça Tanımla']
])}}
@endsection