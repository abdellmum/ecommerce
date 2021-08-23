@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Coupon</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon LIST
              <a href="" class="btn pd-x-20 btn-warning" data-toggle="modal" data-target="#modaldemo3" style="float: right;margin-bottom: 20px;">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-25p">Coupon Code</th>
                  <th class="wd-25p">Coupon Percentage</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coupon as $key => $row)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->coupon }}</td>
                    <td>{{ $row->discount }} %</td>
                    <td>
                        <a href="{{ route('admin.coupon.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.coupon.destroy', $row->id) }}">
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>
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
            <form method="POST" action="{{ route('admin.coupon.store') }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="coupon">Coupon Code :</label>
                  <input type="text" class="form-control" name="coupon" id="coupon" aria-describedby="emailHelp" placeholder="Coupon Code Here.">
                </div>
                <div class="form-group">
                  <label for="discount">Coupon discount :</label>
                  <input type="text" class="form-control" name="discount" id="discount" aria-describedby="emailHelp" placeholder="Coupon Discount">
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