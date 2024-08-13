<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login - Ma'had Admin</title>
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

    <body class="bg-login">
        <!-- wrapper -->
        <div class="wrapper">
            <div class="section-authentication-login d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card radius-15 overflow-hidden">
                            <div class="row g-0">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="{{Asset('Admin/images/logo.png')}}" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                    </div>
                                    <div class="">
                                        <div class="form-body">
                                            <form action="/loginauth" method="POST" class="row g-3">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="username" class="form-control" placeholder="Username"
                                                        @if (Cookie::has('adminuser'))
                                                        value="{{ Cookie::get('adminuser') }}" @endif name="username"
                                                        id="username" autofocus required value="{{ old('username') }}"
                                                        required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Enter
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" @if (Cookie::has('adminpwd'))
                                                            value="{{ Cookie::get('adminpwd') }}" @endif
                                                            class="form-control border-end-0" name="password"
                                                            id="password" placeholder="Enter Password" required>
                                                        <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-first">
                                                    <input id="remember_token" @if (Cookie::has('adminuser')) checked
                                                        @endif name="remember" type="checkbox" checked>
                                                    <label for="remember_token"> Remember Me</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <a href="/forgot-password">Forgot Password?</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- end wrapper -->
    </body>

    <!--plugins-->
    <script src="{{ Asset('Admin/js/jquery.min.js') }}"></script>
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