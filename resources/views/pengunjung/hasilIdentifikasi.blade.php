@extends('pengunjung.layout.app')

@section('content')
<!-- ***** Header Area End ***** -->

<!-- Content Start -->
<div class="container-fluid bg1">
    <div class="row" style="padding:50px;">
        <div class="col-md-12" style="padding-top:100px">
            <div class="align-items-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div style="text-align:center">
                                    <img src="assets/images/walp.png" alt="Chain App Dev" style="width:200px; ">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue">
                                    Tanggal : {{$history->tanggal}}<center><h2>{{$history->hasil}}</h2></center>
                                    </div>
                                    <div class="col-12">
                                        @if($history->hasil == 'Dominance')
                                            <p>Tipe kepribadian dominance merupakan tipe kepribadian yang cenderung memberikan penekanan kuat pada lingkungan dan membuat keputusan dalam mengatasi sebuah pertentangan</p>
                                        @endif
                                        @if($history->hasil == 'Dominance and Compliance')
                                            <p>Tipe kepribadian Dominance and Compliance (DC) merupakan kombinasi dari tipe kepribadian Dominance dan Compliance dengan major nya adalah Dominance yang memiliki sifat yang cenderung rajin, berpikiran keras dan kreatif, mempengaruhi orang lain melalui standar dan tekad mereka yang tinggi</p>
                                        @endif
                                        @if($history->hasil == 'Dominance and Influence')
                                            <p>Tipe kepribadian Dominance and Influence (DI) merupakan kombinasi dari tipe kepribadian Dominance dan Influence dengan major nya adalah Dominance yang memiliki sifat yang cenderung berorientasi pada hasil, vokal dan antusias, mempengaruhi orang lain melalui pesona dan tindakan berani dari orang yang memiliki kepribadian ini</p>
                                        @endif
                                        @if($history->hasil == 'Influence')
                                            <p>Tipe kepribadian influence merupakan tipe kepribadian yang selalu ingin menambah dan memperluas koneksi mereka. Seseorang dengan tipe kepribadian influence cenderung suka berpindah-pindah dan suka mengerjakan banyak hal yang berbeda dalam satu waktu</p>
                                        @endif
                                        @if($history->hasil == 'Influence and Dominance')
                                            <p>Tipe kepribadian Influence dan Dominance (ID) merupakan kombinasi dari tipe kepribadian Influence dan Dominance dengan major nya adalah Influence yang memiliki sifat yang cenderung berenergi tinggi, karismatik dan suka berpetualang serta mempengaruhi orang lain melalui keberanian dan hasrat mereka</p>
                                        @endif
                                        @if($history->hasil == 'Influence and Steadiness')
                                            <p>Tipe kepribadian Influence dan Steadiness (IS) merupakan kombinasi dari tipe kepribadian Influence dan Steadiness dengan major nya adalah Influence yang memiliki sifat yang cenderung hangat, ramah dan mudah bergaul serta mempengaruhi orang lain melalui keramahan dan empati mereka</p>
                                        @endif
                                        @if($history->hasil == 'Steadiness')
                                            <p>Seseorang dengan tipe kepribadian steadiness adalah seseorang yang bersifat pendiam dan lebih memilih menjadi pendengar yang baik dan berkontribusi saat situasi sudah tenang dan stabil</p>
                                        @endif
                                        @if($history->hasil == 'Steadiness and Influence')
                                            <p>Tipe kepribadian Steadiness dan Influence (SI) merupakan kombinasi dari tipe kepribadian Steadiness dan Influence dengan major nya adalah Steadiness yang memiliki sifat yang cenderung murah hati, mudah didekati dan penuh kasih sayang, serta mempengaruhi orang lain dengan menunjukkan empati dan kesabaran</p>
                                        @endif
                                        @if($history->hasil == 'Steadiness and Compliance')
                                            <p>Tipe kepribadian Steadiness dan Compliance (SC) merupakan kombinasi dari tipe kepribadian Steadiness dan Compliance dengan major nya adalah Steadiness yang memiliki sifat yang cenderung akomodatif, sabar dan dapat diandalkan serta mempengaruhi orang lain melalui diplomasi dan pengendalian diri</p>
                                        @endif
                                        @if($history->hasil == 'Compliance')
                                            <p>Seseorang dengan tipe kepribadian compliance merupakan seseorang dengan sifat pendiam dan cenderung menggunakan logika untuk membuat keputusan</p>
                                        @endif
                                        @if($history->hasil == 'Compliance and Dominance')
                                            <p>Tipe kepribadian Compliance dan Dominance (CD) merupakan kombinasi dari tipe kepribadian Compliance dan Dominance dengan major nya adalah Compliance yang memiliki sifat yang cenderung murah hati, mudah didekati dan penuh kasih sayang, serta mempengaruhi orang lain dengan menunjukkan empati dan kesabaran</p>
                                        @endif
                                        @if($history->hasil == 'Compliance and Steadiness')
                                            <p>Tipe kepribadian Compliance dan Steadiness (CS) merupakan kombinasi dari tipe kepribadian Compliance dan Steadiness dengan major nya adalah Compliance yang memiliki sifat yang cenderung akomodatif, sabar dan dapat diandalkan serta mempengaruhi orang lain melalui diplomasi dan pengendalian diri</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-4">
                            <!-- <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div style="text-align:center">
                                    <img src="assets/images/walp.png" alt="Chain App Dev" style="width:200px; ">
                                </div>
                            </div><br> -->
                            
                            <!-- <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue">
                                        Tanggal : {{$history->tanggal}}
                                    </div>
                                    <div class="col-12" style="color:lightblue">
                                        Detail mengenai kepribadian Anda :
                                    </div>
                                    <div>
                                        <ol class="list-group list-group-numbered">
                                            @forelse($identifikasi_get_req as $item)
                                            <li class="list-group-item">{{$item}}</li>
                                            @empty
                                            <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                    </div>
                                </div>
                            </div> -->
                            @if(count($kepribadian) != 0)
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue;text-align:center">
                                        Kelemahan dan Kelebihan dari kepribadian ini adalah
                                    </div>
                                    <div>
                                        Kelebihan dari tipe kepribadian {{$history->hasil}}
                                        <ol class="list-group list-group-numbered">
                                            @forelse($kepribadian as $item)
                                            <li class="list-group-item">{{$item->kelebihan}}</li>
                                            @empty
                                            <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                        <br>
                                        Kelemahan dari tipe kepribadian {{$history->hasil}}
                                        <ol class="list-group list-group-numbered">
                                            @forelse($kepribadian as $item)
                                            <li class="list-group-item">{{$item->kelemahan}}</li>
                                            @empty
                                            <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue;text-align:center">
                                        Test DISC
                                    </div>
                                    <div class="col-12">
                                        Berikut Grafik Hasil Test Anda :
                                    </div>
                                    <div class="col-12" style="color:lightblue">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart-area">
                                                    <canvas id="oilChart" width="600" height="400"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="color:lightblue">
                                        Jenis Kepribadian Anda adalah : {{$history->hasil}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- @if(count($kepribadian) != 0)
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue;text-align:center">
                                        Kelemahan dan Kelebihan dari kepribadian ini adalah
                                    </div>
                                    <div>
                                        Kelebihan dari tipe kepribadian {{$history->hasil}}
                                        <ol class="list-group list-group-numbered">
                                            @forelse($kepribadian as $item)
                                            <li class="list-group-item">{{$item->kelebihan}}</li>
                                            @empty
                                            <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                        <br>
                                        Kelemahan dari tipe kepribadian {{$history->hasil}}
                                        <ol class="list-group list-group-numbered">
                                            @forelse($kepribadian as $item)
                                            <li class="list-group-item">{{$item->kelemahan}}</li>
                                            @empty
                                            <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @endif -->
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <div style="background-color:#ffffff; box-shadow:3px 2px #888888; border-radius: 5px;">
                                <div class="row justify-content-start" style="padding:10px;">
                                    <div class="col-12" style="color:lightblue">
                                        Saran Profesi untuk Jenis Kepribadian Anda adalah
                                    </div>
                                    <div>
                                        <ol class="list-group list-group-numbered">
                                            @forelse($karir as $data)
                                                <li class="list-group-item">{{$data->karir}}</li>
                                                @empty
                                                <li class="list-group-item">Data tidak tersedia</li>
                                            @endforelse
                                        </ol>
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align:center">
                                <form role="form" action="/cetak-hasil" method="post">
                                    @csrf
                                    <input type="hidden" name="history" value ="{{$history->id}}">
                                    <input type="hidden" name="sumDominance" value ="{{$sumDominance}}">
                                    <input type="hidden" name="sumInfluence" value ="{{$sumInfluence}}">
                                    <input type="hidden" name="sumSteadiness" value ="{{$sumSteadiness}}">
                                    <input type="hidden" name="sumCompliance" value ="{{$sumCompliance}}">
                                    <li>
                                    <div class="gradient-button">
                                        <button class="btn btn-primary"><i class="fa fa-print"></i>
                                                Simpan Ke PDF
                                        </button>
                                    </div>
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


</div>
</div>
<style>
    .bg1 {
        background-image: url("assets/images/left-bg.png");
        background-repeat: no-repeat;

        background-size: 710px 700px;
    }

    p {
        color: black;
    }
</style>

<script>
    var oilCanvas = document.getElementById("oilChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var oilData = {
        labels: [
            "Dominant",
            "Influence",
            "Steadiness",
            "Compliance"
        ],
        datasets: [{
            data: [{{$sumDominance}},{{$sumInfluence}},{{$sumSteadiness}}, {{$sumCompliance}}],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF"
            ]
        }]
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
    });
</script>


@endsection