@extends('backend.layouts.app')

@section('title', __('labels.backend.diadiem.management') . ' | ' . __('labels.backend.diadiem.edit'))

@section('breadcrumb-links')
    @include('backend.diadiem.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($diadiem, 'PATCH', route('admin.diadiem.update', $diadiem->_id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                       Chỉnh sửa thông tin địa điểm
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
                                ->placeholder(__('validation.attributes.backend.diadiem.tendiadiem'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.diadiem.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection