@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
      <span class="breadcrumb-item active">Pending Return Orders</span>
    </nav>
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5> Pending Return Orders :  {{ $orders->count() }}</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Payment Type</th>
                <th class="wd-15p">Transection Id</th>
                <th class="wd-15p">Amount</th>
                <th class="wd-15p">Date</th>
                <th class="wd-15p">Return</th>
                <th class="wd-15p">Status</th>
                <th class="wd-15p">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $row)
                <tr>
                    <td>{{ $row->payment_type }}</td>
                    <td>{{ $row->blnc_transection }}</td>
                    <td>$ {{ $row->payment_amount }}</td>
                    <td>{{ $row->date }}</td>
                    <td>
                        @if($row->return_order == 1)
                            <span class="badge badge-info">Pending</span>
                        @elseif($row->return_order == 2)
                            <span class="badge badge-success">Success</span>
                        @else
                            <span class="badge badge-danger">Cancel</span>
                        @endif
                    </td>
                    <td>
                        @if($row->status == 0)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($row->status == 1)
                            <span class="badge badge-info">Payment Accept</span>
                        @elseif($row->status == 2) 
                                <span class="badge badge-info">Progress </span>
                        @elseif($row->status == 3)  
                            <span class="badge badge-success">Delevered </span>
                        @else
                            <span class="badge badge-danger">Cancel </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.return.view', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
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