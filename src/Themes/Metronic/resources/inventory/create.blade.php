 @extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Lot Girişi </h3>
<div class="row">
	<div class="col-md-12">
		{{open('newLot')}}
			<div class="form-body">
				{{text('Lot Kodu', 'lot_code')}}
				{{select('Parça', 'part_id', listThem($parts, 'id', 'title'))}}
				{{text('Adet', 'quantity')}}
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
	Yeni Lot Girişi
@endsection

@section('breadcrumb')
<li>
    <a href="{{route('homePage')}}">Home</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <a href="{{route('lots')}}">Lotlar</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>Yeni</span>
</li>
@endsection