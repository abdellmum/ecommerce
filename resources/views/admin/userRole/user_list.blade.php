@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">User Role</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">All User
              <a href="{{ route('admin.create.new.user') }}" class="btn pd-x-20 btn-warning" style="float: right;margin-bottom: 20px;">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                       <td>Name</td>
                       <td>Email</td>
                       <td>Phone</td>
                       <td>Access</td>
                       <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($subAdmins as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>
                        <span class="badge badge-info">{{ ($row->category == 1)?'Category':'' }}</span>
                        <span class="badge badge-success">{{ ($row->coupon == 1)?'Coupon':'' }}</span>
                        <span class="badge badge-warning">{{ ($row->product == 1)?'Product':'' }}</span>
                        <span class="badge badge-primary">{{ ($row->blog == 1)?'Blog':'' }}</span>
                        <span class="badge badge-info">{{ ($row->order == 1)?'Order': '' }}</span>
                        <span class="badge badge-primary">{{ ($row->report == 1)?'Report':'' }}</span>
                        <span class="badge badge-info">{{ ($row->setting == 1)?'Setting':'' }}</span>
                        <span class="badge badge-danger">{{ ($row->user_role == 1)?'User Role':'' }}</span>
                        <span class="badge badge-success">{{ ($row->return_order == 1)?'Return Order':'' }}</span>
                        <span class="badge badge-info">{{ ($row->contact_message == 1)?'Contact Message':'' }}</span>
                        <span class="badge badge-primary">{{ ($row->product_comment == 1)?'product Comments':'' }}</span>     
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                          {{-- <button title="Delete" type="button" class="btn btn-danger">
                              <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                          </button>
                          <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.user.destory', $row->id) }}">
                              @csrf
                              @method('DELETE')
                          </form> --}}
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.user.destroy', $row->id) }}">
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