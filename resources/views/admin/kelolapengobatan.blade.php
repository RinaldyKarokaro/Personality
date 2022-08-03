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


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light  d-flex p-4 ">
                    <i class="fa fa-chart-line fa-3x text-primary"  style="margin-left:20%"></i>
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
        @endif
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Kelola Pengobatan</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus-circle" aria-hidden="true">Tambah</i>
                </button>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Pengobatan</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengobatans as $pengobatan)
                        <tr>
                            <td>{{$pengobatan->nama_pengobatan}}</td>
                            <td>{{$pengobatan->kategori}}</td>
                            <td>{{$pengobatan->deskripsi}}</td>
                            <td>
                                <button type="button" id="edit" data-id="{!!$pengobatan->id !!}" class="badge bg-success edit">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <!-- <button href="/kelolapengobatan/update/{{$pengobatan->id}}" type="button"  class="badge bg-success"><span class="fa fa-edit"></span></button> -->
                                <!-- <a href="/kelolapengobatan/update/{{$pengobatan->id}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a> -->
                                <form action="/kelolapengobatan/delete/{{$pengobatan->id}}" method="post" class="d-inline">
                                    <!-- @method('delete') -->
                                    @csrf
                                    <button class="badge bg-danger" onclick="return confrim('Are you sure?')"><span class="fa fa-trash" data-feather="x-crircle"></span></button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/kelolapengobatan" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pengobatan</label>
                            <input type="text" class="form-control" id="nama_pengobatan" name="nama_pengobatan"
                                placeholder="Enter your Kode Pengobatan" />
                        </div>
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori</label>
                            <select name="kategori" required="" id="kategori" name="kategori" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Enter the deskription" />
                        </div>
                        <div class="modal-footer">
                            <button class="submit btn btn-primary">Save changes</button>
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/kelolapengobatan" method="post" id="editForm">

                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Nama Pengobatan</label>
                            <input type="text" class="form-control" id="nama_pengobatan" name="nama_pengobatan"
                            value="{{$pengobatan->nama_pengobatan}}" />
                        </div>
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori</label>
                            <select name="kategori" required="" id="kategori" name="kategori" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{$pengobatan->deskripsi}}" />
                        </div>
                        <div class="modal-footer">
                            <button class="submit btn btn-primary">Save changes</button>
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#datatable').Datatable();

            table.on('click', '.edit', function(){
                $tr = $(this)
            })

        })

    </script>

    @endsection
