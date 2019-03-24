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

        <div class="section-top-border">
            <h3>Địa chỉ</h3>
            <div class="row">
                <div class="col">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $diadiem->GPS }}&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>NenTang: <a href="https://nentang.vn">nentang.vn</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
                </div>
            </div>
        </section>

        <div class="section-top-border">
            <h3>Đánh giá</h3>
            <div class="row">
                <div class="col">
                    Danh sách các đánh giá
                </div>
            </div>

            {{ html()->form('POST', route('frontend.diadiem.goidanhgia', ['diadiem' => $diadiem->_id]))->class('form-horizontal quill-form')->open() }}
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Bình luận')->class('col-md-2 form-control-label')->for('title') }}
                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder('Bình luận')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div>
            </div>
            {{ html()->form()->close() }}
        </section>
    </div>
</div>



<!-- End Align Area -->
@endsection

@push('after-scripts')

@endpush