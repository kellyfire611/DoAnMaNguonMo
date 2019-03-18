@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<!-- Start banner Area -->
<section class="generic-banner relative">						
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
        {{ $diadiem->gioithieu }}
    </div>
</section>
<!-- End Sample Area -->

@endsection
