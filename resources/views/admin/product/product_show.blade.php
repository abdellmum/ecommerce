@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Product Section</span>
    </nav><!--Nav -->
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <p class="mg-b-20 mg-sm-b-30"><a href="{{ route('admin.product.index') }}" class="btn btn-success pd-x-20 pull-right">All Product</a></p>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Name : - </span>
                        </label>
                        <strong>{{ $productShow->product_name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Code : - </span>
                        </label>
                        <strong>{{ $productShow->product_code }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Quantity : - </span>
                        </label>
                        <strong>{{ $productShow->product_quantity }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Category : -  </span>
                        </label>
                        <strong>{{ $productShow->category->category_name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Sub Category : -</span>
                        </label>
                        <strong>{{ $productShow->subcategory->subcategory_name ?? '' }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Brand : - </span>
                        </label>
                        <strong>{{ $productShow->brand->brand_name ?? '' }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Size : - </span>
                        </label>
                        <strong>{{ $productShow->product_size }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Colour : - </span>
                        </label>
                        <strong>{{ $productShow->product_colour }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Selling Price : - </span>
                        </label>
                         <strong>{{ $productShow->selling_price }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group" style="border: 1px solid #ddd; padding:10px;">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Details : *</span>
                        </label>
                        <p>{!! $productShow->product_details !!}</p>
                        </div>
                    </div><!-- col-12 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Video Link : * - </span>
                        </label>
                        <strong>{{ $productShow->video_link }}</strong>
                        </div>
                    </div><!-- col-12 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label>
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image One (Main Thumbnail) *</span>
                        </label><br>
                        <img width="100" height="100" src="{{ asset('backend/media/product/'.$productShow->image_one) }}" alt="">
                        </div>
                    </div><!-- col-4 -->
                     <div class="col-lg-4">
                        <div class="form-group">
                        <label>
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image Two : - *</span>
                        </label><br>
                        <img width="100" height="100" src="{{ asset('backend/media/product/'.$productShow->image_two) }}" alt="">
                        </div>
                    </div><!-- col-4 -->
                     <div class="col-lg-4">
                        <div class="form-group">
                        <label>
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image Three : - *</span>
                        </label><br>
                        <img width="100" height="100" src="{{ asset('backend/media/product/'.$productShow->image_three) }}" alt="">
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->
                <br><hr>
                <div class="row">
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Main Slider | </span></strong>
                        @if($productShow->main_slider == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Hot Deal | </span></strong>
                        @if($productShow->hot_deal == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Best Reated | </span></strong>
                        @if($productShow->best_rated == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Mid Slider | </span></strong>
                        @if($productShow->mid_slider == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Hot New | </span></strong>
                        @if($productShow->hot_new == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Trend | </span></strong>
                        @if($productShow->trend == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-4" style="margin-top: 10px;">
                        <strong><span>Bye One Get One | </span></strong>
                        @if($productShow->bye_one_get_one == 1)
                            <span class="badge badge-success p-1">Active</span>
                        @else
                            <span class="badge badge-danger p-1">Inactive</span>
                        @endif
                    </div><!-- col-4 -->
                </div>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection