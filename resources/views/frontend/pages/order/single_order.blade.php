@extends('frontend.app')
@section('content')

<div class="sl-pagebody">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="table-wrapper">
                    <div class="row">
                        <div class="col-12">
                            {{-- <a style="float: right;" class="btn btn-info" href="{{ route('admin.orders.index') }}">All Orders</a> --}}
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header" style="width: 93%; margin: 0 auto;"><strong>commander</strong> Details</div>
                                <div class="card-body" style="padding: 0; width: 93%; margin: auto; margin-top: 20px;">
                                    <table class="table">
                                        <tr>
                                            <th>nom : </th>
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
                                            <th>Sous-total : </th>
                                            <th>{{ $order->subtotal }}</th>
                                        </tr>
                                        <tr>
                                            <th>Shipping : </th>
                                            <th>{{ $order->shipping }}</th>
                                        </tr>
                                        <tr>
                                            <th>TVA : </th>
                                            <th>{{ $order->vat }}</th>
                                        </tr>acheter
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
                                <div class="card-header" style="width: 93%; margin: 0 auto;"><strong>achter</strong> Details</div>
                                <div class="card-body" style="padding: 0; width: 93%; margin: auto; margin-top: 20px;">
                                <table class="table">
                                     <tr>
                                         <th>nom : </th>
                                         <th>{{ $shipping->ship_name ?? '' }}</th>
                                     </tr>
                                     <tr>
                                         <th>telePhone : </th>
                                         <th>{{ $shipping->ship_phone ?? ''}}</th>
                                     </tr>
                                     <tr>
                                         <th>Email : </th>
                                         <th>{{ $shipping->ship_email ?? ''}}</th>
                                     </tr>
                                     <tr>
                                         <th>Addresse : </th>
                                         <th>{{ $shipping->ship_address ?? ''}}</th>
                                     </tr>
                                     <tr>
                                         <th>ville :</th>
                                         <th>{{ $shipping->ship_city ?? ''}}</th>
                                     </tr>
                                     <tr>
                                        <th>Postal Code :</th>
                                        <th>{{ $shipping->ship_post_code ?? ''}}</th>
                                    </tr>
                                      <tr>
                                         <th>Status : </th>
                                         <th>
                                            @if($order->status == 0)
                                                <span class="badge badge-warning">suivre</span>
                                            @elseif($order->status == 1)
                                                <span class="badge badge-info">Payment Accepter</span>
                                            @elseif($order->status == 2)
                                                  <span class="badge badge-info">Progression </span>
                                            @elseif($order->status == 3)
                                                <span class="badge badge-success">livré </span>
                                            @else
                                                <span class="badge badge-danger">fermer </span>
                                            @endif
                                         </th>
                                     </tr>

                                </table>

                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="card pd-20 pd-sm-40 col-lg-12">
                          <h6 class="card-body-title" style="text-align: center; margin-top: 15px; font-size: 20px;">Produit Details </h6>
                          <br>
                          <div class="table-wrapper">
                            <table  class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-10p">Produit Categorie/th>
                                  <th class="wd-10p">Produit Code</th>
                                  <th class="wd-15p">nom</th>
                                  <th class="wd-15p">Image</th>
                                  <th class="wd-10p">Coleur </th>
                                  <th class="wd-5p">voume</th>
                                  <th class="wd-5p">Quantité</th>
                                  <th class="wd-10p">Unité Prx</th>
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
                    </div><br>

                    <div class="row">
                        <div class="col-12">
                            @if($order->status == 0 )
                                <button type="button" class="btn btn-danger btn-block" title="Order Cancle" onclick="cancleItem({{ $order->id }})">anuller commande</button>
                                <form id="delete_form_{{ $order->id }}" method="get" action="{{ route('admin.orders.cancle', $order->id) }}">
                                </form>
                            @elseif($order->status == 1)
                                <button type="button" class="btn btn-danger btn-block" title="Order Cancle" onclick="cancleItem({{ $order->id }})"> anuller commande</button>
                                <form id="delete_form_{{ $order->id }}" method="get" action="{{ route('admin.orders.cancle', $order->id) }}">
                                </form>
                            @elseif($order->status == 2)
                                <button type="button" class="btn btn-danger btn-block" title="Order Cancle" onclick="cancleItem({{ $order->id }})"> anuller commande</button>
                                <form id="delete_form_{{ $order->id }}" method="get" action="{{ route('admin.orders.cancle', $order->id) }}">
                                </form>
                            @elseif($order->status == 3)
                                @if ($order->return_order == 2)
                                    <a class="btn btn-danger btn-block disabled text-light">commande déja retourné</a>
                                @elseif($order->return_order == 1)
                                    <a class="btn btn-danger btn-block disabled text-light">commande déja retourné</a>
                                    <a class="btn btn-danger btn-block disabled text-light">commande déja retourné</a>
                                @else
                                    <button type="button" class="btn btn-danger btn-block" title="Return Order" onclick="cancleItem({{ $order->id }})">Retourner commande</button>
                                    <form id="delete_form_{{ $order->id }}" method="get" action="{{ route('this.order.return', $order->id) }}">
                                    </form>
                                @endif
                            @else
                            <a class="btn btn-danger btn-block disabled text-light">commande déja retourné</a>
                            @endif
                       </div>
                   </div><br>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('backend/lib/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('backend/lib/sweetalert2/sweet-alert.init.js')}}"></script>


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
          title: 'vous etes sure?',
          text: "vouliez vous retourner cette commande",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'oui, retourner!',
          cancelButtonText: 'Non, anuller!',
          reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete_form_'+id).submit();
              } else if (
                      //
                      result.dismiss === Swal.DismissReason.cancel
                  ) {
                      swalWithBootstrapButtons.fire(
                          'anuller',
                          'donnée sauvegardé :)',
                          'erreur'
                      )
                  }
          })
  }
</script>

@endsection
