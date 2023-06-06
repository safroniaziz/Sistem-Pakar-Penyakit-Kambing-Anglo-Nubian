@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;DASHBOARD
@endsection
@section('user-login')
    @if (Auth::check())
        {{ Auth::user()->nama_pengguna }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
        {{ Auth::user()->nama_pengguna }}
    @endif
@endsection
@section('login_as')
    Halaman Administrator
@endsection
@section('content-title')
    Dashboard
    <small>E-Learning Universitas Bengkulu</small>
@endsection
@section('')
    <li><a href="#"><i class="fa fa-home"></i> E-Learning</a></li>
    <li class="active">Dashboard</li>
@endsection
@section('sidebar-menu')
    @include('backend/sidebar')
@endsection
@section('user')
    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <i class="fa fa-user"></i>&nbsp;
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          {{-- <span class="hidden-xs">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</span> --}}
        </a>
    </li>
    <li>
        <a href="{{ route('logout') }}" class="btn btn-danger"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp; Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
@endsection
@push('styles')
    <style>
        #chartdiv {
            width: 90%;
            height: 500px;
        }
    </style>
    <style>
        .preloader {    position: fixed;    top: 0;    left: 0;    right: 0;    bottom: 0;    background-color: #ffffff;    z-index: 99999;    height: 100%;    width: 100%;    overflow: hidden !important;}.do-loader{    width: 200px;    height: 200px;    position: absolute;    left: 50%;    top: 50%;    margin: 0 auto;    -webkit-border-radius: 100%;       -moz-border-radius: 100%;         -o-border-radius: 100%;            border-radius: 100%;    background-image: url({{ asset('assets/images/logo.png') }});    background-size: 80% !important;    background-repeat: no-repeat;    background-position: center;    -webkit-background-size: cover;            background-size: cover;    -webkit-transform: translate(-50%,-50%);       -moz-transform: translate(-50%,-50%);        -ms-transform: translate(-50%,-50%);         -o-transform: translate(-50%,-50%);            transform: translate(-50%,-50%);}.do-loader:before {    content: "";    display: block;    position: absolute;    left: -6px;    top: -6px;    height: calc(100% + 12px);    width: calc(100% + 12px);    border-top: 1px solid #07A8D8;    border-left: 1px solid transparent;    border-bottom: 1px solid transparent;    border-right: 1px solid transparent;    border-radius: 100%;    -webkit-animation: spinning 0.750s infinite linear;       -moz-animation: spinning 0.750s infinite linear;         -o-animation: spinning 0.750s infinite linear;            animation: spinning 0.750s infinite linear;}@-webkit-keyframes spinning {   from {-webkit-transform: rotate(0deg);}   to {-webkit-transform: rotate(359deg);}}@-moz-keyframes spinning {   from {-moz-transform: rotate(0deg);}   to {-moz-transform: rotate(359deg);}}@-o-keyframes spinning {   from {-o-transform: rotate(0deg);}   to {-o-transform: rotate(359deg);}}@keyframes spinning {   from {transform: rotate(0deg);}   to {transform: rotate(359deg);}}
    </style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-pdf-o"></i>&nbsp;Manajemen Data Pengguna</h3>
            <div class="pull-right">
                <button type="button" class="btn btn-primary btn-sm btn-flat " data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp;Tambah Data
                </button>
            </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Berhasil :</strong>{{ $message }}
                            </div>
                            @elseif ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Gagal :</strong>{{ $message }}
                                </div>
                        @endif
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-bordered" id="table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pengguna</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
    
                            <tbody>
                                @foreach ($penggunas as $index   =>  $pengguna)
                                @php
                                    if ($pengguna->video != null && $pengguna->video != "") {
                                        $url2 = "https://www.youtube.com/watch?v=".$pengguna->video;
                                    }
                                @endphp
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>KP{{ $pengguna->kode_pengguna }}</td>
                                        <td>{!! $pengguna->nama_pengguna !!}</td>
                                        <td>{!! $pengguna->email !!}</td>
                                        <td>
                                            @if ($pengguna->jenis_kelamin == "L")
                                                <small class="label label-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</small>
                                            @else
                                                <small class="label label-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</small>
                                            @endif
                                        </td>
                                        <td>{!! $pengguna->pekerjaan !!}</td>
                                        <td>{!! $pengguna->alamat !!}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a onclick="editData({{ $pengguna->kode_pengguna }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('pengguna.delete',[$pengguna->kode_pengguna]) }}" method="POST">
                                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('pengguna.post') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }} {{ method_field('POST') }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Tambah Data Pengguna</b></p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Nama Pengguna</label>
                                                    <input type="text" name="nama_pengguna" class="form-control" required> 
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" class="form-control">
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
                                                    <label for="">Pekerjaan</label>
                                                    <input type="text" name="pekerjaan" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Alamat</label>
                                                    <textarea name="alamat" class="form-control" id="" cols="30" rows="3"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Password Login</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('pengguna.update') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Edit Data Pengguna</b></p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group col-md-12">
                                            <label for="">Nama Pengguna</label>
                                            <input type="text" name="nama_pengguna" id="nama_pengguna_edit" class="form-control" required> 
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email_edit" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin_edit">
                                                <option disabled selected>-- pilih jenis kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" id="pekerjaan_edit" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Alamat</label>
                                            <textarea name="alamat" id="alamat_edit" class="form-control" id="" cols="30" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Password Login</label>
                                            <input type="password" name="password_edit" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                    <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        function editData(kode_pengguna){
            $.ajax({
                url: "{{ url('data_pengguna/') }}"+'/'+ kode_pengguna + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-update').modal('show');
                    $('#id').val(data.kode_pengguna);
                    $('#nama_pengguna_edit').val(data.nama_pengguna);
                    $('#email_edit').val(data.email);
                    $('#jenis_kelamin_edit').val(data.jenis_kelamin);
                    $('#pekerjaan_edit').val(data.pekerjaan);
                    $('#alamat_edit').val(data.alamat);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>
@endpush