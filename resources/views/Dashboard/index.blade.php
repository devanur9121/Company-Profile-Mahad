<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Dashboard - Ma'had Bahrul Huda</title>
    <!--favicon-->
    <link rel="icon" href="{{Asset('Admin/images/logo.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{Asset('Admin/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{Asset('Admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{Asset('Admin/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{Asset('Admin/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{Asset('Admin/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{Asset('Admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{Asset('Admin/css/icons.css')}}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{Asset('Admin/css/app.css')}}" />
    <link rel="stylesheet" href="{{Asset('Admin/css/dark-sidebar.css')}}" />
    <link rel="stylesheet" href="{{Asset('Admin/css/dark-theme.css')}}" />

    <!--Data Tables -->
    <link href="{{Asset('Admin/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
      type="text/css">
    <link href="{{Asset('Admin/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
  </head>

  <body>
    <!-- wrapper -->
    <div class="wrapper">
      <!--sidebar-wrapper-->
      @include('Dashboard.sidebar')
      <!--end sidebar-wrapper-->
      <!--header-->
      @include('Dashboard.header')
      <!--end header-->
      <!--page-wrapper-->
      <div class="page-wrapper">
        <!--page-content-wrapper-->
        @yield('content')
        <!--end page-content-wrapper-->
      </div>
      <!--end page-wrapper-->
      <!--start overlay-->
      <div class="overlay toggle-btn-mobile"></div>
      <!--end overlay-->
      <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
      <!--End Back To Top Button-->
      <!--footer -->
      <div class="footer">
        @include('Dashboard.footer')
      </div>
      <!-- end footer -->
    </div>
    <!-- end wrapper -->
    <!--start switcher-->
    @include('Dashboard.theme-variation')
    <!--end switcher-->
    <!-- JavaScript -->

    <!-- Bootstrap JS -->
    <script src="{{Asset('Admin/js/bootstrap.bundle.min.js')}}"></script>

    <!--plugins-->
    <script src="{{Asset('Admin/js/jquery.min.js')}}"></script>
    <script src="{{Asset('Admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{Asset('Admin/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{Asset('Admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!-- App JS -->
    <script src="{{Asset('Admin/js/app.js')}}"></script>
    <script>
      new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
    </script>

    <!--Data Tables js-->
    <script src="{{Asset('Admin/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script>
      $(document).ready(function() {
      var table = $('#example2').DataTable({
      lengthChange: true,
      pageLength: 5,
      lengthMenu: [5, 10, 25, 50],
      buttons: [{
              extend: 'copy',
              exportOptions: {
                columns: ':not(.no-export)'
              }
            },
            {
              extend: 'excel',
              exportOptions: {
                columns: ':not(.no-export)'
              }
            },
            {
              extend: 'pdf',
              exportOptions: {
                columns: ':not(.no-export)'
              }
            },
            {
              extend: 'print',
              exportOptions: {
                columns: ':not(.no-export)'
              }
            },
            'colvis'
          ]
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
    </script>
    <script>
      $(document).ready(function() {
        //Default data table
        var table = $('#example3').DataTable({
          lengthChange: true,
          pageLength: 5,
          lengthMenu: [5, 10, 25, 50],
        });
      });
    </script>
    <script src="{{ asset('Front/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
      tinymce.init({
        selector: 'textarea',  // Pilih elemen textarea yang ingin Anda konversi menjadi TinyMCE editor
        plugins: 'autoresize autolink lists fontsize lineheight',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | blockquote | fontsize | font | lineheight',
        menubar: false,
        statusbar: false,
        width: '100%',
        height: 300
      });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      @if(session('success'))
            Swal.fire({
                title: 'Sukses',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#b7d5ac',
                confirmButtonText: 'OK'
            });
        @endif
    
        // Setelah gagal menyimpan data
        @if(session('error'))
            Swal.fire({
                title: 'Gagal',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
  </body>

</html>