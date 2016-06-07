@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Yeni Üretim Emri </h3>
<div class="row">
		<div class="col-md-12">
		{{open('newProductionOrder')}}
			<div class="form-body">
				{{text('Emir Kodu', 'production_order_code')}}
				{{select('Parça', 'part_id', listThem($parts, 'id', 'title', false))}}
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
	Yeni Üretim Emri
@endsection

@section('breadcrumb')
<li>
    <a href="{{route('homePage')}}">Home</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <a href="{{route('productionOrders')}}">Üretim Emirleri</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>Yeni</span>
</li>
@endsection