<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <title>Sistem Pakar Penyakit Ayam KUB | Login</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('css/style_login.css') }} ">
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
                    <h3>Halaman Login</h3>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            {{ $message }}
                        </div>
                    @else
                        <p style="text-align:center; margin-bottom:20px;">Sistem Informasi Diagnosa Penyakit Ayam KUB Anglo Nubian</p>
                    @endif
                @endif
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <p>Email</p>
                    <input type="email" name="email" placeholder="masukan email">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="••••••">

                    <button type="submit" name="submit" style="margin-bottom:10px;"><i class="fa fa-sign-in"></i>&nbsp; Login</button>

                    <a style="font-weight:200; font-size:12px; cursor:pointer;">Belum memiliki akun?</a>
                    <a style="font-weight:200; font-size:12px; font-style:italic; cursor:pointer; color:wheat" data-toggle="modal" data-target="#exampleModal">
                        Login Disini
                    </a>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('register.post') }}" method="POST">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Form Pendaftaran User
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label for="">Nama User</label>
                                <input type="text" name="nama_pengguna" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="">
                                    <option disabled selected>-- pilih jenis kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">ALamat</label>
                                <input type="alamat" name="alamat" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Pekerjaan</label>
                                <input type="pekerjaan" name="pekerjaan" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; <i>Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('assets/particles/particles.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('assets/particles/app.js') }} "></script>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</html>
