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
          <form method="POST" action="{{ route('admin.blogPost.update', $editPost->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Title (English) : *</span>
                        </label>
                        <input class="form-control" type="text" name="post_title_en" id="post_title_en" value="{{ $editPost->post_title_en }}" placeholder="Enter Post Title(en)">
                        </div>
                        <!--- Error Message -->
                        @error('post_title_en')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Title (Bangla) : *</span>
                        </label>
                        <input class="form-control" type="text" name="post_title_bn" id="post_title_bn" value="{{ $editPost->post_title_bn }}" placeholder="Enter Post Title(bn)">
                        </div>
                        <!--- Error Message -->
                        @error('post_title_bn')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Image (Main Thumbnail) : *</span>
                        </label><br>
                        <label class="custom-file" style="margin-bottom: 10px;">
                            <input type="file" class="custom-file-input" name="image" id="image" onchange="showImage(this, 'image1')">
                            <span class="custom-file-control"></span>
                        </label><br>
                        <img style="height: 250px; width: 550px; margin-bottom: 5px;" src="{{ asset('backend/media/post/'.$editPost->image) }}" id="image1" alt="Main Image">
                        <!--- Error Message -->
                        @error('image')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Category : *</span>
                        </label>
                        <select class="form-control select2" placeholder="Choose Category" name="post_category_id" id="category"> 
                            <option label="Choose Category"></option>
                            @foreach ($postCategory as $row)
                                <option value="{{ $row->id }}" <?php if ($editPost->post_category_id == $row->id) {
                                    echo "selected";
                                } ?> >{{ $row->category_name_en }}</option>
                            @endforeach
                        </select>
                        </div>
                        <!--- Error Message -->
                        @error('category_id')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Description (En) : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="post_description_en" id="summernote" placeholder="Write Post Description Here!">{{ $editPost->post_description_en }}</textarea>
                        </div>
                        <!--- Error Message -->
                        @error('post_description_en')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Description (Bn) : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="post_description_bn" id="summernote01" placeholder="Write Post Description Here!">{{ $editPost->post_description_bn }}</textarea>
                        </div>
                        <!--- Error Message -->
                        @error('post_description_bn')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->


                </div><!-- row -->
                <br><hr>
                <div class="form-layout-footer" style="float: right;">
                    <a href="{{ route('admin.blogPost.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-info mg-r-5 mg-l-5">Update</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    
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