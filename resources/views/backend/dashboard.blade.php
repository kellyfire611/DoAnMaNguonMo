@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="text-value">{{ $baocaodata['diadiem_count'] }}</div>
                <div>Địa điểm Ẩm Thực</div>
            </div>
        </div>  
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="text-value">{{ $baocaodata['dichvu_count'] }}</div>
                <div>Dịch vụ Ẩm Thực</div>
            </div>
        </div>  
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="text-value">{{ $baocaodata['user_count'] }}</div>
                <div>Khách hàng Đăng ký</div>
            </div>
        </div>  
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <div class="text-value">{{ $baocaodata['tinhthanh_count'] }}</div>
                <div>Tỉnh thành</div>
            </div>
        </div>  
    </div>
</div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Chào mừng {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
