@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Administration</a>
    </nav><!--Nav -->
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <p class="mg-b-20 mg-sm-b-30"><a href="{{ route('admin.product.comment.list') }}" class="btn btn-success pd-x-20 pull-right">All Comment</a></p>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Commenter Name : - </span>
                        </label>
                        <strong>{{ $comments->user->name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Comment Product : - </span>
                        </label>
                        <strong>{{ $comments->product->product_name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Parent Comment : - </span>
                        </label>
                        <strong>{{ $comments->parent_id }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Comment Time : -  </span>
                        </label>
                        <strong>{{ \Carbon\Carbon::parse($comments->created_at)->diffForhumans() }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group" style="border: 1px solid #ddd; padding:10px;">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Comment : *</span>
                        </label>
                        <p>{!! $comments->comment !!}</p>
                        </div>
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Comment Status : -  </span>
                        </label>
                            @if($comments->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inctive</span>
                            @endif
                        </div>
                    </div><!-- col-4 -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection
