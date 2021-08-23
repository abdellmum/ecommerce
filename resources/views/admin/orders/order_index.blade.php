@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
      <span class="breadcrumb-item active">Pending Orders</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Total Orders : - {{ $orders->count() }}</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th>Payment Type</th>
                <th>Transection Id</th>
                <th>Subtotal</th>
                <th>Shipping</th>
                <th>Vat</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $row)
                <tr>
                    <td>{{ $row->payment_type }}</td>
                    <td>{{ $row->blnc_transection }}</td>
                    <td>$ {{ $row->subtotal }}</td>
                    <td>$ {{ $row->shipping }}</td>
                    <td>$ {{ $row->vat }}</td>
                    <td>$ {{ $row->total }}</td>
                    <td>{{ $row->date }}</td>
                    <td>
                        @if($row->status == 0)
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
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