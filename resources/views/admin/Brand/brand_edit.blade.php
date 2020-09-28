@extends('admin.admin_master')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm justify-content-center">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Edit Brand
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.brand.update') }}">
                    @csrf
                    <div class="form-group">
                      <input hidden name="brand_id" value="{{ $brand_edit->id }}">
                      <label>Brand Name</label>
                      <input value="{{ $brand_edit->brand_name }}" name="brand_name" type="text" class="form-control  @error('brand_name') is-invalid @enderror" placeholder="Enter Brand Name">
                      @error('brand_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary" type="submit">Update Brand</button>
                    </div>
                  </form>
                  
                    
                </div>
              

              </div>
      
      

      
              
        </div><!-- row -->

      
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

