@extends('admin.layouts.index')

@section('title_admin')
All Show Category
@endsection

@section('content')  
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Category </h4>
    <a class="btn btn-success mb-2" href="{{ route('admin.category.create') }}"> Create Category</a>
   
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">All category </h5>
     
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
              <th>Cateogry name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">


          
            @foreach ($categories as $category )
              
                <tr>
                    <td>{{$loop->index+1 }}</td>
                    <td> <i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $category->category_name }}
                    <br>
              
                    </td>
                    <td class="badge bg-label-{{ $category->status == 'active'? 'primary':'danger' }} me-1">{{ $category->status }}</td>
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.category.edit',$category->id) }}"
                              ><i class="bx bx-edit-alt me-2"></i> Edit</a
                            >
                            <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="dropdown-item show-alert-delete-box" ><i class="bx bx-trash me-2"></i> Delete</button>
                            </form>
                           
                          </div>
                        </div>
                      </td>                
                  </tr>
                   
              
            
            @endforeach
          
           
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    
    <!--/ Responsive Table -->
  </div>
  <!-- / Content -->
@endsection