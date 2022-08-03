@extends('admin.layout.app')

@section('content')

        <!-- Content Start -->
        <div class="content">
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
                            <!-- <a href="#" class="dropdown-item">Logout</a> -->
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

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                    <h5>History Hasil Pengecekan </h5><br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Jawaban</th>
                                    <th>Karir</th>
                                    <th>Tanggal Identifikasi</th>
                                    <th>Hasil Identifikasi</th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse($historys as $history)
                            <tr>
                                <td>{{$history->nama}}</td>
                                <td>{{$history->tanggal_lahir}}</td>
                                <td>{{$history->pekerjaan}}</td>
                                <td>{{$history->no_telp}}</td>
                                <td>{{$history->alamat}}</td>
                                <td>@foreach(explode('[', $history->identifikasi_id) as $identifikasi)
                                        @foreach(explode(']', $identifikasi) as $data) 
                                            {{$data}}
                                        @endforeach
                                @endforeach</td>
                                <td>@foreach(explode('[', $history->karir) as $karir)
                                        @foreach(explode(']', $karir) as $data) 
                                            {{$data}}
                                        @endforeach
                                @endforeach</td>
                                <td>{{$history->tanggal}}</td>
                                <td>{{$history->hasil}}</td>
                            </tr>
                            @empty
                        <tr>
                            <td class="text-center text-mute" colspan="8">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table><br>
                    </div>
                </div>
            </div>
            <script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
            <!-- Recent Sales End -->

            @endsection
