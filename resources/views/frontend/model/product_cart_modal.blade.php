

    <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Produit Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 16rem;">
                        <img src="" class="card-img-top" id="pimage" style="height: 240px; margin-top: 10px;">
                    <div class="card-body"></div>
                </div>
                </div>
                <div class="col-md-4 ml-auto">
                    <ul class="list-group">
                    <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
                <li class="list-group-item">Produit code: <span id="pcode"> </span></li>
                    <li class="list-group-item">Categorie:  <span id="pcat"> </span></li>
                    <li class="list-group-item">SousCategorie:  <span id="psubcat"> </span></li>
                    <li class="list-group-item" name="bndiv">Marque: <span id="pbrand"> </span></li>
                    <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Disponible</span></li>
                </ul>
                </div>
                <div class="col-md-4 ">
                    <form action="{{ route('product.cart.insert') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group" id="colordiv">
                            <label for="">Coleur</label>
                            <select name="color" class="form-control">
                            </select>
                        </div>
                        <div class="form-group" id="sizediv" >
                            <label for="exampleInputEmail1">Size</label>
                            <select name="size" class="form-control" id="size">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantité</label>
                            <input type="number" class="form-control" value="1" name="qty">
                        </div>
                        <button type="submit" class="btn btn-primary">ajouter au panier</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


    <!---- Product Sort Details By Model ---->

    <script type="text/javascript">
        function productview(id){
              $.ajax({
                        url: "{{  url('/cart/product/view/') }}/"+id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var public_path =  {!! json_encode(url('/')) !!}+"/public/backend/media/product/"+data.product.image_one;
                            $('#pname').text(data.product.product_name);
                            $('#pimage').attr('src',public_path);
                            $('#pcode').text(data.product.product_code);
                            $('#pcat').text(data.cat.category_name);
                            $('#psubcat').text(data.subcat.subcategory_name);
                            $('#pbrand').text(data.bnd.brand_name);
                            $('#product_id').val(data.product.id);

                            var d =$('select[name="color"]').empty();
                            $.each(data.color, function(key, value){
                                $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                                if (data.color == "") {
                                    $('#colordiv').hide();
                                }else{
                                    $('#colordiv').show();
                                }
                            });
                            var d =$('select[name="size"]').empty();
                            $.each(data.size, function(key, value){
                                $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                                if (data.size == "") {
                                    $('#sizediv').hide();
                                }else{
                                    $('#sizediv').show();
                                }
                            });
                        }
                })
        }
    </script>

    <!---- Add to card Ajax request   ---->

    {{-- <script type="text/javascript" >
            $(document).ready(function() {
              $('.addcart').on('click', function(){
                var id = $(this).data('id');
                if(id) {
                   $.ajax({
                       url: "{{  url('/add/to/card/') }}/"+id,
                       type:"GET",
                       dataType:"json", 
                       success:function(data) {
                         const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          })

                         if($.isEmptyObject(data.error)){
                              Toast.fire({
                                type: 'success',
                                title: data.success
                              })
                         }else{
                               Toast.fire({
                                  type: 'error',
                                  title: data.error
                              })
                         }

                       },

                   });
               } else {
                   alert('danger');
               }
                e.preventDefault();
           });
       });
    </script> --}}

    	 <!---- Wishlish Ajax request ---->

	 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#wishlist', function(){
                var product_id = $(this).data('id');
                $.ajax({
                    url: "{{ route('customer.wishlist') }}",
                    type: "GET",
                    data: {product_id:product_id},
                    success:function(data){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          })

                         if($.isEmptyObject(data.error)){
                              Toast.fire({
                                type: 'success',
                                title: data.success
                              })
                         }else{
                               Toast.fire({
                                  type: 'error',
                                  title: data.error
                              })
                         }
                    }// End Success //
                });
            });
        });
	</script>
