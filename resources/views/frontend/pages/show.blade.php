@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
@if(!$page)
no
@else
<!-- Start banner Area -->
<section class="generic-banner relative" style="background: url(''); background-position: center; background-repeat: no-repeat; background-size: cover;">						
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white">Giới thiệu</h2>
                    <p class="text-white"></p>
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
        {!! $page->content !!}
    </div>
</section>
<!-- End Sample Area -->
@endif
@endsection
