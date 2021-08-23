@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">paneau d'administration</a>
        <span class="breadcrumb-item active">section postes</span>
      </nav>
      <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"> ajouter nouveau poste</h6>
          <p class="mg-b-20 mg-sm-b-30">ajouter nouveau form <a href="{{ route('admin.blogPost.index') }}" class="btn btn-success pd-x-20 pull-right">All Post</a>
          </p>
          <form action="{{ route('admin.blogPost.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;">titre du poste (Français) : *</span>
                        </label>
                        <input class="form-control" type="text" name="post_title_en" id="post_title_en" placeholder="Enter le titre du poste">
                        </div>

                        @error('post_title_en')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Title (english) : *</span>
                        </label>
                        <input class="form-control" type="text" name="post_title_bn" id="post_title_bn" placeholder="Enter Post Title Bangla">
                        </div>
                        <!--- Error Message -->
                        @error('post_title_bn')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-6">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Image (Main Thumbnail) : *</span>
                        </label><br>
                        <label class="custom-file" style="margin-bottom: 10px;">
                            <input type="file" class="custom-file-input" name="image" id="image" onchange="showImage(this, 'image1')">
                            <span class="custom-file-control"></span>
                        </label>
                        <img style="height: 250px; width: 550px; margin-bottom: 5px;" src="{{ asset('backend/use/800px-Insert_image_here.svg.png') }}" id="image1" alt="Main Image">
                        <!--- Error Message -->
                        @error('image')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                        <label class="form-control-label">
                            <span class="tx-danger" style="font-weight: bold; font-size: 15px;">Post Category : *</span>
                        </label>
                        <select class="form-control select2" placeholder="Choose Category" name="post_category_id" id="category">
                            <option label="Choose Category"></option>
                            @foreach ($postCategory as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                            @endforeach
                        </select>
                        </div>
                        <!--- Error Message -->
                        @error('post_category_id')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-6 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;"> Post Details (English) : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="post_description_en" id="summernote" placeholder="Write Post Details Here!"></textarea>
                        </div>
                         <!--- Error Message -->
                        @error('post_description_en')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">
                           <span class="tx-danger" style="font-weight: bold; font-size: 15px;"> Post Details (Bangla) : *</span>
                        </label>
                        <textarea class="form-control" type="text" name="post_description_bn" id="summernote01" placeholder="Write Post Details Here!"></textarea>
                        </div>
                         <!--- Error Message -->
                        @error('post_description_bn')
                            <strong style="color: red;">{{ $message }}</strong>
                        @enderror
                    </div><!-- col-12 -->

                </div><!-- row -->

                <div class="form-layout-footer" style="float: right;">
                    <a href="{{ route('admin.blogPost.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-info mg-r-5 mg-l-5">Save Data</button>
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
