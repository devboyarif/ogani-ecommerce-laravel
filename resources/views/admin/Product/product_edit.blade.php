@extends('admin.admin_master')

@section('product') active show-sub @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Edit Product</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Edit Product Data
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.product.update.data') }}">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                          <div class="col-lg-4">
                            <input name="product_id" hidden value="{{ $product_edit->id }}">
                            <div class="form-group">
                              <label class="form-control-label text-dark">Product Name: <span class="tx-danger">*</span></label>
                              <input value="{{ $product_edit->product_name }}" class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" placeholder="Enter Product Name">
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
                              <input value="{{ $product_edit->product_code }}" class="form-control @error('product_code') is-invalid @enderror" type="text" name="product_code" placeholder="Enter Product Code">
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
                              <input value="{{ $product_edit->product_price }}"  class="form-control @error('product_price') is-invalid @enderror" type="number" name="product_price" placeholder="Enter Product Price">
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
                              <input value="{{ $product_edit->product_quantity }}" name="product_quantity" class="form-control @error('product_quantity') is-invalid @enderror" type="text"  placeholder="Enter Product Quantity">
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
                              <select name="category_name" class="form-control select2 select2-hidden-accessible @error('category_name') is-invalid @enderror" data-placeholder="Choose Category" tabindex="-1" aria-hidden="true">
                                <option label="Select Category"></option>  
                                @foreach ($categories as $item)                                 
                                <option value="{{ $item->id }}" {{ $item->id == $product_edit->category_id ? 'selected':'' }}>{{ $item->category_name }}</option>
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
                              <select name="brand_name" class="form-control select2 select2-hidden-accessible @error('brand_name') is-invalid @enderror" data-placeholder="Choose Brand" tabindex="-1" aria-hidden="true">
                                <option label="Select Brand"></option>
                                @foreach ($brands as $item)                                 
                                <option value="{{ $item->id }}" {{ $item->id == $product_edit->brand_id ? 'selected':'' }}>{{ $item->brand_name }}</option>
                                @endforeach                            
                              </select>
                              @error('brand_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-4 -->

                          <div class="col-lg-12 mt-5">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label text-dark">Short Description: <span class="tx-danger">*</span></label>
                              <textarea name="short_description" id="summernote">{{ $product_edit->short_description }}"</textarea>
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
                              <textarea name="long_description" id="summernote2">{{ $product_edit->long_description }}"</textarea>
                              @error('long_description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->
            
                        <div class="form-layout-footer">
                          <button type="submit" class="btn btn-info mg-r-5">Update Product Data</button>
                          <button type="reset" class="btn btn-secondary">Reset Form</button>
                        </div><!-- form-layout-footer -->
                      </div>
                  </form>
                                 
                </div>
              

              </div>
              <div class="card mt-5">
                <div class="card-header bg-dark text-light">
                  Edit Product Image
                </div>
                <div class="card-body">
                  
                   
                        <div class="form-layout">
                            <div class="row mg-b-25">
                             
                              
                              <div class="col-lg-4">

                                <form method="POST" action="{{ route('admin.product.image_1') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <input name="product_id" hidden value="{{ $product_edit->id }}">
                                    <img src="{{ asset($product_edit->product_image_1) }}" width="100" height="100"> <br>
                                    <label class="form-control-label text-dark mt-2">Product Thumbnail Image: <span class="tx-danger">*</span></label>
                                    <input type="file" class="form-control @error('product_image_1') is-invalid @enderror" name="product_image_1">
                                    @error('product_image_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <button type="submit" class="btn btn-info mg-r-5 mt-5">Update Image</button>
                                </div>
                                </form>

                              </div>

                              <div class="col-lg-4">
                                <form method="POST" action="{{ route('admin.product.image_2') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <input name="product_id" hidden value="{{ $product_edit->id }}">
                                    <img src="{{ asset($product_edit->product_image_2) }}" width="100" height="100"> <br>
                                  <label class="form-control-label text-dark mt-2">Product Image One: <span class="tx-danger">*</span></label>
                                  <input type="file" class="form-control @error('product_image_2') is-invalid @enderror" name="product_image_2">
                                  @error('product_image_2')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                  <button type="submit" class="btn btn-info mg-r-5 mt-5">Update Image</button>          
                                </div>
                                </form>
                              </div>
                              <div class="col-lg-4">

                                <form method="POST" action="{{ route('admin.product.image_3') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mg-b-10-force">
                                    <input name="product_id" hidden value="{{ $product_edit->id }}">
                                    <img src="{{ asset($product_edit->product_image_3) }}" width="100" height="100"> <br>
                                  <label class="form-control-label text-dark mt-2">Product Image Two: <span class="tx-danger">*</span></label>
                                  <input type="file" class="form-control @error('product_image_3') is-invalid @enderror" name="product_image_3">
                                  @error('product_image_3')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                  <button type="submit" class="btn btn-info mg-r-5 mt-5">Update Image</button>
                                </div>
                                </form>

                              </div> 
                                            
                            </div><!-- row -->
                
                          
                          </div>
                     
                      
                                 
                </div>
              

              </div>
      
        </div><!-- row -->

      
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('scripts')



  @if (session()->has('product_image')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('product_image') }}',
    })
  </script>
  @endif


@endsection
