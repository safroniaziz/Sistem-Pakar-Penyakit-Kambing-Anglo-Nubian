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
                <h3 class="box-title"><i class="fa fa-file-pdf-o"></i>&nbsp;Manajemen Data Artikel Terkait</h3>
            <div class="pull-right">
                <button type="button" class="btn btn-primary btn-sm btn-flat " data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp;Tambah Artikel
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
                                    <th>Judul Artikel</th>
                                    <th>Content</th>
                                    <th>Sumber</th>
                                    <th>Aksi</th>
                                </tr>
    
                            <tbody>
                                @foreach ($artikels as $index   =>  $artikel)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $artikel->judul }}</td>
                                        <td>{!! $artikel->content !!}</td>
                                        <td>{{ $artikel->sumber }}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a onclick="editArtikel({{ $artikel->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('artikel.delete',[$artikel->id]) }}" method="POST">
                                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
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
                                    <form action="{{ route('artikel.post') }}" method="POST">
                                        {{ csrf_field() }} {{ method_field('POST') }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Tambah Data Artikel</b></p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Judul Artikel</label>
                                                    <input type="text" name="judul" class="form-control" required> 
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Content</label>
                                                    <textarea name="content" class="form-control" id="" cols="30" rows="10" required></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Sumber Artikel</label>
                                                    <input type="text" name="sumber" class="form-control" required>
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
                            <form action="{{ route('artikel.update') }}" method="POST">
                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <p class="modal-title"><b><i class="fa fa-plus"></i>&nbsp;Edit Data Artikel</b></p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="">Judul Artikel</label>
                                            <input type="text" name="judul_edit" id="judul_edit" class="form-control" required> 
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Content</label>
                                            <textarea name="content_edit" id="content_edit" class="form-control" id="" cols="30" rows="10" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Sumber Artikel</label>
                                            <input type="text" name="sumber_edit" id="sumber_edit" class="form-control" required>
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
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'content' );
        CKEDITOR.replace( 'content_edit' );
    </script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        function editArtikel(id){
            $.ajax({
                url: "{{ url('artikel_terkait/') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-update').modal('show');
                    $('#id').val(data.id);
                    $('#judul_edit').val(data.judul);
                    // $('#content_edit').val(data.content);
                    $('#sumber_edit').val(data.sumber);
                    CKEDITOR.instances['content_edit'].setData(data.content);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }
    </script>
@endpush