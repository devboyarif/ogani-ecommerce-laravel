@extends('admin.admin_master')

@section('sub_product_add') active @endsection
@section('product') active show-sub @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Product</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Add Brand
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.product.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label text-dark">Product Name: <span class="tx-danger">*</span></label>
                              <input value="{{ old('product_name') }}"   class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" placeholder="Enter Product Name">
                              @error('product_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label text-dark">Product Code: <span class="tx-danger">*</span></label>
                              <input value="{{ old('product_code') }}"   class="form-control @error('product_code') is-invalid @enderror" type="text" name="product_code" placeholder="Enter Product Code">
                              @error('product_code')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label text-dark">Product Price: <span class="tx-danger">*</span></label>
                              <input value="{{ old('product_price') }}"   class="form-control @error('product_price') is-invalid @enderror" type="number" name="product_price" placeholder="Enter Product Price">
                              @error('product_price')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Product Quantity: <span class="tx-danger">*</span></label>
                              <input value="{{ old('product_quantity') }}" name="product_quantity" class="form-control @error('product_quantity') is-invalid @enderror" type="text"  placeholder="Enter Product Quantity">
                              @error('product_quantity')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-8 -->
                          <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Category: <span class="tx-danger">*</span></label>
                              <select value="{{ old('category_name') }}" name="category_name" class="form-control select2 select2-hidden-accessible @error('category_name') is-invalid @enderror" data-placeholder="Choose Category" tabindex="-1" aria-hidden="true">
                                <option label="Select Category"></option>  
                                @foreach ($categories as $item)                                 
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach                           
                              </select>
                              @error('category_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Brand: <span class="tx-danger">*</span></label>
                              <select value="{{ old('brand_name') }}"   name="brand_name" class="form-control select2 select2-hidden-accessible @error('brand_name') is-invalid @enderror" data-placeholder="Choose Brand" tabindex="-1" aria-hidden="true">
                                <option label="Select Brand"></option>
                                @foreach ($brands as $item)                                 
                                <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                @endforeach                            
                              </select>
                              @error('brand_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                                {{-- <img class="mb-2" src="#" id="product_image_1"/>    --}}
                                <label class="form-control-label text-dark">Product Thumbnail Image: <span class="tx-danger">*</span></label>
                                <input type="file" class="form-control @error('product_image_1') is-invalid @enderror" name="product_image_1">
                                {{-- <label class="custom-file">
                                    <input name="product_image_1" type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>                            --}}
                                @error('product_image_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label text-dark">Product Image One: <span class="tx-danger">*</span></label>
                              <input type="file" class="form-control @error('product_image_2') is-invalid @enderror" name="product_image_2">
                                {{-- <label class="custom-file">
                                    <input name="product_image_1" type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>                --}}
                                @error('product_image_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Product Image Two: <span class="tx-danger">*</span></label>
                              <input type="file" class="form-control @error('product_image_3') is-invalid @enderror" name="product_image_3">
                                {{-- <label class="custom-file">
                                    <input name="product_image_1" type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>    --}}
                                @error('product_image_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div><!-- col-8 -->

                          <div class="col-lg-12 mt-5">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Short Description: <span class="tx-danger">*</span></label>
                              <textarea name="short_description" id="summernote"></textarea>
                              @error('short_description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-8 -->
                          <div class="col-lg-12 mt-5">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Long Description: <span class="tx-danger">*</span></label>
                              <textarea name="long_description" id="summernote2"></textarea>
                              @error('long_description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->
            
                        <div class="form-layout-footer">
                          <button type="submit" class="btn btn-info mg-r-5">Add Product</button>
                          <button type="reset" class="btn btn-secondary">Reset Form</button>
                        </div><!-- form-layout-footer -->
                      </div>
                  </form>
                  
                    
                </div>
              

              </div>
      
        </div><!-- row -->

      
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('scripts')



  @if (session()->has('success')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('success') }}',
    })
  </script>
  @endif

  @if (session()->has('update_success')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('update_success') }}',
    })
  </script>
  @endif

  @if (session()->has('delete_success')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('delete_success') }}',
    })
  </script>
  @endif

  @if (session()->has('brand_inactive')) 
  <script>
    Toast.fire({
      icon: 'error',
      type: 'error',
      title: '{{ session('brand_inactive') }}',
    })
  </script>
  @endif

  @if (session()->has('brand_active')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('brand_active') }}',
    })
  </script>
  @endif



@endsection
