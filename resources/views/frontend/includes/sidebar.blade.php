


<div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              <!-- <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="images/person_1.jpg" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>David Craig</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                    <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div> -->
              <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    @php
                    $products = App\Models\Admin\Product::latest()->take(5)->get();
                  @endphp
                  @foreach ($products as $item )
                   
                    <li>
                      <a href="{{ route('productdetails',$item->slug) }}">
                        <img src="{{ asset('public/'.$item->photo )}}" alt="{{ $item->product_name }}" class="mr-4">
                        <div class="text">
                          <h4>{{ $item->product_name }}</h4>
                          <div class="post-meta">
                            <span class="mr-2">{{ date('d M Y h:mA',strtotime($item->created_at ))}}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                     @endforeach
          
          
                   
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  @php
                      $categories = App\Models\Admin\Category::where('status','active')->get();
                    @endphp
                    @foreach ($categories as $item )
                 <li><a href="{{ route('categorytDetails',$item->slug) }}"> {{ $item->category_name }}</a></li>
                   @endforeach 
                        
                                             
                 
                
                </ul>
              </div>
              <!-- END sidebar-box -->

              
            </div>