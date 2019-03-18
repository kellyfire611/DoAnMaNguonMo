@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<!-- Start banner Area -->
<section class="generic-banner relative" style="background: url('{{ asset('storage/uploads/'.$diadiem->anhdaidien) }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">						
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
    <h3 class="mb-30">Danh sách dịch vụ</h3>
    <div class="table-responsive">  
        <table class="table table-bordered" id="dynamic_field">
            <tr>
                <td>#</td>
                <td>Ảnh đại diện</td>
                <td>Tên dịch vụ</td>
                <td>Mô tả ngắn</td>
                <td>Giá tiền</td>
            </tr>
            <?php
            $i = 1;
            ?>
            @foreach($diadiem->dichvus as $dichvu)
            <tr>
                <td>{{ $i }}</td>
                <td><img class="img-thumbnail img-table-dichvu" src="{{ asset('storage/uploads/'.$dichvu->anhdaidien) }}" alt="{{ $dichvu->tendichvu }}"></td>
                <td>{{ $dichvu->tendichvu }}</td>
                <td>{{ $dichvu->motangan }}</div>
                <td>{{ $dichvu->gia }}</div>
            </tr>
            @endforeach
            <?php
            $i++;
            ?>
        </table>  
    </div>
</div>

        <div class="section-top-border">
            <h3>Ảnh trưng bày</h3>
            <div class="row gallery-item">
                @foreach($diadiem->dichvus as $dichvu)
                <div class="col-md-4">
                    <a href="{{ asset('storage/uploads/'.$dichvu->anhdaidien) }}" class="img-pop-up"><div class="single-gallery-image" style="background: url({{ asset('storage/uploads/'.$dichvu->anhdaidien) }});"></div></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection
