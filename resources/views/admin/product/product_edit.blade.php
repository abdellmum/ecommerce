@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Product Edit</span>
      </nav>
      <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="mg-b-20 mg-sm-b-30">Product Update :: </h6>
          <form action="{{ route('admin.product.update', $productShow->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Name : *</span>
                        </label>
                        <input class="form-control" type="text" name="product_name" id="product_name" value="{{ $productShow->product_name }}" placeholder="Enter Product Name">
                        </div>
                        <!--- Error Message -->
                        @error('product_name')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Code : *</span>
                        </label>
                        <input class="form-control" type="text" name="product_code" id="product_code" value="{{ $productShow->product_code }}" placeholder="Enter Product Code">
                        </div>
                        <!--- Error Message -->
                        @error('product_code')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Quantity : *</span>
                        </label>
                        <input class="form-control" type="text" name="product_quantity" id="product_quantity" value="{{ $productShow->product_quantity }}" placeholder="Enter Product Quantity" >
                        </div>
                        <!--- Error Message -->
                        @error('product_quantity')
                        <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Category : *</span>
                        </label>
                        <select class="form-control select2" placeholder="Choose Category" name="category_id" id="category"> 
                            <option label="Choose Category"></option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}" <?php if ($productShow->category_id == $row->id) {
                                    echo "selected";
                                } ?> >{{ $row->category_name }}</option>
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
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Sub Category : *</span>
                        </label>
                        <select class="form-control select2" placeholder="Choose Sub Category" name="subcategory_id" id="subcategory">
                            @foreach ($subcategory as $row)
                            <option value="{{ $row->id }}" <?php if ($productShow->subcategory_id == $row->id) {
                                    echo "selected";
                                } ?> >{{ $row->subcategory_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <!--- Error Message -->
                        @error('subcategory_id')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Brand : *</span>
                        </label>
                        <select class="form-control select2" placeholder="Choose Brand" name="brand_id">
                            <option label="Choose Brand"></option>
                            @foreach ($brand as $row)
                                <option value="{{ $row->id }}" <?php if ($productShow->brand_id == $row->id) {
                                    echo "selected";
                                } ?> >{{ $row->brand_name }}</option>
                            @endforeach
                        </select>
                        <!--- Error Message -->
                        @error('brand_id')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Size : *</span>
                        </label>
                        <input class="form-control" type="text" name="product_size" id="size" value="{{ $productShow->product_size }}" data-role="tagsinput" placeholder="Enter Product Size">
                        </div>
                        <!--- Error Message -->
                        @error('product_size')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Colour : *</span>
                        </label>
                        <input type="text" name="product_colour" data-role="tagsinput" class="form-control" value="{{ $productShow->product_colour }}" id="product_colour" placeholder="Enter Product Colour">
                        </div>
                        <!--- Error Message -->
                        @error('selling_price')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Selling Price : *</span>
                        </label>
                        <input class="form-control" type="text" name="selling_price" id="selling_price" value="{{ $productShow->selling_price }}" placeholder="Enter Selling Price">
                        </div>
                        <!--- Error Message -->
                        @error('selling_price')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Discount Price : *</span>
                        </label>
                        <input class="form-control" type="text" name="discount_price" id="discount_price" value="{{ $productShow->discount_price }}" placeholder="Enter Discount Price">
                        </div>
                        <!--- Error Message -->
                        @error('discount_price')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Product Details : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="product_details" id="summernote" placeholder="Write Product Details Here!">{{ $productShow->product_details }}</textarea>
                        </div>
                        <!--- Error Message -->
                        @error('product_details')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Video Link : *</span>
                        </label>
                            <input class="form-control" type="text" name="video_link" id="video_link" value="{{ $productShow->video_link }}" placeholder="Video Link Here!">
                        </div>
                    </div><!-- col-12 -->

                    <div class="col-lg-4">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image One (Main Thumbnail) : *</span><br>
                        </label>
                        <img style="height: 250px; width: 250px; margin-bottom: 15px;" src="{{ asset('backend/media/product/'.$productShow->image_one) }}" id="image1" alt="Main Image">
                        <label class="custom-file">
                            <input type="file" class="custom-file-input" name="image_one" id="image_one" onchange="showImage(this, 'image1')">
                            <span class="custom-file-control"></span>
                        </label>
                        <!--- Error Message -->
                        @error('image_one')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image Two : *</span>
                        </label><br>
                        <img style="height: 250px; width: 250px; margin-bottom: 15px;" src="{{ asset('backend/media/product/'.$productShow->image_two) }}" id="image2" alt="2nd Image">
                        <label class="custom-file">
                            <input type="file" class="custom-file-input" name="image_two" id="image_two" onchange="showImage(this, 'image2')">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                        <!--- Error Message -->
                        @error('image_two')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image Three : *</span>
                        </label><br>
                        <img style="height: 250px; width: 250px; margin-bottom: 15px;" src="{{ asset('backend/media/product/'.$productShow->image_three) }}" id="image3" alt="Main Image">
                        <label class="custom-file">
                            <input type="file" class="custom-file-input"  name="image_three" id="image_three" onchange="showImage(this, 'image3')">
                            <span class="custom-file-control custom-file-control-inverse"></span>
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
                            <input type="checkbox" name="main_slider" value="1" <?php if ($productShow->main_slider == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Main Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="hot_deal" value="1" <?php if ($productShow->hot_deal == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Hot Deal</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="best_rated" value="1" <?php if ($productShow->best_rated == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Best Reated</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="mid_slider" value="1" <?php if ($productShow->mid_slider == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Mid Slider</span>
                        </label>
                    </div><!-- col-4 -->
                     <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="hot_new" value="1" <?php if ($productShow->hot_new == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Hot New</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="trend" value="1" <?php if ($productShow->trend == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Trend</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="checkbox">
                            <input type="checkbox" name="bye_one_get_one" value="1" <?php if ($productShow->bye_one_get_one == 1) {
                                echo "checked";
                            } ?>>
                            <span class="tx-danger" style="font-weight: bold; font-size: 14px;">Bye One Get One</span>
                        </label>
                    </div><!-- col-4 -->
                </div>
                <div class="form-layout-footer" style="float: right;">
                    <button class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-info mg-r-5 mg-l-5">Update</button>
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

<!-----Image Show Before Upload Start ----->
<script>
$(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (fileName){
            $('#fileLabel').html(fileName);
        }
    });
});

function showImage(data, imgId){
    if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
</script>

@endsection