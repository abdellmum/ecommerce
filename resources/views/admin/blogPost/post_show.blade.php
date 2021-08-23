@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Product Section</span>
    </nav><!--Nav -->
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <p class="mg-b-20 mg-sm-b-30"><a href="{{ route('admin.blogPost.index') }}" class="btn btn-success pd-x-20 pull-right">All Product</a></p>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Title (English) : - </span>
                        </label>
                        <strong>{{ $postShow->post_title_en }}</strong>
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Title (Bangla) : - </span>
                        </label>
                        <strong>{{ $postShow->post_title_bn }}</strong>
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-12">
                        <div class="form-group" style="border: 1px solid #ddd; padding:10px;">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Details (En) : *</span>
                        </label>
                        <p>{!! $postShow->post_description_en !!}</p>
                        </div>
                    </div><!-- col-12 -->
                    <div class="col-lg-12">
                        <div class="form-group" style="border: 1px solid #ddd; padding:10px;">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Details (Bn) : *</span>
                        </label>
                        <p>{!! $postShow->post_description_bn !!}</p>
                        </div>
                    </div><!-- col-12 -->
                     <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Category Name (En) : -  </span>
                        </label>
                        <strong>{{ $postShow->postcategory->category_name_en }}</strong>
                        </div>
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Category Name (Bn) : -  </span>
                        </label>
                        <strong>{{ $postShow->postcategory->category_name_bn }}</strong>
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label>
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Image *</span>
                        </label><br>
                        <img width="250" height="150" src="{{ asset('backend/media/post/'.$postShow->image) }}" alt="Post Image">
                        </div>
                    </div><!-- col-6 -->
                </div><!-- row -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection