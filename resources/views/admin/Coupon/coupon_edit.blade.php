@extends('admin.admin_master')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Coupon</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm justify-content-center">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Edit Coupon
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.coupon.update') }}">
                    @csrf
                    <div class="form-group">
                      <input hidden name="coupon_id" value="{{ $coupon_edit->id }}">
                      <label>Coupon Name</label>
                      <input value="{{ $coupon_edit->coupon_name }}" name="coupon_name" type="text" class="form-control  @error('coupon_name') is-invalid @enderror" placeholder="Enter Coupon Name">
                      @error('coupon_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Coupon Discount</label>
                      <input value="{{ $coupon_edit->coupon_discount }}" name="coupon_discount" type="text" class="form-control  @error('coupon_discount') is-invalid @enderror" placeholder="Enter Coupon Name">
                      @error('coupon_discount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary" type="submit">Update Coupon</button>
                    </div>
                  </form>
                  
                    
                </div>
              

              </div>
      
      

      
              
        </div><!-- row -->

      
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

