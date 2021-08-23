@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>UPDATE Brand</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="margin-left: 10%; margin-right: 10%; margin-top: 5%; padding-bottom: 6%;">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        <form method="POST" action="{{ route('admin.brand.update', $brands->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="brand_name">Brand Name : </label>
                <input type="text" class="form-control" name="brand_name" id="brand_name" aria-describedby="emailHelp" value="{{ $brands->brand_name }}" placeholder="Enter Brand Name">
            </div>
            <div class="form-group">
                <label for="brand_logo">Brand Logo : </label>
                <input type="file" class="form-control" name="brand_logo" id="brand_logo" aria-describedby="emailHelp" placeholder="Brand Logo Here.">
            </div>
            <div class="form-group">
                <label for="brand_logo">Old Logo : </label>
                <img src="{{ url('backend/media/brands/'.$brands->brand_logo) }}" height="70px;" width="80px;">
            </div>
            <button type="submit" class="btn btn-info pd-x-20" style="float: right;">Update</button>
        </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
                