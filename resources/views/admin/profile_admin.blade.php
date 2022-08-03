@extends('admin.layout.app')

@section('content')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand sticky-top px-4 py-0"   style="background: linear-gradient(to bottom, #D2D2D2 0%, #ffffff)";>
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href="/logout" class="dropdown-item">Logout</a> -->
                            <form role="form" action="/logout" method="post">
                                @csrf
                                <button class="submit btn btn-primary dropdown-item">
                                    <p style="color:blue"><a href="/profile_admin/{{$user->id}}">Profil</a></p>
                                </button>
                                <button class="submit btn btn-primary dropdown-item">
                                    <p style="color:blue">Logout</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

<!-- Content Start -->
<div class="content">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <!-- Navbar Start -->

    <div class="container" style="padding-top:20px">
  <div class="card kartu" style="padding:0px 0px 200px 100px">
  <div  style="text-align:center;padding:50px;">
    <h3>Data Diri</h3>
  </div>
    <div class="row">
      <div class="col-md-8 kertas-biodata"  >
        <div class="biodata">
        <table width="100%" border="0">
    <tbody><tr>
        <td valign="top">
        <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;">
          <tbody>
            <tr>
              <td width="25%" valign="top" class="textt">Nama</td>
                <td width="2%">:</td>
                <td>
                    <label for="" class="input-group-text">Medianto Saragih</label>
                </td>

            </tr>
          <tr>
              <td class="textt">Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <label for="" class="input-group-text">01 Mei 2000</label>
                </td>

            </tr>
          <tr>
              <td class="textt">Pekerjaan</td>
                <td>:</td>
                <td>
                    <label for="" class="input-group-text">Mahasiswa</label>
                </td>

            </tr>
          <tr>
              <td class="textt">Email</td>
                <td>:</td>
                <td>
                    <label for="" class="input-group-text">medianto@gmail.com</label>
                </td>

            </tr>
          <tr>
              <td class="textt">No Telepon</td>
                <td>:</td>
                <td>
                    <label for="" class="input-group-text">0812831238</label>
                </td>
            </tr>
          <tr>
              <td valign="top" class="textt">Password</td>
                <td valign="top">:</td>
                <td>
                    <label for="" class="input-group-text">123123</label>
                </td>
            </tr>
        </tbody></table>
        </td>
    </tr>
    </tbody></table>
  </div>
      </div>
      <div class="col-md-4">
      <div class="foto">
      <img src="assets/images/im.jpg" alt="Chain App Dev" style="width:200px;">
      </div>
      </div>
    </div>
  </div>
</div>
    <!-- Recent Sales End -->

    @endsection
