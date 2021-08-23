@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Product Add</h6>
          <p class="mg-b-20 mg-sm-b-30">New Product Add Form <a href="{{ route('admin.product.index') }}" class="btn btn-success pd-x-20 pull-right">All Product</a>
          </p>
          <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name" id="product_name" placeholder="Enter Product Name">
                        </div>
                        <!--- Error Message -->
                        @error('product_name')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" id="product_code" placeholder="Enter Product Code">
                        </div>
                        <!--- Error Message -->
                        @error('product_code')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_quantity" id="product_quantity" placeholder="Enter Product Quantity" >
                        </div>
                        <!--- Error Message -->
                        @error('product_quantity')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" placeholder="Choose Category" name="category_id" id="category"> 
                            <option label="Choose Category"></option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <!--- Error Message -->
                        @error('category_id')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" placeholder="Choose Sub Category" name="subcategory_id" id="subcategory">
                            <option label="Please Select Category"></option>
                        </select>
                        </div>
                        <!--- Error Message -->
                        @error('subcategory_id')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" placeholder="Choose Brand" name="brand_id">
                            <option label="Choose Brand"></option>
                            @foreach ($brand as $row)
                                <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                        <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" placeholder="Enter Product Size">
                        </div>
                        <!--- Error Message -->
                        @error('product_size')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label><br>
                        <input type="text" name="product_colour" data-role="tagsinput" class="form-control" id="product_colour" placeholder="Enter Product Colour">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price" id="selling_price" placeholder="Enter Selling Price">
                        </div>
                        <!--- Error Message -->
                        @error('selling_price')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" type="text" name="product_details" id="summernote" placeholder="Write Product Details Here!"></textarea>
                        </div>
                         <!--- Error Message -->
                        @error('product_details')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="video_link" id="video_link" placeholder="Video Link Here!">
                        </div>
                    </div><!-- col-12 -->
                    <div class="col-lg-4">
                        <label>Image One (Main Thumbnail) <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);">
                                <span class="custom-file-control"></span>
                                <img src="" id="one" style="margin-top: 15%;">
                            </label>
                        <!--- Error Message -->
                        @error('image_one')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label>Image Two <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_two"  onchange="readURL1(this);">
                                <span class="custom-file-control custom-file-control-primary"></span>
                                <img src="" id="two" style="margin-top: 15%;">
                            </label>
                            <!--- Error Message -->
                        @error('image_two')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label>Image Three <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" name="image_three" id="file" class="custom-file-input" onchange="readURL2(this);">
                                <span class="custom-file-control custom-file-control-inverse"></span>
                                <img src="" id="three" style="margin-top: 15%;">
                            </label>
                        <!--- Error Message -->
                        @error('image_three')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->
                </div><!-- row -->
                <br><hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="main_slider" value="1">
                            <span>Main Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="hot_deal" value="1">
                            <span>Hot Deal</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="best_rated" value="1">
                            <span>Best Reated</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="mid_slider" value="1">
                            <span>Mid Slider</span>
                        </label>
                    </div><!-- col-4 -->
                     <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="hot_new" value="1">
                            <span>Hot New</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="trend" value="1">
                            <span>Trend</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="bye_one_get_one" value="1">
                            <span>Bye One Get One</span>
                        </label>
                    </div><!-- col-4 -->

                </div>
                <div class="form-layout-footer" style="float: right;">
                    <button class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-info mg-r-5 mg-l-5">Submit Form</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->



    <!----- Link For Ajax ----->
<script src="{{ asset('backend/lib/ajax/jquery.min.js') }}"></script>
<!--- Link For Taginput --->
<script src="{{ asset('backend/lib/taginput/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('backend/lib/taginput/bootstrap-tagsinput.min.js') }}"></script>

<!----- Ajax Request For sub Category ----->
<script type="text/javascript">
       $(document).ready(function(){
          $(document).on('change','#category', function(){
              var category_id = $(this).val();
              $.ajax({
                  type: "GET",
                  url : "{{ route('admin.product.sub.get') }}",
                  data: {category_id,category_id},
                  success:function(data) {
                     var html = '<option value="">Select Subcategory</option>';
                     $.each(data, function(k,v){
                        html+= '<option value="'+v.id+'">'+v.subcategory_name+'</option>';
                     });
                     $('#subcategory').html(html);
                  }
              });
          });
       });
   </script>

<!--- Ajax Request For Image Show --->
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


@endsection