@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Lot İncele </h3>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<th>Lot Kodu</th>
				<td>{{$detail['lot_code']}}</td>
			</tr>
			<tr>
				<th>Parça Adı</th>
				<td>{{$detail->getPart['title']}}</td>
			</tr>
			<tr>
				<th>Adet</th>
				<td>{{numberFormat($detail['quantity'])}}</td>
			</tr>
		</table>
	</div>
</div>

@endsection

@section('title')
	Lot İncele
@endsection

@section('breadcrumb')
{{breadcrumb([
	['Home', 'homePage']
])}}
@endsection

@section('pageToolBar')
<div class="page-toolbar">
    <div class="btn-group pull-right">
        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> İşlemler
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <a href="{{route('newLot')}}">
                    <i class="icon-bell"></i> Yeni </a>
            </li>
        </ul>
    </div>
</div>
@endsection	

@section('boxTools')
	{{toolSil('deleteLot', $detail['id'], $detail['id'])}}
@endsection
