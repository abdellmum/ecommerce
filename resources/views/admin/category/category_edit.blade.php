@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Categorie</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40" style="margin-left: 10%; margin-right: 10%; margin-top: 5%; padding-bottom: 6%;">
          <h6 class="card-body-title">UPDATE CATEGORY</h6>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
          @method('PUT')
            @csrf
            <div class="form-group">
                <label for="category_name"></label>
                <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp" value="{{ $category->category_name }}" placeholder="Enter Category Name">
            </div>
            <button type="submit" class="btn btn-info pd-x-20" style="float: right;">Update</button>
        </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
