<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <title>Sistem Pakar Penyakit Kambing | Daftar</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
        <link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/style_register.css') }} ">
        <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	</head>
	<body>
		<div id="particles-js">
            <div class="loginBox">
                <img src=" {{ asset('assets/images/logo.png') }} " class="user">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block" style="font-size:13px;">
                        
                        <strong>Perhatian:</strong> <i>{{ $message }}</i>
                    </div>
                    @else
                    <h3>Halaman Pendaftaran User</h3>
                    <p style="text-align:center; margin-bottom:20px;">Sistem Informasi Diagnosa Penyakit Kambing Perah Anglo Nubian</p>
                @endif
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <p>Email</p>
                    <input type="email" name="email" placeholder="masukan email">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="••••••">

                    <button type="submit" name="submit" style="margin-bottom:10px;r"><i class="fa fa-sign-in"></i>&nbsp; Login</button>

                    <a style="font-weight:200; font-size:12px; font-style:italic;">sudah memiliki akun?</a>
                    <a href="{{ route('login') }}" style="font-weight:200;font-size:12px !important; font-style:italic; color:wheat">Login Disini</a>
                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript" src=" {{ asset('assets/particles/particles.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('assets/particles/app.js') }} "></script>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</html>
