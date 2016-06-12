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
{{breadcrumb([
	['Home', 'homePage'],
	['Üretim', '#'],
	['Parçalar', 'parts'],
	[$detail['title'], 'showPart', $detail['id']],
	['Ürün Ağacı Tanımla']
])}}
@endsection