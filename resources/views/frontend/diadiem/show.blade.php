@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<style>
  #map {
    height: 100%;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
@endpush

@section('content')
<!-- Start banner Area -->
<section class="generic-banner relative" style="background: url('{{ asset('storage/'.$diadiem->anhdaidien) }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">						
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white">{{ $diadiem->tendiadiem }}</h2>
                    <p class="text-white">{{ $diadiem->motangan }}</p>
                </div>
            </div>
        </div>
    </div>
</section>		
<!-- End banner Area -->
<!-- Start Sample Area -->
<section class="sample-text-area">
    <div class="container">
        <h3 class="text-heading">Giới thiệu</h3>
        {!! $diadiem->gioithieu !!}
    </div>
</section>
<!-- End Sample Area -->
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
    <div class="section-top-border">
    <h3 class="mb-10">Danh sách dịch vụ</h3>
    <div class="table-responsive">  
        <table class="table table-bordered" id="dynamic_field">
            <tr>
                <th style="width: 35px;">#</th>
                <th style="width: 175px;">Ảnh đại diện</th>
                <th>Tên dịch vụ</th>
                <th>Mô tả ngắn</th>
                <th style="width: 100px;">Giá tiền</th>
            </tr>
            <?php
            $i = 1;
            ?>
            @foreach($diadiem->dichvus as $dichvu)
            <tr>
                <td>{{ $i }}</td>
                <td><img class="img-thumbnail img-table-dichvu" src="{{ asset('storage/'.$dichvu->anhdaidien) }}" alt="{{ $dichvu->tendichvu }}"></td>
                <td>{{ $dichvu->tendichvu }}</td>
                <td>{{ $dichvu->motangan }}</div>
                <td style="text-align: right;">{{ $dichvu->gia }}</div>
            </tr>
            <?php
            $i++;
            ?>
            @endforeach
        </table>  
    </div>
</div>

        <div class="section-top-border">
            <h3>Ảnh trưng bày</h3>
            <div class="row gallery-item">
                @foreach($diadiem->dichvus as $dichvu)
                <div class="col-md-4">
                    <a href="{{ asset('storage/'.$dichvu->anhdaidien) }}" class="img-pop-up"><div class="single-gallery-image" style="background: url({{ asset('storage/'.$dichvu->anhdaidien) }});"></div></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<section class="sample-text-area">
    <div class="container">
        <div id="map"></div>
    </div>
</section>

<!-- End Align Area -->
@endsection

@push('after-scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Fsi_VyLE_uW_TvspHPm8KKgWDHTiteU&callback=initMap" async defer></script>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }
</script>

@endpush