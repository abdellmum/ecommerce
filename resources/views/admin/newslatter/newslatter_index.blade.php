@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Newslatter</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscriber Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscriber LIST
            <a href="#" class="btn btn-sm btn-danger" style="float: right;margin-bottom: 20px;" id="delete">All Delete</a>  
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">ID</th>
                  <th class="wd-25p">Email</th>
                  <th class="wd-25p">Subscribing Time</th>
                  <th class="wd-10p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($newslatter as $row)
                <tr>
                    <td><input type="checkbox"> {{ $row->id }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.newslatter.destroy', $row->id) }}">
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