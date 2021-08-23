@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Product</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product LIST
              <a href="{{ route('admin.product.create') }}" class="btn pd-x-10 btn-warning" style="float: right;margin-bottom: 20px;">Product Add</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product ID</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-10p">Image</th>
                  <th class="wd-10p">Category</th>
                  <th class="wd-10p">Brand</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $row)
                <tr>
                    <td>{{ $row->product_code }}</td>
                    <td>{{ $row->product_name }}</td>
                    <td><img src="{{ url('backend/media/product/'.$row->image_one) }}" height="50px;" width="60px;"></td>
                    <td>{{ $row->category->category_name }}</td>
                    <td>{{ $row->brand->brand_name?? '' }}</td>
                    <td>
                        @if($row->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inctive</span>
                        @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.product.show', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
                      @if ($row->status == 1)
                            <a href="{{ route('admin.product.inactive', $row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down" title="Inctive"></i></a>
                        @else
                            <a href="{{ route('admin.product.active', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up" title="Active"></i></a>
                        @endif
                        <a href="{{ route('admin.product.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                          <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.product.destroy', $row->id) }}">
                          @csrf
                          @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection