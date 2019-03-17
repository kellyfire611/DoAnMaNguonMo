@extends('backend.layouts.app')

@section('title', __('labels.backend.diadiem.management') . ' | ' . __('labels.backend.diadiem.view'))

@section('breadcrumb-links')
    @include('backend.diadiem.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Thông tin địa điểm
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Tên địa điểm</th>
                        <td>{{ $diadiem->tendiadiem }}</td>
                    </tr>
                </table>
            </div>
        </div><!--table-responsive-->

        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
