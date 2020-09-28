@extends('admin.admin_master')

@section('coupon') active @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Coupon</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-8">
          
                  <div class="card">
                    <div class="card-header bg-dark text-light">
                      Coupon List
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mg-b-0">
                          <thead class="bg-primary">
                            <tr>
                              <th>#</th>
                              <th>Coupon Name</th>
                              <th>Coupon Discount</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $coupon as $item)                                                       
                            <tr>                            
                              <td>{{ $loop->iteration }}</td>                         
                              <td>{{ $item->coupon_name }}</td>                         
                              <td>{{ $item->coupon_discount }}</td>                         
                              <td>
                              @if ($item->status == 1)
                                <span class="badge badge-success">Active</span>                             
                              @else
                              <span class="badge badge-danger">Inactive  </span>      
                              @endif
                              </td>
                              <td>
                                @if ($item->status == 1)
                                <a href="{{ url('admin/coupon/inactive/'.$item->id) }}"> <button class="btn btn-warning fa fa-arrow-down"></button></a>
                                @else
                                <a href="{{ url('admin/coupon/active/'.$item->id) }}"> <button class="btn btn-success fa fa-arrow-up"></button></a>
                                @endif
                               <a href="{{ url('admin/coupon/edit/'.$item->id) }}"> <button  class="btn btn-info fa fa-edit"></button></a>
                               <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('admin/coupon/delete/'.$item->id) }}"> <button class="btn btn-danger fa fa-trash"></button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      {{  $coupon->links() }}
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Add coupon
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.coupon.add') }}">
                    @csrf
                    <div class="form-group">
                      <label>Coupon Name</label>
                      <input name="coupon_name" type="text" class="form-control  @error('coupon_name') is-invalid @enderror" placeholder="Enter Coupon Name">
                      @error('coupon_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Coupon Discount</label>
                      <input name="coupon_discount" type="number" class="form-control  @error('coupon_discount') is-invalid @enderror" placeholder="Enter Coupon Discount">
                      @error('coupon_discount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary" type="submit">Add Coupon</button>
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

  @if (session()->has('coupon_inactive')) 
  <script>
    Toast.fire({
      icon: 'error',
      type: 'error',
      title: '{{ session('coupon_inactive') }}',
    })
  </script>
  @endif

  @if (session()->has('coupon_active')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('coupon_active') }}',
    })
  </script>
  @endif

@endsection
