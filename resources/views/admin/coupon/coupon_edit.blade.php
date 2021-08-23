@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Coupon</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="margin-left: 10%; margin-right: 10%; margin-top: 5%; padding-bottom: 6%;">
          <h6 class="card-body-title">UPDATE COUPON</h6>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        <form method="POST" action="{{ route('admin.coupon.update', $coupon->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="coupon">Coupon Code :</label>
                <input type="text" class="form-control" name="coupon" id="coupon" aria-describedby="emailHelp" value="{{ $coupon->coupon }}" placeholder="Enter Coupon Code">
            </div>
            <div class="form-group">
                <label for="discount">Coupon Percentage :</label>
                <input type="text" class="form-control" name="discount" id="discount" aria-describedby="emailHelp" value="{{ $coupon->discount }}" placeholder="Enter Coupon Percentage">
            </div>
            <button type="submit" class="btn btn-info pd-x-20" style="float: right;">Update</button>
        </form>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
                