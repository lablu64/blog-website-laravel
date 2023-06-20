

  @include('frontend.includes.header')


  <body>
    

    <div class="wrap">

    
       
        @include('frontend.includes.navbar')
     

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                @php
                $products = App\Models\Admin\Product::latest()->paginate(10);
              @endphp
              @foreach ($products as $item )

                <div class="col-md-6">
                  <a href="{{ route('productdetails',$item->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img width="400px;" height="200px;" src="{{ asset('public/'.$item->photo) }}" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                      <span class="ml-2 category">{{ $item->category->category_name }} </span>
                        <span class="mr-2">{{ date('d M Y h:mA',strtotime($item->created_at ))}} </span> &bullet;
                   
                      </div>
                      <h2>{{ $item->product_name }}</h2>
                       <p>{!! Str::limit(strip_tags($item->long_des), 90) !!}</p>
                   
                    </div>
                  </a>
                </div>
                @endforeach
                                
                                  
            
              </div>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  {{ $products->links('vendor.pagination.custom')}}
                </div>
              </div>


             
             
            </div>

            <!-- END main-content -->

           
            @include('frontend.includes.sidebar')
         
            <!-- END sidebar -->

          </div>
        </div>
      </section>
    
      
        
        @include('frontend.includes.footer')
    
      <!-- END footer -->

    </div>
    
    <!-- loader -->
   
        @include('frontend.includes.script')
      
  
  </body>
</html>