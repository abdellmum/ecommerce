@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
    </nav><!--Nav -->
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <p class="mg-b-20 mg-sm-b-30"><a href="{{ route('admin.contact.message.list') }}" class="btn btn-success pd-x-20 pull-right">All Message</a></p>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">The sender's Name : - </span>
                        </label>
                        <strong>{{ $showMessage->name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">The sender's Email : - </span>
                        </label>
                        <strong>{{ $showMessage->email }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">The sender's Phone : - </span>
                        </label>
                        <strong>{{ $showMessage->phone }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Send Time : -  </span>
                        </label>
                        <strong>{{ \Carbon\Carbon::parse($showMessage->created_at)->diffForhumans() }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    
                    <div class="col-lg-12">
                        <div class="form-group" style="border: 1px solid #ddd; padding:10px;">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Send Message : *</span>
                        </label>
                        <p>{!! $showMessage->message !!}</p>
                        </div>
                    </div><!-- col-12 -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection