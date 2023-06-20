@extends('admin.layouts.index')
@section('title_admin')
Edit Meata Description
@endsection

@section('content')  
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Meta Description/</span></h4>
         
      @if(session('message'))
      <h6 class="alert alert-success">
          {{ session('message') }}
      </h6>
     @endif
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
          <!-- Basic Layout -->
          <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Meata Description </h5>
                <small class="text-muted float-end">input infromation </small>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.metadescription.update',$metas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="category_name">Meta Description </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="metades" id="category_name" value="{{ $metas->metades }}" />
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update Meta Description</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
        </div>
      </div>
      <!-- / Content -->

@endsection