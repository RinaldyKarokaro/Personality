@extends('pengunjung.layout.app')

@section('content')
<div>
    <div class="container" style="padding:150px; 0 0 0">
        <div class="card kartu" style="padding:50px 100px 200px 100px">
            <form role="form" action="/profile_pengunjung/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="text-align:center;padding:50px;">
                    <h3>Data Diri</h3>
                </div>
                <div class="row">
                    <div class="col-md-8 kertas-biodata">
                        <div class="biodata">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td valign="top">
                                            <table border="0" width="100%"
                                                style="padding-left: 2px; padding-right: 13px;">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%" valign="top" class="textt">Nama</td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="text" id="username"
                                                                value="{{$pengunjung->nama}}" class="form-control "
                                                                name="username" placeholder="Nama" required>
                                                            <!-- <label for="" class="input-group-text">{{$pengunjung->nama}}</label> -->
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="textt">Pekerjaan</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" id="pekerjaan"
                                                                value="{{$pengunjung->pekerjaan}}" class="form-control "
                                                                name="pekerjaan" placeholder="Pekerjaan" required>
                                                            <!-- <label for="" class="input-group-text">{{$pengunjung->pekerjaan}}</label> -->
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="textt">Email</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" id="email" value="{{$user->email}}"
                                                                class="form-control " name="email" placeholder="Email"
                                                                readonly>
                                                            <!-- <label for="" class="input-group-text">{{$pengunjung->email}}</label> -->
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="textt">No Telepon</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" id="no_telp"
                                                                value="{{$pengunjung->no_telp}}" class="form-control "
                                                                name="no_telp" placeholder="No Telp" required>
                                                            <!-- <label for="" class="input-group-text">{{$pengunjung->no_telp}}</label> -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="textt">Alamat</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" id="alamat"
                                                                value="{{$pengunjung->alamat}}" class="form-control "
                                                                name="alamat" placeholder="Alamat Anda" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td valign="top" class="textt">Password</td>
                                                    <td valign="top">:</td>
                                                    <td>
                                                        <input type="password" id="password" value="{{$user->password}}"
                                                            class="form-control " name="password" placeholder="Password"
                                                            required> -->
                                                        <!-- <label for="" class="input-group-text">{{$user->password}}</label> -->
                                                        <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                                        <!-- </td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="foto">
                            @if($pengunjung->foto != NULL)
                                <img src="{{asset('uploads/pengunjung/'.$pengunjung->foto)}}" style="width:60%; height:65%; padding-bottom:10px" alt ="Image">
                            @endif
                            @if($pengunjung->foto == NULL)
                            <img src="../../img/images.jpg" alt="Image" style="width:180px; padding-bottom:10px">
                            @endif
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
<style>
    td {
        padding-bottom: 10px
    }

    .foto {
        margin-top: 30px;
    }
</style>

@endsection