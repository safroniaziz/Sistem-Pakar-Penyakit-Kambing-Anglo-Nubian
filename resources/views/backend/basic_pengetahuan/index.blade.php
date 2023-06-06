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
                <h3 class="box-title"><i class="fa fa-file-pdf-o"></i>&nbsp;Manajemen Data Basic Pengetahuan</h3>
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
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th>Nama Gejala</th>
                                    <th>Nilai MB</th>
                                    <th>Nilai MD</th>
                                    <th>Aksi</th>
                                </tr>
    
                            <tbody>
                                @foreach ($basicPengetahuans as $index   =>  $basicPengetahuan)
                                @php
                                    if ($basicPengetahuan->video != null && $basicPengetahuan->video != "") {
                                        $url2 = "https://www.youtube.com/watch?v=".$basicPengetahuan->video;
                                    }
                                @endphp
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $basicPengetahuan->penyakit->kode_penyakit }}</td>
                                        <td>{{ $basicPengetahuan->penyakit->nama_penyakit }}</td>
                                        <td>{{ $basicPengetahuan->gejala->nama_gejala }}</td>
                                        <td>{{ $basicPengetahuan->mb }}</td>
                                        <td>{{ $basicPengetahuan->md }}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a onclick="editData({{ $basicPengetahuan->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('basic_pengetahuan.delete',[$basicPengetahuan->id]) }}" method="POST">
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
                                    <form action="{{ route('basic_pengetahuan.post') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }} {{ method_field('POST') }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Tambah Data Basic Pengetahuan</b></p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Nama Penyakit</label>
                                                    <select name="penyakit_id" class="form-control" id="penyakit_id">
                                                        <option disabled selected>-- pilih penyakit --</option>
                                                        @foreach ($penyakits as $penyakit)
                                                            <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->nama_penyakit }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Nama Gejala</label>
                                                    <select name="gejala_id" class="form-control" id="gejala_id">
                                                        <option disabled selected>-- pilih gejala --</option>
                                                        @foreach ($gejalas as $gejala)
                                                            <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Nilai MB</label>
                                                    <select name="nilai_mb" class="form-control" id="nilai_mb">
                                                        <option disabled selected>-- pilih nilai md --</option>
                                                        <option value="0.1">0.1</option>
                                                        <option value="0.15">0.15</option>
                                                        <option value="0.2">0.2</option>
                                                        <option value="0.25">0.25</option>
                                                        <option value="0.3">0.3</option>
                                                        <option value="0.35">0.35</option>
                                                        <option value="0.4">0.4</option>
                                                        <option value="0.45">0.45</option>
                                                        <option value="0.5">0.5</option>
                                                        <option value="0.55">0.55</option>
                                                        <option value="0.6">0.6</option>
                                                        <option value="0.65">0.65</option>
                                                        <option value="0.7">0.7</option>
                                                        <option value="0.75">0.75</option>
                                                        <option value="0.8">0.8</option>
                                                        <option value="0.85">0.85</option>
                                                        <option value="0.9">0.9</option>
                                                        <option value="0.95">0.95</option>
                                                        <option value="1">1</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Nilai MD</label>
                                                    <select name="nilai_md" class="form-control" id="nilai_md">
                                                        <option disabled selected>-- pilih nilai md --</option>
                                                        <option value="0">0</option>
                                                        <option value="0.01">0.01</option>
                                                        <option value="0.02">0.02</option>
                                                        <option value="0.03">0.03</option>
                                                        <option value="0.04">0.04</option>
                                                        <option value="0.05">0.05</option>
                                                        <option value="0.06">0.06</option>
                                                        <option value="0.07">0.07</option>
                                                        <option value="0.08">0.08</option>
                                                        <option value="0.09">0.09</option>
                                                    </select>
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
                            <form action="{{ route('basic_pengetahuan.update') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Edit Data Basic Pengetahuan</b></p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group col-md-12">
                                            <label for="">Nama Penyakit</label>
                                            <select name="penyakit_id" class="form-control" id="penyakit_id_edit">
                                                <option disabled selected>-- pilih penyakit --</option>
                                                @foreach ($penyakits as $penyakit)
                                                    <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Nama Gejala</label>
                                            <select name="gejala_id" class="form-control" id="gejala_id_edit">
                                                <option disabled selected>-- pilih gejala --</option>
                                                @foreach ($gejalas as $gejala)
                                                    <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Nilai MB</label>
                                            <select name="nilai_mb" class="form-control" id="nilai_mb_edit">
                                                <option disabled selected>-- pilih nilai md --</option>
                                                <option value="0.1">0.1</option>
                                                <option value="0.15">0.15</option>
                                                <option value="0.2">0.2</option>
                                                <option value="0.25">0.25</option>
                                                <option value="0.3">0.3</option>
                                                <option value="0.35">0.35</option>
                                                <option value="0.4">0.4</option>
                                                <option value="0.45">0.45</option>
                                                <option value="0.5">0.5</option>
                                                <option value="0.55">0.55</option>
                                                <option value="0.6">0.6</option>
                                                <option value="0.65">0.65</option>
                                                <option value="0.7">0.7</option>
                                                <option value="0.75">0.75</option>
                                                <option value="0.8">0.8</option>
                                                <option value="0.85">0.85</option>
                                                <option value="0.9">0.9</option>
                                                <option value="0.95">0.95</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Nilai MD</label>
                                            <select name="nilai_md" class="form-control" id="nilai_md_edit">
                                                <option disabled selected>-- pilih nilai md --</option>
                                                <option value="0">0</option>
                                                <option value="0.01">0.01</option>
                                                <option value="0.02">0.02</option>
                                                <option value="0.03">0.03</option>
                                                <option value="0.04">0.04</option>
                                                <option value="0.05">0.05</option>
                                                <option value="0.06">0.06</option>
                                                <option value="0.07">0.07</option>
                                                <option value="0.08">0.08</option>
                                                <option value="0.09">0.09</option>
                                            </select>
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

        function editData(id){
            $.ajax({
                url: "{{ url('basic_pengetahuan/') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-update').modal('show');
                    $('#id').val(data.id);
                    $('#penyakit_id_edit').val(data.kode_penyakit);
                    $('#gejala_id_edit').val(data.kode_gejala);
                    $('#nilai_mb_edit').val(data.mb);
                    $('#nilai_md_edit').val(data.md);
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