@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Rotaya Ürün Ağacı Tanımla </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['defineBomToRoute', $detail['id']])}}
			<input type="hidden" name="route_id" value="{{$detail['id']}}" />
			<div class="form-body">
				{{select('Öntanımlı BOM', 'bom_id', listThem($boms, 'id', 'title'))}}
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
	Rotaya Ürün Ağacı Tanımla
@endsection

@section('breadcrumb')
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Rotasyonlar', 'routes'],
	[$detail['title'], 'showRoute', $detail['id']],
	['Ürün Ağacı Tanımla']
])}}
@endsection