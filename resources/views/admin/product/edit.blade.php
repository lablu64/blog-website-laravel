@extends('admin.layouts.index')
@section('title_admin')
Edit Product
@endsection

@section('content')  
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Post /</span> Edit</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
          <!-- Basic Layout -->
          <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Post </h5>
                <small class="text-muted float-end">input infromation </small>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.post.update',$product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="mb-3">
                    <label class="form-label" for="product_name">Post Name</label>
                    <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control" id="product_name" />
                  </div>
    
                   <div class="mb-3">
                    <label class="form-label" for="category">Category</label>
                    <select name="category_id"  class="form-control"  id="category">
                        <option value="">Select Category</option>
                        @foreach ($category as $item)
                        <option {{ $product->category_id == $item->id? 'selected':''  }} value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                  </div>
    
                 
    
                  {{-- <div class="row">
                    <div class="col-md-3">
                        <label class="form-label" for="photo">Photo</label>
                        <img width="120" height="80" src="{{ asset('uploads')}}" alt="">
                        <input type="hidden" name="old_photo" value="{{ $product->photo }}">
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label" for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo" />
                          </div>
                    </div>
                  </div> --}}
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name"> Old Image</label>
                    <div class="col-sm-10">
                    <img height="100px;" src="{{ asset($product->photo) }}" alt="">
                    <input type="hidden" name="old_photo" value="{{ $product->photo }}">
                  </div>
                  </div>
                 <input type="hidden" value="{{ $product->id }}" name="id">
                  
                  <div class="mb-3">
                    <label for="formFile" class="form-label"> New Upload  Image</label>
                    <input class="form-control" type="file" name="photo" id="photo" />
                  </div>
    
    
                  <div class="mb-3">
                    <label class="form-label" for="long_des">Description</label>
                    <textarea name="long_des"   class="form-control" id="summernote" cols="30" rows="10">{{ $product->long_des }}</textarea>
                  
                  </div>
    
                 
    
                  
    
              
                <button type="submit" class="btn btn-success">Update Post</button>
              </form>
              </div>
            </div>
          </div>
        
        </div>
      </div>
      <!-- / Content -->

@endsection