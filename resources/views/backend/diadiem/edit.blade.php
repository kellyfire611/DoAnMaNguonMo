@extends('backend.layouts.app')

@section('title', __('labels.backend.diadiem.management') . ' | ' . __('labels.backend.diadiem.edit'))

@section('breadcrumb-links')
    @include('backend.diadiem.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($diadiem, 'PATCH', route('admin.diadiem.update', $diadiem->_id))->class('form-horizontal quill-form')->open() }}
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

                    <div class="form-group row">
                            {{ html()->label("Mô tả ngắn")->class('col-md-2 form-control-label')->for('motangan') }}
                            <div class="col-md-10">
                                {{ html()->text('motangan')
                                    ->class('form-control')
                                    ->placeholder("Mô tả ngắn")
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

                        <div class="form-group row">
                            {{ html()->label('Giới thiệu')->class('col-md-2 form-control-label')->for('gioithieu') }}
                            <div class="col-md-10">
                                <input name="gioithieu" type="hidden">
                                <div id="gioithieu-editor-container">{!! $diadiem->gioithieu !!}</div>
                            </div><!--col-->
                        </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            
            <div class="row">
                    <div class="col-sm-5">
                        <h5 class="card-title mb-0">
                            Chi tiết Dịch vụ
                        </h5>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="table-responsive">  
                            @if($diadiem->dichvus->count() <= 0)
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>  
                                                <td><input type="text" name="dichvu_anhdaidien[]" placeholder="Ảnh đại diện" class="form-control" /></td>  
                                                <td><input type="text" name="dichvu_tendichvu[]" placeholder="Tên dịch vụ" class="form-control" /></td>  
                                                <td><input type="text" name="dichvu_motangan[]" placeholder="Mô tả ngắn" class="form-control" /></td>  
                                                <td><input type="text" name="dichvu_gia[]" placeholder="Giá" class="form-control" /></td>  
                                                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                                            </tr>
                                            <tr>
                                                <td colspan="5"><input type="text" name="dichvu_gioithieu[]" placeholder="Giới thiệu" class="form-control" /></td>  
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            @else
                            <table class="table table-bordered" id="dynamic_field">
                                <?php
                                $i = 1;
                                ?>
                                @foreach($diadiem->dichvus as $dichvu)
                                @if($dichvu == $diadiem->dichvus->first())
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>  
                                                <td><input type="text" name="dichvu_anhdaidien[]" placeholder="Ảnh đại diện" class="form-control" value="{{ $dichvu->anhdaidien }}" /></td>  
                                                <td><input type="text" name="dichvu_tendichvu[]" placeholder="Tên dịch vụ" class="form-control" value="{{ $dichvu->tendichvu }}" /></td>  
                                                <td><input type="text" name="dichvu_motangan[]" placeholder="Mô tả ngắn" class="form-control" value="{{ $dichvu->motangan }}" /></td>  
                                                <td><input type="text" name="dichvu_gia[]" placeholder="Giá" class="form-control" value="{{ $dichvu->gia }}" /></td>  
                                                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                                            </tr>
                                            <tr>
                                                <td colspan="5"><input type="text" name="dichvu_gioithieu[]" placeholder="Giới thiệu" class="form-control" value="{{ $dichvu->gioithieu }}" /></td>  
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @else
                                <tr id="{{ 'row'.$i }}" class="dynamic-added">
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>  
                                                <td><input type="text" name="dichvu_anhdaidien[]" placeholder="Ảnh đại diện" class="form-control" value="{{ $dichvu->anhdaidien }}" /></td>  
                                                <td><input type="text" name="dichvu_tendichvu[]" placeholder="Tên dịch vụ" class="form-control" value="{{ $dichvu->tendichvu }}" /></td>  
                                                <td><input type="text" name="dichvu_motangan[]" placeholder="Mô tả ngắn" class="form-control" value="{{ $dichvu->motangan }}" /></td>  
                                                <td><input type="text" name="dichvu_gia[]" placeholder="Giá" class="form-control" value="{{ $dichvu->gia }}" /></td>  
                                                <td><button type="button" name="remove" id="{{ $i }}" class="btn btn-danger btn_remove">X</button></td>  
                                            </tr>
                                            <tr>
                                                <td colspan="5"><input type="text" name="dichvu_gioithieu[]" placeholder="Giới thiệu" class="form-control" value="{{ $dichvu->gioithieu }}" /></td>  
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif
                                <?php
                                $i++;
                                ?>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
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

@push('after-scripts')
<script>
    $(document).ready(function(){
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'], // remove formatting button
            ['link', 'image', 'video']
        ];
        var editor = new Quill('#gioithieu-editor-container', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        $('.quill-form').submit(function () {
            var gioithieu = document.querySelector('input[name=gioithieu]');
            gioithieu.value = editor.root.innerHTML;
        });

        
        //Dynamic field
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td> <table class="table table-bordered"> <tr>  <td><input type="text" name="dichvu_anhdaidien[]" placeholder="Ảnh đại diện" class="form-control" /></td>  <td><input type="text" name="dichvu_tendichvu[]" placeholder="Tên dịch vụ" class="form-control" /></td>  <td><input type="text" name="dichvu_motangan[]" placeholder="Mô tả ngắn" class="form-control" /></td>  <td><input type="text" name="dichvu_gia[]" placeholder="Giá" class="form-control" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>  </tr> <tr> <td colspan="5"><input type="text" name="dichvu_gioithieu[]" placeholder="Giới thiệu" class="form-control" /></td>  </tr> </table> </td> </tr>');  
        });  

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
});
</script>
@endpush
