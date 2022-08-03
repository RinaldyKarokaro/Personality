@extends('pengunjung.layout.app')

@section('content')

<div class="bg1"><br><br>
    <div class="container-fluid" style="padding:80px;">
        <div class="row"
            style="background-color:#145285;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="col-md-6" style="padding:30px;padding-left:70px;">
                <p style="color:white;font-size: 40px;"><b> Tipe Kepribadian DISC</b></p><br>
                <p style="color:white;font-size: 28px;"><b> Temukan Manfaat menerapkan DISC bagi Organisasimu</b></p>
                <br>
                <p style="color:white;font-size: 20px;"><b> Dominance, Influence, Steadiness, Complience</b></p>
            </div>
            <div class="col-md-6" style="text-align:center">
                <img src="assets/images/walp.png" alt="Chain App Dev" style="width:400px;">
            </div>
        </div>
        <div class="row">
            <div style=" text-align:center; margin-top:50px;" class="item-align:center">
                <div class="table-responsive "
                    style="padding:100px; background:rgba(500,500,500,1); border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div>
                        <h2 style="padding:10px;margin-top:-80px">Test Kepribadian</h2>
                    </div><br>

                    <form role="form" action="/identifikasi" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="peringatan-item third-service">
                                    <img src="https://static.neris-assets.com/images/test-header-1.svg"
                                        style="width:50px">
                                    <h4 style="padding:10px 20px 10px 10px">Kerjakan dengan sebaik mungkin</h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="peringatan-item third-service">
                                    <img src="https://static.neris-assets.com/images/test-header-2.svg"
                                        style="width:50px">
                                    <h4 style="padding:10px -5px 10px -10px">Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda.</h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="peringatan-item fourth-service">
                                    <img src="https://static.neris-assets.com/images/test-header-3.svg"
                                        style="width:50px">
                                    <h4 style="padding:10px 0px 10px 0px">Cobalah untuk tidak mendengarkan jawaban orang lain.
                                    </h4>
                                </div>
                            </div>
                        </div><br>
                        <hr>
                        @if($errors->any())
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                            <hr>
                        @endif
                        <div class="container">
                            <div class="row" id="load_data">

                            @forelse($identifikasis as $item)
                                <div class="col-sm-6 mb-3">
                                <div class="card" style="text-align:left;border-radius:20px">
                                    <div class="card-body">
                                    <label class="cek"><input type="radio" name="{{$item->id}}" value="{{$item->dominance}}" required/> {{$item->dominance}}</label>
                                    <label class="cek"><input type="radio" name="{{$item->id}}"value="{{$item->influence}}" required/> {{$item->influence}}</label>
                                    <label class="cek"><input type="radio" name="{{$item->id}}" value="{{$item->steadiness}}" required/> {{$item->steadiness}}</label>
                                    <label class="cek"><input type="radio" name="{{$item->id}}" value="{{$item->compliance}}" required/> {{$item->compliance}}</label>
                                    </div>
                                </div>
                                </div>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                                </tr>
                            </div>
                            @endforelse

                        </div>


                        <div class="" style="text-align:center">
                            <button class="submit btn btn-primary" style="width:10%">
                                <i class="fa fa-search" aria-hidden="true">&nbsp&nbsp Cek</i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div><br>
</div>
<style>
    .bg1 {
        background-image: url("assets/images/left-bg.png");
        background-repeat: no-repeat;

        background-size: 710px 760px;
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
