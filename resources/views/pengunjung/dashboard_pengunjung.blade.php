@extends('pengunjung.layout.app')

@section('content')
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6" style="text-align:center" >
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row" style="margin-bottom: 200px;" >
                  <div class="col-lg-12" style="margin-left:-60px;margin-top:60px; ">
                    <p class="display-6" style="color:white;"><b> Pastikan Cara Belajarmu Sesuai dengan Kepribadianmu</b></p>
                    <p class="display-7" style="color:white">Silahkan cek Kepribadian Kamu disini</p>
                  </div>
                  <div class="col-lg-12" style="padding: 1x; margin-left:-50px; ">
                    <div class="white-button first-button scroll-to-section">
                      <a href=" {{url('identifikasi')}}">Cek Sekarang <i class="fa fa-search"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/slider-dec.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h3 style=" color:#424D56">Layanan</h3>
            <img src="assets/images/heading-line-dec.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <a href="{{url('login')}}">
        <div class="col-lg-4">
          <div class="service-item">
          <i class="fa fa-cogs fa-3x" aria-hidden="true" style="padding-left:40%" ></i>
            <h4 style="padding:10px 20px 10px 70px">App Maintanance</h4>
          </div>
          </a>
        </div>
        <div class="col-lg-4" type="button" data-bs-toggle="modal" data-bs-target="#modalFaq">
            <a href="{{url('kepribadian')}}">
          <div class="service-item third-service">
          <i class="fa fa-book fa-3x" aria-hidden="true" style="padding-left:40%" ></i>
            <h4 style="padding:10px 20px 10px 80px">Kepribadian</h4>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
            <a href="{{url('faqimile')}}">
          <div class="service-item fourth-service">
          <i class="fa fa-cog fa-3x" aria-hidden="true" style="padding-left:40%" ></i>
            <h4 style="padding:10px 20px 10px 120px">FAQ</h4>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div> -->

  @endsection

<script>
    document.addEventListener(
    "click",
    function(event) {
        var target = event.target;
        var replyForm;
        if (target.matches("[data-toggle='reply-form']")) {
            replyForm = document.getElementById(target.getAttribute("data-target"));
            replyForm.classList.toggle("d-none");
        }
    },
    false
);
</script>


