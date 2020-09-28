@extends('admin.admin_master')

@section('category') active @endsection

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-8">
          
                  <div class="card">
                    <div class="card-header bg-dark text-light">
                      Category List
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mg-b-0">
                          <thead class="bg-primary">
                            <tr>
                              <th>#</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $category as $item)                                                       
                            <tr>                            
                              <td>{{ $loop->iteration }}</td>                         
                              <td>{{ $item->category_name }}</td>                         
                              <td>
                              @if ($item->status == 1)
                                <span class="badge badge-success">Active</span>                             
                              @else
                              <span class="badge badge-danger">Inactive  </span>      
                              @endif
                              </td>
                              <td>
                                @if ($item->status == 1)
                                <a href="{{ url('admin/category/inactive/'.$item->id) }}"> <button class="btn btn-warning fa fa-arrow-down"></button></a>
                                @else
                                <a href="{{ url('admin/category/active/'.$item->id) }}"> <button class="btn btn-success fa fa-arrow-up"></button></a>
                                @endif
                               <a href="{{ url('admin/category/edit/'.$item->id) }}"> <button  class="btn btn-info fa fa-edit"></button></a>
                               <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('admin/category/delete/'.$item->id) }}"> <button class="btn btn-danger fa fa-trash"></button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      {{  $category->links() }}
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Add Category
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.category.add') }}">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input name="category_name" type="text" class="form-control  @error('category_name') is-invalid @enderror" placeholder="Enter Category Name">
                      @error('category_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary" type="submit">Add Category</button>
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

  @if (session()->has('cat_inactive')) 
  <script>
    Toast.fire({
      icon: 'error',
      type: 'error',
      title: '{{ session('cat_inactive') }}',
    })
  </script>
  @endif

  @if (session()->has('cat_active')) 
  <script>
    Toast.fire({
      icon: 'success',
      type: 'success',
      title: '{{ session('cat_active') }}',
    })
  </script>
  @endif

@endsection
