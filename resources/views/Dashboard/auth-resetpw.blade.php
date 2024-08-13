<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Reset Password - Ma'had Admin</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('Admin/images/logo.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('Admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('Admin/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/css/app.css') }}" />
  </head>

  <body class="bg-forgot">
    <div class="wrapper">
      <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card shadow-lg forgot-box" style="margin-top:20px">
          <div class="card-body p-5">
            <div class="text-center">
              <img src="{{ asset('Admin/images/icons/forgot-3.png') }}" width="100" alt="" />
            </div>
            <h4 class="mt-2 font-weight-bold" style="text-align: center">Reset Password</h4>
            <p class="text-muted" style="text-align: center">Masukkan password baru Anda</p>
            <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <input type="hidden" name="email" value="{{request()->email}}">
              {{-- <div class="mb-2">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control form-control-lg radius-30" id="email"
                  placeholder="Alamat Email" value="{{request()->email}}" required>
          </div> --}}
          <div class="mb-2">
            <label class="form-label">Password Baru</label>
            <div class="input-group" id="show_hide_password">
              <input type="password" name="password" class="form-control form-control-lg radius-30"
                id="inputChoosePassword" placeholder="Password baru" required>
              <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label">Konfirmasi Password</label>
            <div class="input-group" id="show_hide_password">
              <input type="password" name="password_confirmation" class="form-control form-control-lg radius-30"
                id="inputConfirmPassword" placeholder="Konfirmasi password baru" required>
              <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
            </div>
          </div>
          <div class="d-grid gap-2" style="padding-top:5px">
            <button type="submit" class="btn btn-success btn-lg radius-30">Change Password</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- end wrapper -->
  </body>
  <!--plugins-->
  <script src="{{ asset('Admin/js/jquery.min.js') }}"></script>
  <!-- Password show & hide js -->
  <script>
    $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
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

</html>