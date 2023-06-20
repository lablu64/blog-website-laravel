@section('title_post')

{{ $category->category_name }}
@endsection

@include('frontend.includes.header')
  <body>
    

    <div class="wrap">





<section class="site-section pt-5">
      <div class="container">
        <div  class="row mb-4">
          <div style="background-color:#dbd8d8; height:150px; " class="col-md-12">   
          
            <h2 style="text-align:center; padding:50px 60px;" class="mb-4 ">Category : {{ $category->category_name }} </h2>
          
        
          
          
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">

              <div class="col-md-12">
               
             
               @foreach ( $product as $item)
                 
            
                <div class="post-entry-horzontal">
                  <a href="{{ route('productdetails',$item->id) }}">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{ asset('public/'.$item->photo) }});"></div>
                    <span class="text">
                      <div class="post-meta">
                      <span class="mr-2">{{ $item->category->category_name }}</span> &bullet;
                       
                         <span class="mr-2">{{ date('d M Y h:mA',strtotime($item->created_at ))}}</span>
                       
                      </div>
                      <h2>{{ $item->product_name }}</h2>
                    </span>
                  </a>
                </div>
                @endforeach
           
                <!-- END post -->
                {{ $product->links('vendor.pagination.custom')}}

              </div>
            </div>

           
         
            

          </div>

          <!-- END main-content -->
        
          
          <!-- END sidebar -->
        
           @include('frontend.includes.sidebar')
   
         

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

 


   
