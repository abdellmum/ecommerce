@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
      <span class="breadcrumb-item active">Yearly Search</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Year Wise Search :  {{ $orders->count() }}</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th class="wd-10p">Payment Type</th>
                    <th class="wd-15p">Transection Id</th>
                    <th class="wd-10p">Subtotal</th>
                    <th class="wd-5p">Shipping</th>
                    <th class="wd-5p">Vat</th>
                    <th class="wd-10p">Total</th>
                    <th class="wd-10p">Date</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-10p">Action</th>
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
                        @if($row->status == 3)
                            <span class="badge badge-info">Delevered</span>
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
        <h4 class="sl-page-title"> 
            Total Amount :  {{ $order_sale }} $
       </h4>
      </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection