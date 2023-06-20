@extends('admin.layouts.index')
@section('title_admin')
All Product Show 
@endsection

@section('content')  
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Post </h4>
    <a class="btn btn-success mb-2" href="{{ route('admin.post.create') }}"> Create Post</a>
   
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">All Post List  </h5>
      @if(session('message'))
      <h6 class="alert alert-success">
          {{ session('message') }}
      </h6>
     @endif
       <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Post Name</th>
    
              <th> Cateogry name</th>
              <th>Image</th>
              
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            {{-- @php
            //get the serial number of pagination
            public static function paginateSerial($data)
            {
                 return $data->perPage() * ($data->currentPage() - 1);
            }
            @endphp

            @php
            $serial = paginateSerial($categories); //get the start integer
            @endphp --}}
           @php
              $i = $products->perPage() * ($products->currentPage() - 1);
           @endphp
            @foreach ($products as $product )
        
            
                <tr>
                  <td >{{$i+ $loop->index+1}}</td>
                  
                  
                    <td> <i class="fab fa-angular fa-lg text-danger me-3"></i>{{ Str::limit(strip_tags($product->product_name ), 40)}}</td>
                
                 
                    <td> <i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $product->category->category_name	 }}</td>
                    <td><img height="50px;" src="{{ asset('public/'.$product->photo) }}" alt=""></td>
                   <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.post.edit',$product->id) }}"
                              ><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <form action="{{ route('admin.post.destroy',$product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="dropdown-item " ><i class="bx bx-trash me-2"></i> Delete</button>
                              </form>
                            
                          </div>
                        </div>
                      </td>                
                  </tr>
                   
              
            
            @endforeach
          
           
          </tbody>
        </table>
        {{ $products->links('vendor.pagination.custom')}}
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    
    <!--/ Responsive Table -->
  </div>
  <!-- / Content -->
@endsection