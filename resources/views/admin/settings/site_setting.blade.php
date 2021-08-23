@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Site Setting</span>
      </nav>
      <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Site Settings</h6><br>
          <form action="{{ route('admin.site.setting.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Name : *</span>
                        </label>
                        <input class="form-control" type="text" name="shop_name" id="shop_name" value="{{ $siteSetting->shop_name }}" placeholder="Please Shop Name Here !">
                        </div>
                        <!--- Error Message -->
                        @error('shop_name')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Email : *</span>
                        </label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ $siteSetting->email }}" placeholder="Your Shop Email">
                        </div>
                        <!--- Error Message -->
                        @error('email')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->
                   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Phone Number : *</span>
                        </label>
                        <input class="form-control" type="number" name="phone" id="phone" value="{{ $siteSetting->phone }}" placeholder="Shop Phone Number">
                        </div>
                        <!--- Error Message -->
                        @error('phone')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shopping Vat : *</span>
                        </label>
                        <input class="form-control" type="number" name="vat" id="vat" value="{{ $siteSetting->vat }}" placeholder="Shop Phone Number">
                        </div>
                        <!--- Error Message -->
                        @error('vat')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">
                                <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shipping Charge : *</span>
                            </label>
                            <input class="form-control" type="number" name="shipping_charge" id="shipping_charge" value="{{ $siteSetting->shipping_charge }}" placeholder="Delivery Charge">
                        </div>
                            <!--- Error Message -->
                            @error('shipping_charge')
                                <strong style="color: red;">{{ $message }}</strong>
                            @enderror
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Facebook Url : *</span>
                        </label>
                        <input class="form-control" type="text" name="facebook_url" id="facebook_url" value="{{ $siteSetting->facebook_url }}" placeholder="Shop Facebook Url">
                        </div>
                        <!--- Error Message -->
                        @error('facebook_url')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Twitter Url : *</span>
                        </label>
                        <input class="form-control" type="text" name="twitter_url" id="twitter_url" value="{{ $siteSetting->twitter_url }}" placeholder="Shop Twitter Url">
                        </div>
                        <!--- Error Message -->
                        @error('twitter_url')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Youtube Url : *</span>
                        </label>
                        <input class="form-control" type="text" name="youtube_url" id="youtube_url" value="{{ $siteSetting->youtube_url }}" placeholder="Shop Youtube Url">
                        </div>
                        <!--- Error Message -->
                        @error('youtube_url')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Shop Twitter Url : *</span>
                        </label>
                        <input class="form-control" type="text" name="vimeo_url" id="vimeo_url" value="{{ $siteSetting->vimeo_url }}" placeholder="Shop Vimeo Url">
                        </div>
                        <!--- Error Message -->
                        @error('vimeo_url')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Your Shop Address : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="address">
                            {{ $siteSetting->address }}
                        </textarea>
                        </div>
                         <!--- Error Message -->
                        @error('address')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Site Copyright Issuu : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="copyright">
                            {{ $siteSetting->copyright }}
                        </textarea>
                        </div>
                         <!--- Error Message -->
                        @error('copyright')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                </div><!-- row -->
                <input type="hidden" value="{{ $siteSetting->id }}" name="setting_id">

                <div class="form-layout-footer" style="float: right;">
                    <a href="{{ route('admin.home') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-info mg-r-5 mg-l-5">Update Data</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection