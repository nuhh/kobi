@extends('zahmetsizce::themes.main')

@section('content')
<h3 class="page-title"> Gösterge Tablosu </h3>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{route('parts')}}">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$toplamParca}}</span>
                </div>
                <div class="desc"> Toplam Parça </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('productionOrders')}}">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{$toplamEmir}}</span>
                </div>
                <div class="desc"> Toplam Üretim Emir </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('title')
Gösterge Tablosu
@endsection