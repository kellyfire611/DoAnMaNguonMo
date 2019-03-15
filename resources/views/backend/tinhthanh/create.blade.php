@extends('backend.layouts.app')

@section('title', __('labels.backend.tinhthanh.management') . ' | ' . __('labels.backend.tinhthanh.create'))

@section('breadcrumb-links')
    @include('backend.tinhthanh.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.tinhthanh.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.tinhthanh.management')
                            <small class="text-muted">@lang('labels.backend.tinhthanh.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.tinhthanh.tentinhthanh'))->class('col-md-2 form-control-label')->for('tentinhthanh') }}

                            <div class="col-md-10">
                                {{ html()->text('tentinhthanh')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.tinhthanh.tentinhthanh'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.tinhthanh.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
