@extends('admin.admin_master')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm justify-content-center">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  Edit Category
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="{{ route('admin.category.update') }}">
                    @csrf
                    <div class="form-group">
                      <input hidden name="category_id" value="{{ $category_edit->id }}">
                      <label>Category Name</label>
                      <input value="{{ $category_edit->category_name }}" name="category_name" type="text" class="form-control  @error('category_name') is-invalid @enderror" placeholder="Enter Category Name">
                      @error('category_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary" type="submit">Update Category</button>
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
      type: 'success',
      title: 'Category Added Successfully!'
    })
  </script>
  @endif

@endsection
