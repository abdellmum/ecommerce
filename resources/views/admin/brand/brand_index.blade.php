@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brands LIST
              <a href="" class="btn pd-x-20 btn-warning" data-toggle="modal" data-target="#modaldemo3" style="float: right;margin-bottom: 20px;">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">ID</th>
                  <th class="wd-20p">Brand name</th>
                  <th class="wd-30p">Brand logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $key => $row)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->brand_name }}</td>
                    <td><img src="{{ url('backend/media/brands/'.$row->brand_logo) }}" height="70px;" width="100px;"></td>
                    <td>
                        <a href="{{ route('admin.brand.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.brand.destroy', $row->id) }}">
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
 <!-- MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="brand_name">Brand Name :</label>
                  <input type="text" class="form-control" name="brand_name" id="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name">
                </div>
                <div class="form-group">
                  <label for="brand_logo">Brand Logo :</label>
                  <input type="file" class="form-control" name="brand_logo" id="brand_logo" aria-describedby="emailHelp" placeholder="Brand Logo Here.">
                </div>
              </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection