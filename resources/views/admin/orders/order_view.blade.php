@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
      <span class="breadcrumb-item active">Pending Orders</span>
    </nav>

    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
            <div class="row">
                <div class="col-12">
                    <a style="float: right;" class="btn btn-info" href="{{ route('admin.orders.index') }}">All Orders</a>
                </div>
            </div><br>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header" style="width: 93%; margin: 0 auto;"><strong>Order</strong> Details</div>
   
                        <div class="card-body" style="padding: 0; width: 93%; margin: auto; margin-top: 20px;">
                        <table class="table">
                             <tr>
                                 <th>Name : </th>
                                 <th>{{ $order->user->name ?? ''}}</th>
                             </tr>
                             <tr>
                                 <th>Email : </th>
                                 <th>{{ $order->user->email ?? '' }}</th>
                             </tr>
                             <tr>
                                 <th>Payment : </th>
                                 <th>{{ $order->payment_type }}</th>
                             </tr>
                             <tr>
                                 <th>Payment ID : </th>
                                 <th>{{ $order->payment_id }}</th>
                             </tr>
                             <tr>
                                <th>Payment Amount : </th>
                                <th>{{ $order->payment_amount }}</th>
                            </tr>
                            <tr>
                                <th>Blance Transection : </th>
                                <th>{{ $order->blnc_transection }}</th>
                            </tr>
                            <tr>
                                <th>Subtotal : </th>
                                <th>{{ $order->subtotal }}</th>
                            </tr>
                            <tr>
                                <th>Shipping : </th>
                                <th>{{ $order->shipping }}</th>
                            </tr>
                            <tr>
                                <th>Vat : </th>
                                <th>{{ $order->vat }}</th>
                            </tr>
                             <tr>
                                 <th>Total :</th>
                                 <th>{{ $order->total }} $</th>
                             </tr>

                              <tr>
                                 <th>Date: </th>
                                 <th>{{ $order->date }}</th>
                             </tr>
                        </table>  
   
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header" style="width: 93%; margin: 0 auto;"><strong>Shipping</strong> Details</div>
                        <div class="card-body" style="padding: 0; width: 93%; margin: auto; margin-top: 20px;">
                        <table class="table">
                             <tr>
                                 <th>Name : </th>
                                 <th>{{ $shipping->ship_name ?? '' }}</th>
                             </tr>
                             <tr>
                                 <th>Phone : </th>
                                 <th>{{ $shipping->ship_phone ?? ''}}</th>
                             </tr>
                             <tr>
                                 <th>Email : </th>
                                 <th>{{ $shipping->ship_email ?? ''}}</th>
                             </tr>
                             <tr>
                                 <th>Address : </th>
                                 <th>{{ $shipping->ship_address ?? ''}}</th>
                             </tr>
                             <tr>
                                 <th>City :</th>
                                 <th>{{ $shipping->ship_city ?? ''}}</th>
                             </tr>
                             <tr>
                                <th>Post Code :</th>
                                <th>{{ $shipping->ship_post_code ?? ''}}</th>
                            </tr>
                              <tr>
                                 <th>Status : </th>
                                 <th>
                                    @if($order->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-info">Payment Accept</span>
                                    @elseif($order->status == 2) 
                                          <span class="badge badge-info">Progress </span>
                                    @elseif($order->status == 3)  
                                        <span class="badge badge-success">Delevered </span>
                                    @else
                                        <span class="badge badge-danger">Cancel </span>
                                    @endif
                                 </th>
                             </tr>
                              
                        </table>  
   
                        </div>
                    </div>
                </div>
            </div>
             
            <div class="row">
                <div class="card pd-20 pd-sm-40 col-lg-12">
                  <h6 class="card-body-title">Product Details </h6>
                  <br>
                  <div class="table-wrapper">
                    <table  class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-10p">Product Category</th>
                          <th class="wd-10p">Product Code</th>
                          <th class="wd-15p">Name</th>
                          <th class="wd-15p">Image</th>
                          <th class="wd-10p">Color </th>
                          <th class="wd-5p">Size</th>
                          <th class="wd-5p">Quantity</th>
                          <th class="wd-10p">Unit Price</th>
                          <th class="wd-20p">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($order_details as $row)
                        <tr>
                            <td>{{ $row->product->category->category_name }}</td>
                            <td>{{ $row->product->product_code }}</td>
                            <td>{{ $row->product_name }}</td>
                            <td><img src="{{ asset('backend/media/product/'. $row->product->image_one) }}" height="60px;" width="50px;"></td>
                            <td>{{ $row->color ?? ''}}</td>
                            <td>{{ $row->size ?? ''}}</td>
                            <td>{{ $row->qty ?? ''}}</td>
                            <td>${{ $row->single_price ?? ''}}</td>
                            <td>${{ $row->total_price ?? ''}}</td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>

            <div class="row">
                <div class="col-12">
                    @if($order->status == 0)
                        <a class="btn btn-primary btn-block" href="{{ route('admin.orders.accept', $order->id) }}">Accept Payment</a>

                        <button type="button" class="btn btn-danger btn-block" title="Delete" onclick="cancleItem({{ $order->id }})">Cancle</button>
                        <form id="delete_form_{{ $order->id }}" method="get" action="{{ route('admin.orders.cancle', $order->id) }}">
                        </form>
                    @elseif($order->status == 1)
                        <a class="btn btn-primary btn-block" href="{{ route('admin.orders.progressStatus', $order->id) }}">Progress Order</a>
                    @elseif($order->status == 2)
                        <a class="btn btn-info btn-block" href="{{ route('admin.orders.deliveryStatus', $order->id) }}">Delievery Order</a>
                    @elseif($order->status == 3)
                        <a class="btn btn-success btn-block disabled text-light">This Order Already Delievered</a>
                    @else
                        <a class="btn btn-danger btn-block disabled text-light">This Order is already canacled</a>
                    @endif
               </div>
           </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection

<script type="text/javascript">
    function cancleItem(id){
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'mr-2 btn btn-danger'
          },
          buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You Want to Cancle This!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Cancle it!',
            cancelButtonText: 'No    !',
            reverseButtons: true
          }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('delete_form_'+id).submit();
                } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
            })
    }
  </script>