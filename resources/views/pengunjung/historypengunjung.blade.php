@extends('pengunjung.layout.app')

@section('content')

<div class="bg1"><br><br>
    <div class="container-fluid" style="padding-top:5%;padding-left:4%;"width="100%">
        <div class="row"
            style="background-color:#145285;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="col-md-6" style="padding:3%;padding-left:7%;">
                <p style="color:white;font-size: 40px;"><b> Tipe Kepribadian DISC</b></p><br>
                <p style="color:white;font-size: 28px;"><b> Temukan Manfaat menerapkan DISC bagi Organisasimu</b></p>
                <br>
                <p style="color:white;font-size: 20px;"><b> Dominance, Influence, Steadiness, Complience</b></p>
            </div>
            <div class="col-md-6" style="text-align:center">
                <img src="assets/images/walp.png" alt="Chain App Dev" style="width:400px;">
            </div>
        </div>
<br>
        <div class="row">
            <div class="card">
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
                                <th>Tanggal</th>
                                <th>Hasil Identifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($history as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->tanggal_lahir}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>@foreach(explode('[', $item->identifikasi_id) as $identifikasi)
                                            @foreach(explode(']', $identifikasi) as $data) 
                                                {{$data}}
                                            @endforeach
                                    @endforeach</td>
                                    <td>@foreach(explode('[', $item->karir) as $karis)
                                            @foreach(explode(']', $karis) as $data) 
                                                {{$data}}
                                            @endforeach
                                    @endforeach</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>{{$item->hasil}}</td>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="5">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table><br>
            </div>
        </div>
    </div><br>
</div>
<style>
    .bg1 {
        background-image: url("assets/images/left-bg.png");
        background-repeat: no-repeat;

        background-size: 100% 100%;
    }
    .cek{
        display:block;
    }
</style>
</body>

</html>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $(".chb").change(function(e) {

    //Getting status before unchecking all
    var status = $(this).prop("checked");

    $(".chb").prop('checked', false);
    $(this).prop('checked', true);

    //false means checkbox was checked and became unchecked on change event, so let it stay unchecked
    if (status === false) {
    $(this).prop('checked', false);
    }

    });

</script>

@endsection
