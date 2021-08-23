@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">BlogPost</span>
      </nav>
      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">BlogPost LIST
              <a href="{{ route('admin.blogPost.create') }}" class="btn pd-x-20 btn-warning" style="float: right;margin-bottom: 20px;">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-5p">Category Name(En)</th>
                  <th class="wd-5p">Category Name(Bn)</th>
                  <th class="wd-10p">Image</th>
                  <th class="wd-15p">Post Title(En)</th>
                  <th class="wd-15p">Post Title(Bn)</th>
                  <th class="wd-5p">Status</th>
                  <th class="wd-40p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $key => $row)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->postcategory->category_name_en}}</td>
                    <td>{{ $row->postcategory->category_name_bn }}</td>
                    <td><img src="{{ url('backend/media/post/'.$row->image) }}" height="50px;" width="60px;"></td>
                    <td>{{ Str::limit($row->post_title_en, 30)}}</td>
                    <td>{{ Str::limit($row->post_title_bn, 30)}}</td>
                    <td>
                        @if($row->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inctive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.blogPost.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('admin.blogPost.show', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
                        @if ($row->status == 1)
                            <a href="{{ route('admin.blogPost.inctive', $row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down" title="Inctive"></i></a>
                        @else
                            <a href="{{ route('admin.blogPost.active', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up" title="Active"></i></a>
                        @endif
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.blogPost.destroy', $row->id) }}">
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