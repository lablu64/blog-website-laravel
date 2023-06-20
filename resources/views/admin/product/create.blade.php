 @extends('admin.layouts.index')
 @section('title_admin')
 Create Product
@endsection

@section('content')      
       
       <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Post /</span> Create</h4>
  
                <!-- Basic Layout & Basic with Icons -->
                <div class="row">
                  <!-- Basic Layout -->
                  <div class="col-xxl">
                    <div class="card mb-4">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Create Post  </h5>
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <small class="text-muted float-end">input infromation </small>
                      </div>
                      <div class="card-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_name">Post  Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter the post name" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="category_id">Category Name</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="category_id" id="category_id">
                                <option value="0">category name</option>
                                @foreach ($category as $item )
                                <option value="{{ $item->id }}"> {{ $item->category_name }} </option> 
                                @endforeach
                               </select>
                            </div>
                          </div>


                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_name"> Description  </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="long_des" id="summernote" cols="30" rows="10"></textarea>
                            </div>
                          </div>

                       
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="photo">Image  </label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="photo" id="photo" placeholder=" stock " />
                            </div>
                          </div>

                    

              

                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">create Post </button>
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


@push('adminSubcategory')
<script>

$('#category_id').on('change', function () {
            var idCountry = this.value;
            $("#subcategory_id").html('');
            $.ajax({
                url: "{{url('admin/getSubcategory')}}",
                type: "POST",
                data: {
                    category_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#subcategory_id').html('<option value="">-- Select subcategory --</option>');
                    $.each(result.states, function (key, value) {
                      console.log(value);
                        $("#subcategory_id").append('<option value="' + value
                            .id + '">' + value.subcategory_name + '</option>');
                    });
                  }
            });
        });


  </script>
@endpush