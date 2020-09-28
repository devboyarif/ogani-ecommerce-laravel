@extends('admin.admin_master')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Order View</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm justify-content-center mb-5">

            <div class="col-sm-4">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Customer Details
                </div>
                <div class="card-body">
                  
                 <table class="table table-dark">
                     <thead>
                         <tr>
                            <td>Username</td>
                            <td>Mobile</td>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>{{ $order->userr->name }}</td>
                             <td>{{ $order->shipping->phone }}</td>
                         </tr>
                     </tbody>
                 </table>                 
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="card">
                <div class="card-header bg-dark text-light">
                 Shipping Details
                </div>
                <div class="card-body">
                  
                 <table class="table table-dark">
                     <thead>
                        <tr>
                            <td>Username</td>
                            <td>Address</td>
                            <td>Town</td>
                            <td>Country</td>
                            <td>Phone</td>
                        </tr>            
                     </thead>
                     <tbody>
                         <tr>
                             <td>{{ $order->shipping->fname }} {{ $order->shipping->lname }}</td>
                             <td>{{ $order->shipping->address }}</td>
                             <td>{{ $order->shipping->town }}</td>
                             <td>{{ $order->shipping->country }}</td>
                             <td>{{ $order->shipping->phone }}</td>
                         </tr>
                     </tbody>
                 </table>                 
                </div>
              </div>
            </div>

      </div>
        <div class="row row-sm justify-content-center mt-5">

            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Order Details
                </div>
                <div class="card-body">
                  
                 <table class="table table-dark">
                     <thead class="text-center">
                        <tr>
                            <td>Id</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Product Sales Quantity</td>
                            <td>Product Sub Total</td>
                        </tr>                 
                     </thead>
                     <tbody class="text-center">
                         @foreach ($order_details as $item)
                             
                         <tr>
                             <td>{{ $item->order_id }}</td>
                             <td>{{ $item->products->product_name }}</td>
                             <td>{{ $item->products->product_price }}</td>
                             <td>{{ $item->product_sales_quantity }}</td>
                             <td>{{ $item->product_sales_quantity*$item->products->product_price }}</td>                    
                        </tr>
                         @endforeach
                        </tbody>
                    </table>                 
                    <h4 class="float-right text-dark mr-5">Total: <span class="text-info font-weight-bold">{{ $order->order_total }} tk</span></h4>
                </div>
              </div>
            </div>


      </div>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('scripts')
{{-- 
  @if (session()->has('success')) 
  <script>
    Toast.fire({
      type: 'success',
      title: 'order Added Successfully!'
    })
  </script>
  @endif --}}

@endsection
