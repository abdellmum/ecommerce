@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Post Category</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Post Category</h5>
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
        <form method="POST" action="{{ route('admin.postCategory.update', $editPost->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name_en">Category Name (English) :</label>
                <input type="text" class="form-control" name="category_name_en" id="category_name_en" aria-describedby="emailHelp" value="{{ $editPost->category_name_en }}" placeholder="Enter Category Name (English)">
            </div>
            <div class="form-group">
                <label for="category_name_bn">Category Name (Bangla) :</label>
                <input type="text" class="form-control" name="category_name_bn" id="category_name_bn" aria-describedby="emailHelp" value="{{ $editPost->category_name_bn }}" placeholder="Enter Category Name (Bangla)">
            </div>
            <button type="submit" class="btn btn-info pd-x-20" style="float: right;">Update</button>
        </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
                