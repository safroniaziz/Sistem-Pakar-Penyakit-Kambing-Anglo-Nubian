<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('artikel') }}">
    <a href="{{ route('artikel') }}">
        <i class="fa fa-file-pdf-o"></i> <span>Artikel Terkait</span>
    </a>
</li>

<li class="treeview {{ set_active(['penyakit','gejala','solusi','pengguna']) }}">
    <a href="#">
        <i class="fa fa-graduation-cap"></i> <span>Manajemen Data Master</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('penyakit') }}"><a href="{{ route('penyakit') }}"><i class="fa fa-laptop"></i>Data Penyakit</a></li>
        <li class="{{ set_active('gejala') }}"><a href="{{ route('gejala') }}"><i class="fa fa-television"></i>Data Gejala</a></li>
        <li class="{{ set_active('solusi') }}"><a href="{{ route('solusi') }}"><i class="fa fa-television"></i>Data Solusi</a></li>
        <li class="{{ set_active('pengguna') }}"><a href="{{ route('pengguna') }}"><i class="fa fa-television"></i>Data Pengguna</a></li>
    </ul>
</li>

<li class="{{ set_active('penanganan') }}">
    <a href="{{ route('penanganan') }}">
        <i class="fa fa-file-pdf-o"></i> <span>Penanganan Penyakit</span>
    </a>
</li>

<li class="{{ set_active('basic_pengetahuan') }}">
    <a href="{{ route('basic_pengetahuan') }}">
        <i class="fa fa-file-pdf-o"></i> <span>Basic Pengetahuan</span>
    </a>
</li>

<li style="padding-left:2px;">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i> <span>Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>
