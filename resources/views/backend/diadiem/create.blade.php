@extends('backend.layouts.app')

@section('title', __('labels.backend.diadiem.management') . ' | ' . __('labels.backend.diadiem.create'))

@section('breadcrumb-links')
    @include('backend.diadiem.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.diadiem.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Thêm mới địa điểm
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label("Tên địa điểm")->class('col-md-2 form-control-label')->for('tendiadiem') }}
                            <div class="col-md-10">
                                {{ html()->text('tendiadiem')
                                    ->class('form-control')
                                    ->placeholder("Nhập tên địa điểm")
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Ảnh đại diện')->class('col-md-2 form-control-label')->for('anhdaidien') }}
                            <div class="col-md-10">
                                {{ html()->text('anhdaidien')
                                    ->class('form-control')
                                    ->placeholder('Ảnh đại diện')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Giới thiệu')->class('col-md-2 form-control-label')->for('gioithieu') }}
                            <div class="col-md-10">
                                {{ html()->text('gioithieu')
                                    ->class('form-control')
                                    ->placeholder('Giới thiệu')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Từ khóa')->class('col-md-2 form-control-label')->for('tukhoa') }}
                            <div class="col-md-10">
                                {{ html()->text('tukhoa')
                                    ->class('form-control')
                                    ->placeholder('Từ khóa')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Điện thoại')->class('col-md-2 form-control-label')->for('dienthoai') }}
                            <div class="col-md-10">
                                {{ html()->text('dienthoai')
                                    ->class('form-control')
                                    ->placeholder('Điện thoại')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Email')->class('col-md-2 form-control-label')->for('email') }}
                            <div class="col-md-10">
                                {{ html()->text('email')
                                    ->class('form-control')
                                    ->placeholder('Email')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Giờ mở cửa')->class('col-md-2 form-control-label')->for('giomocua') }}
                            <div class="col-md-10">
                                {{ html()->text('giomocua')
                                    ->class('form-control')
                                    ->placeholder('Giờ mở cửa')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('Giờ đóng cửa')->class('col-md-2 form-control-label')->for('giodongcua') }}
                            <div class="col-md-10">
                                {{ html()->text('giodongcua')
                                    ->class('form-control')
                                    ->placeholder('Giờ đóng cửa')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label('GPS')->class('col-md-2 form-control-label')->for('Tọa độ GPS') }}
                            <div class="col-md-10">
                                {{ html()->text('GPS')
                                    ->class('form-control')
                                    ->placeholder('Tọa độ GPS')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Trạng thái')->class('col-md-2 form-control-label')->for('trangthai') }}
                            <div class="col-md-10">
                                {{ html()->text('trangthai')
                                    ->class('form-control')
                                    ->placeholder('Trạng thái')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.diadiem.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
