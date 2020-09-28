@extends('admin.admin_master')

@section('product') active show-sub @endsection
@section('sub_product_manage') active @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Product</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-12">
          
                  <div class="card">
                    <div class="card-header bg-dark text-light">
                      Product List
                      <a href="{{ url('admin/product/add') }}"><button type="button" class="btn btn-primary fa fa-plus fa-2 float-right"></button></a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mg-b-0">
                          <thead class="bg-primary">
                            <tr>
                              <th>#</th>
                              <th>Product Image</th>
                              <th>Category Name</th>
                              <th>Brand Name</th>
                              <th>Product Name</th>
                              <th>Product Quantity</th>
                              <th>Product Price</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $product as $item)                                                       
                            <tr>                            
                              <td>{{ $loop->iteration }}</td>                         
                              <td><img width="50" height="50" src="{{ asset($item->product_image_1) }}"></td>                         
                              <td>{{ $item->category->category_name }}</td>                         
                              <td>{{ $item->brand->brand_name }}</td>                         
                              <td>{{ $item->product_name }}</td>                         
                              <td>{{ $item->product_quantity }}</td>                         
                              <td>{{ $item->product_price }}</td>                         
                              <td>
                              @if ($item->status == 1)
                                <span class="badge badge-success">Active</span>                             
                              @else
                              <span class="badge badge-danger">Inactive  </span>      
                              @endif
                              </td>
                              <td>
                                @if ($item->status == 1)
                                <a href="{{ url('admin/product/inactive/'.$item->id) }}"> <button class="btn btn-warning fa fa-arrow-down"></button></a>
                                @else
                                <a href="{{ url('admin/product/active/'.$item->id) }}"> <button class="btn btn-success fa fa-arrow-up"></button></a>
                                @endif
                               <a href="{{ url('admin/product/edit/'.$item->id) }}"> <button  class="btn btn-info fa fa-edit"></button></a>
                               <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('admin/product/delete/'.$item->id) }}"> <button class="btn btn-danger fa fa-trash"></button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      {{  $product->links() }}
                      </div>
                    </div>
                  </div>
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

  @if (session()->has('update_success_data')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('update_success_data') }}',
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

  @if (session()->has('product_inactive')) 
  <script>
    Toast.fire({
      icon: 'error',
      type: 'error',
      title: '{{ session('product_inactive') }}',
    })
  </script>
  @endif

  @if (session()->has('product_active')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('product_active') }}',
    })
  </script>
  @endif

@endsection
