<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ url('/home') }}" class="app-brand-link">
      
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ url('/home') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- category -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Category</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.category.create') }}" class="menu-link">
              <div data-i18n="Without menu"> Create Category</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.category.index') }}" class="menu-link">
              <div data-i18n="Without navbar">All category </div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.metadescription.edit',$metas=1) }}" class="menu-link">
              <div data-i18n="Without navbar">Meta deschip  </div>
            </a>
          </li>
          
        
         
        </ul>
      </li>
    {{-- product --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Post</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.post.create') }}" class="menu-link">
              <div data-i18n="Without menu"> Create Post</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.post.index') }}" class="menu-link">
              <div data-i18n="Without navbar">All Post </div>
            </a>
          </li>
          
        
         
        </ul>
      </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Authantication</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.change-password') }}" class="menu-link">
              <div data-i18n="Without menu"> Password Change </div>
            </a>
          </li>
         
        
         
        </ul>
      </li>

    </ul>
  </aside>