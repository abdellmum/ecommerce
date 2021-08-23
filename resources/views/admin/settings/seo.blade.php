@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Seo Setting</span>
      </nav>
      <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SEO Settings</h6><br>
          <form action="{{ route('admin.seo.update') }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Meta Title : *</span>
                        </label>
                        <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ $seo->meta_title }}" placeholder="Meta Title">
                        </div>
                        <!--- Error Message -->
                        @error('meta_title')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Meta Author : *</span>
                        </label>
                        <input class="form-control" type="text" name="meta_author" id="meta_author" value="{{ $seo->meta_author }}" placeholder="Meta Author">
                        </div>
                        <!--- Error Message -->
                        @error('meta_author')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->
                   

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Meta Tag : *</span>
                        </label>
                        <input class="form-control" type="text" name="meta_tag" id="meta_tag" value="{{ $seo->meta_tag }}" placeholder="Meta Author">
                        </div>
                        <!--- Error Message -->
                        @error('meta_tag')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Meta description : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="meta_description" placeholder="Meta Details Here!">
                            {{ $seo->meta_description }}
                        </textarea>
                        </div>
                         <!--- Error Message -->
                        @error('meta_description')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Google Analytics : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="google_analytics" placeholder="Write Google Analytics !">
                            {{ $seo->google_analytics }}
                        </textarea>
                        </div>
                         <!--- Error Message -->
                        @error('google_analytics')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Bring Analytics : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="bring_analytics" placeholder="Write Bring Analytics !">
                        {{ $seo->bring_analytics }}
                        </textarea>
                        </div>
                         <!--- Error Message -->
                        @error('bring_analytics')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                </div><!-- row -->
                <input type="hidden" value="{{ $seo->id }}" name="seo_id">

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