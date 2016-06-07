@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Parça Ayırt Et </h3>
<div class="row">
	<div class="col-md-12">
		{{open(['consumeProductionNeededParts', $detail['id']])}}
			<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
				<thead>
					<tr>
						<th> Lot Kodu </th>
						<th> Mevcut Adet </th>
						<th> Kullanılacak Adet </th>
					</tr>
				</thead>
				<tbody>
					@foreach($detail->getUygunLotlar as $each)
					<tr>
						<td>{{$each['lot_code']}}</td>
						<td align="right">{{numberFormat($each['quantity'])}}</td>
						<td>
							{{Form::text($each['id'].'lot', Input::old($each['id'].'lot', 0), ['class' => 'form-control'])}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{submit(trans('e.consume'))}}
		{{close()}}
	</div>
</div>

@endsection

@section('title')
	Parça Ayırt Et
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
	<a href="{{route('showProductionOrder', $detail['production_order_id'])}}">{{$detail->getEmir['production_order_code']}}</a>
	<i class="fa fa-circle"></i>
</li>
<li>
    <span>Parça Ayırt Et</span>
</li>
@endsection