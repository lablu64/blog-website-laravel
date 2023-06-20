<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
  @include('admin.includes.header')
</head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('admin.includes.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         @include('admin.includes.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>
    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('public/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('public/admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('public/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('public/admin/assets/js/dashboards-analytics.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    @stack('adminSubcategory');
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

   
<script type="text/javascript">
  $('.show-alert-delete-box').click(function(event){
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: "Are you sure you want to delete this record?",
          text: "",
          icon: "warning",
          type: "warning",
          buttons: ["Cancel","Yes!"],
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((willDelete) => {
          if (willDelete) {
              form.submit();
          }
      });
  });
</script>
<script type="text/javascript">
 
  $('.delete-comform').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       var link=$(this).attr("href");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete ?`,
           text: "",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
          window.location.href=link;
         }else{
         swal("No  Data ! ");

          }
       });
   });

</script>
   
   
   
   {{-- <script>
       @if(Session::has('message'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.warning("{{ session('warning') }}");
            @endif
    </script> --}}

    <script>
      $(document).ready(function() {
          $('#summernote').summernote({
            height:400,
          });
      });
    </script>
  </body>
</html>
