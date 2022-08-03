@extends('layout.app')

@section('content')

<div class="bg1"><br><br>
<div class="container-fluid" style="padding:80px;">
    <div class="row">
        <div style=" text-align:center; margin-top:10px;" class="item-align:center">
            <div class="table-responsive " style="padding:100px; background:rgba(500,500,500,1); border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div>
                    <h2 style="padding:10px;margin-top:-80px;font-family: 'Otomanopee One'">Apa yang dimaksud dengan kepribadian ??</h2>
                </div>
                <div>
                    <p style="font-family: 'Otomanopee One'">Kepribadian adalah keseluruhan cara seorang individu bereaksi dan berinteraksi dengan individu lain. Disamping itu kepribadian sering diartikan sebagai ciri-ciri yang menonjol pada diri individu, seperti kepada orang yang pemalu dikenakan atribut “berkepribadian pemalu”</p>
                </div><br>
                <div>
                    <h2 style="font-family: 'Otomanopee One'">Dominant</h2>
                </div>
                <div>
                    <p style="font-family: 'Otomanopee One'">Dominant atau Dominan adalah orang yang memiliki sikap dominan, mereka cenderung mengutarakan segala hal secara langsung, mereka memiliki pengaruh yang kuat untuk menentukan sesuatu</p>
                </div><br>
                <div>
                    <h2 style="font-family: 'Otomanopee One'">Influence</h2>
                </div>
                <div>
                    <p style="font-family: 'Otomanopee One'">Influence atau biasa orang yang berpengaruh memiliki karakteristikantusias, memiliki kepercayaan diri yang tinggi, selalu optimis, banyak bicara, impulsive, emosional dan persuasif (mudah mempengaruhi orang lain)</p>
                </div><br>
                <div>
                    <h2 style="font-family: 'Otomanopee One'">Steadiness</h2>
                </div>
                <div>
                    <p style="font-family: 'Otomanopee One'">Konsisten, tenang, dan sabar adalah beberapa karakter yang menggambarkan kepribadian DISC yang satu ini. Sebaliknya, orang-orang dengan kepribadian Steadiness sulit menerima perubahan dan butuh waktu lama untuk menyesuaikan diri dengan lingkungan baru.</p>
                </div><br>
                <div>
                    <h2 style="font-family: 'Otomanopee One'">Compliant</h2>
                </div>
                <div>
                    <p style="font-family: 'Otomanopee One'">Orang-orang berkarakter Compliance biasanya tekun, sistematis, teliti, cermat, fokus pada ketepatan dan kualitas. Cenderung analitis dan kritis, sosok kepribadian DISC ini suka mengejar kualitas dengan standar yang tinggi dan mengerjakan tugas-tugas yang rinci</p>
                </div><br>




            </div>

        </div>
    </div>
</div><br>
</div>
  <style>
      p{
          font-size:18px;
      }
  </style>
</body>
</html>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

@endsection
