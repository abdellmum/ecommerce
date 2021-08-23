@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Sub Category</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>UPDATE SUB CATEGORY</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="margin-left: 10%; margin-right: 10%; margin-top: 5%; padding-bottom: 6%;">
          <h6 class="card-body-title"></h6>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        <form method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="subcategory_name">Sub Category Name :</label>
                <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" aria-describedby="emailHelp" value="{{ $subcategory->subcategory_name }}" placeholder="Enter Sub Category Name">
            </div>
            <div class="form-group">
                <label for="category_id">Category :</label>
                <select class="form-control" name="category_id">
                    @foreach ($category as $row)
                        <option value="{{ $row->id }}" <?php if ($row->id == $subcategory->category_id) { echo"Selected"; } ?> >{{ $row->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info pd-x-20" style="float: right;">Update</button>
        </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection