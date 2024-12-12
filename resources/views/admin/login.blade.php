@include('admin.feature.head')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Admin!</h1>
                                    </div>
                                    <span>{{$message??""}}</span>
                                    <form class="user" action="/admin/login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="usernameInput" name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="passwordInput" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a id="loginBtn" class="btn btn-primary btn-user btn-block">
                                            Login                                     </a>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('admin.feature.script')
    <script>
        function login(){
            $("#loginBtn")[0].disabled = true;
            $.ajax({
                url : "/admin/login",
                method : "POST",
                data : {    
                    _token : $('input[name="_token"]')[0].value,
                    username : $("#usernameInput")[0].value,
                    password : $("#passwordInput")[0].value
                },
                success : (res)=>{
                    Swal.fire({
                        title: 'Login',
                        text: res.message,
                        icon: res.status == 200 ? 'success' : 'error',
                        confirmButtonText: 'Ya'
                    })
                    $("#loginBtn")[0].disabled = false;

                },
                error : (res)=>{
                    $("#loginBtn")[0].disabled = false;

                }
            }).done((res)=>{
               
            });
        }

        $("#loginBtn")[0].addEventListener('click', (e)=>{
            e.preventDefault();
            login();
        });
    </script>
</body>

</html>