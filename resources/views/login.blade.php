<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Sistem Indentifikasi Kepribadian</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">


<body>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="text">
                    <h3>Sistem Identifikasi </h3>
                    <h3>Kepribadian</h3>
                </div>
            </div>
            <div class="right">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success')}}
                    </div>
                @endif
                <div >
                <a href="{{url('welcome')}}"><i class="fa fa-arrow-left fa-2x" style="color:268EEE;" ></i></a>
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError')}}
                    </div>
                @endif
                </div>
                <div class="contact">
                    <form action="/login" method="post">
                    <img class="w-100 position-relative " src="assets/images/logggo.png">
                        @csrf
                        <h3>Login</h3>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" autofocus value="{{old('email')}}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <button class="submit" >Login</button>
                        <p class="" style="text-align:right;">Belum mempunyai akun? <a href="{{url('register')}}" class="fw-bold text-body"><u>Daftar disini</u></a></p>
                        <!-- <a href="/register" class="submit2" style="width:60%;margin:left:100px;margin-top:10px;text-align:center">REGISTER</a> -->
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<style>
    .login {
        height: 100%;
        width: 100%;
        /* background: radial-gradient(#653d84, #332042); */

    }
    .login_box {
        width: 70%;
        height: 90%;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        border-radius: 10px;
        box-shadow: 1px 4px 22px -8px #0004;
        display: flex;
        overflow: hidden;
    }
    .login_box .right {
        width: 40%;
        height: 90%;
        background: #FFFFFF;
        border: 1px solid rgba(146, 235, 248, 0.75);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        padding: 25px 25px;
    }
    .login_box .left {
        width: 50%;
        height: 92%;
        background-repeat: no-repeat;
    }
    .right .top_link a {
        color: #452A5A;
        font-weight: 400;
    }
    .right .top_link {
        height: 20%
    }
    .right .contact {
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: center;
        height: 100%;
        width: 73%;
        margin: auto;
    }
    .right h3 {
        text-align: center;
        margin-bottom: 40px;
    }
    .right input {
        border: none;
        width: 80%;
        margin: 15px 0px;
        border-bottom: 1px solid #4f30677d;
        padding: 7px 9px;
        width: 100%;
        overflow: hidden;
        background: transparent;
        font-weight: 600;
        font-size: 14px;
    }
    .right {
        background: linear-gradient(-45deg, #dcd7e0, #fff);
        background-color:black;
        margin:20px 20px 20px 0px;
    }
    .submit {
        border: none;
        padding: 5% 10%;
        border-radius: 8px;
        display: block;
        margin: auto;
        margin-top: 5%;
        background: #268EEE;
        color: #fff;
        font-weight: bold;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    }
    /* .submit2 {
        padding: 10px 0px;
        border-radius: 8px;
        display: block;
        margin: auto;
        margin-top: 15%;
        background: #268EEE;
        color: #fff;
        font-weight: bold;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    } */
    .left {
        background: url(img/wal.jpg);
        background-repeat: no-repeat;
        margin:20px 20px 20px 20px;
        border-radius: 75px;
        color: #fff;
        text-align : right;
    }
    .left .text {
        margin-left:50%;
        position: relative;
        transform: translate(0%, 50%);
    }
    .text h3 {
        width: 100%;
        text-align: center;
        font-size: 22px;
        font-weight: 400;
    }

</style>
