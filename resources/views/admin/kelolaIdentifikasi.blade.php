@extends('admin.layout.app')

@section('content')

<!-- Content Start -->
<div class="content">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
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
                    <span class="d-none d-lg-inline-flex">{{$user->username}}</span>
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
    <!-- Navbar End -->


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light  d-flex p-4 ">
                    <i class="fa fa-chart-line fa-3x text-primary" style="margin-left:20%"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="text-align:center;">Pengecekan Harian</p>
                        <h6 class="mb-0 font-weight-bolder" style="text-align:center;">{{$harian}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex p-4">
                    <i class="fa fa-chart-area fa-3x text-primary" style="margin-left:20%"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="text-align:center">Total Pengecekan</p>
                        <h6 class="mb-0 font-weight-bolder" style="text-align:center">{{$all}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary" style="margin-left:10%"></i>
                    <div class="ms-3">
                        <p class="mb-2">Pengecekan Bulan ini</p>
                        <h6 class="mb-0 font-weight-bolder" style="text-align:center">{{$bulanan}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->



    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="bg-light text-center rounded p-4">
            <h4>Kelola Data Identifikasi Kepribadian</h4>
            <div class="mb-4" style="text-align:right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a href="{{url('createKepribadian')}}" style="color:white">
                        <i class="fa fa-plus-circle " aria-hidden="true">Tambah</i>
                    </a>
                </button>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Dominance</th>
                            <th>Influence</th>
                            <th>Steadiness</th>
                            <th>Compliance</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($identifikasis as $identifikasi)
                        <tr>
                            <td>{{$identifikasi->dominance}}</td>
                            <td>{{$identifikasi->influence}}</td>
                            <td>{{$identifikasi->steadiness}}</td>
                            <td>{{$identifikasi->compliance}}</td>
                            <td width="90px">
                                <a href="/kelolaKepribadian/edit/{{$identifikasi->id}}">
                                    <button class="" style="border:none; color:blue; background:none"><i
                                            class="fa fa-edit" aria-hidden="true"></i></button>
                                </a>
                                <form action="/kelolaKepribadian/delete/{{$identifikasi->id}}" method="post"
                                    class="d-inline">
                                    <!-- @method('delete') -->
                                    @csrf
                                    <button class="" style="color:blue;border:none;background:none"
                                        onclick="return confrim('Are you sure?')"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center text-mute" colspan="5">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>

    <!-- Recent Sales End -->

    @endsection