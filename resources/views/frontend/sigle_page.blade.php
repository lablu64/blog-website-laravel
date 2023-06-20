

@section('title_post')

{{ $product->slug }}



    
@endsection

@include('frontend.includes.header')
   
  <body>
    

    <div class="wrap">

   
    @include('frontend.includes.navbar')
   

<section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">
         
                       

          <div class="col-md-12 col-lg-8 main-content">
                      <img style=" height:536px; width:800px;" src="{{ asset('public/'.$product->photo) }}" alt="" class="img-fluid mb-5">
                      <div class="post-meta">
                                <a class="category mb-5" href="#">{{ $product->category->category_name }} </a>
                                  <span class="mr-2">{{ date('d M Y h:mA',strtotime($product->created_at ))}}</span>
                                
                                </div>
                      <h1 class="mb-4">{{ $product->product_name }}</h1>
                                        
                      <div class="post-content-body">{!! $product->long_des !!}</div>

      
          </div>

      
          <!-- END main-content -->
         
           @include('frontend.includes.sidebar')
   
          
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          @php
            $reletade_product = App\Models\Admin\Product::where('category_id',$product->category_id)->latest()->take(3)->get();
          @endphp
         
         @foreach ($reletade_product as $item )
          <div class="col-md-6 col-lg-4">
            <a href="{{ route('productdetails',$item->slug) }}" class="a-block sm d-flex align-items-center height-md" style="background-image: url({{ asset('public/'.$item->photo) }}); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">{{ $item->category->category_name }}</span>
                  <span class="mr-2">{{ date('d M Y',strtotime($item->created_at ))}}</span> &bullet;
                 </div>
                <h3>{{ $item->product_name }}</h3>
              </div>
            </a>
          </div>
          @endforeach
          
         
          
        </div>
      </div>


    </section>
    <!-- END section -->

             
          

      
    
    
      @include('frontend.includes.footer')
   
      <!-- END footer -->

    </div>
    
    <!-- loader -->
   
      @include('frontend.includes.script')
   
  
  </body>
</html>