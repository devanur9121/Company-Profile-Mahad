<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Forgot Password - Ma'had Admin</title>
        <!--favicon-->
        <link rel="icon" href="{{Asset('Admin/images/logo.png')}}" type="image/png" />
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
    </head>

    <body class="bg-forgot">
        <!-- wrapper -->
        <div class="wrapper">
            <div class="authentication-forgot d-flex align-items-center justify-content-center">
                <div class="card shadow-lg forgot-box">
                    <div class="card-body p-md-5">
                        <div class="text-center">
                            <img src="{{Asset('Admin/images/icons/forgot-3.png')}}" width="140" alt="" />
                        </div>
                        <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                        <p class="text-muted">Enter your registered email ID to reset the password</p>
                        <form method="POST" action="/forgot-password-send">
                            @csrf
                            <div class="mb-3 mt-4">
                                <label class="form-label">Email id</label>
                                <input type="text" name="email" class="form-control form-control-lg radius-30"
                                    placeholder="example@user.com" value="{{ old('email') }}" required autofocus />
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg radius-30">Send</button>
                                <a href="/login" class="btn btn-light radius-30"><i
                                        class='bx bx-arrow-back mr-1'></i>Back
                                    to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrapper -->
    </body>

</html>
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