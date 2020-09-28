@extends('admin.admin_master')

@section('orders_complete') active @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Orders</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-12">
          
                  <div class="card">
                    <div class="card-header bg-dark text-light">
                     Complete Orders List
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mg-b-0">
                          <thead class="bg-primary">
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Customer Name</th>
                              <th class="text-center">Order Total</th>                     
                              <th class="text-center">Payment Method</th>
                              <th class="text-center">Transaction No</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody  class="text-center">
                            @foreach ( $orders as $item)                                                       
                            <tr>                            
                              <td>{{ $loop->iteration }}</td>                         
                              <td>{{ $item->userr->name }}</td>                         
                              <td>{{ $item->order_total }} tk</td>                         
                              <td>{{ $item->payment->payment_method }}</td>
                              @if ($item->payment->payment_method == 'Cashon')
                                <td>N/A</td>
                              @else
                                <td>{{ $item->payment->transaction_no }}</td>
                              @endif         
                                                             
                              <td>
                               <a href="{{ url('admin/orders/view/'.$item->id) }}"> <button  class="btn btn-info fa fa-eye"> Show</button></a>
                               <a href="{{ url('admin/orders/incomplete/'.$item->id) }}"> <button class="btn btn-danger fa fa-times"> Incomplete Order</button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      {{  $orders->links() }}
                      </div>
                    </div>
                  </div>
            </div>
                 
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('scripts')

  @if (session()->has('success')) 
  <script>
    Toast.fire({
      icon: 'success',
      background: '#ecf0f1',
      title: '{{ session('success') }}',
    })
  </script>
  @endif
 
@endsection
