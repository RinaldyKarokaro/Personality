
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Sistem Indentifikasi Kepribadian</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="../../assets/css/animated.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css  ">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container-fluid"  >
      <div class="row">
        <div class="col-12">
          <nav class="main-nav" style="margin-left:60px">
            <!-- ***** Logo Start ***** -->
            <a href="{{url('welcome')}}" class="logo">
              <img src="assets/images/logggo.png" alt="Chain App Dev" style="width:200px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <!-- <li class="scroll-to-section"><a href="{{url('welcome')}}" class="active">Home</a></li> -->
              <!-- <li class="scroll-to-section"><a href="{{url('identifikasi')}}">Identifikasi</a></li> -->
              <li><div class="gradient-button"><a id="modal_trigger" href="{{url('login')}}"><i class="fa fa-sign-in-alt"></i> Login  </a></div></li>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>

        @yield('content')

<!-- <footer id="newsletter">
    <div class="container-fluid" >
      <div class="row"  >
        <div class="col-lg-8 offset-lg-2"  >
          <div class="section-heading" >
            <h5 style="color:white;text-align:center">Sistem Indentifikasi Kepribadian</h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="copyright-text" >
            <p>Copyright © itdel </p>
          </div>
        </div>
      </div>
    </div>
</footer> -->

<footer class="page-footer font-small blue" style="margin-bottom:-100px">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white">
  <h6>Sistem Identifikasi Kepribadian</h6>
  2020 Copyright:

    <a href="/" style="color:white"> IT Del</a>
  </div>
  <!-- Copyright -->

</footer>
          <!-- Scripts -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="assets/js/jquery.dataTables"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</body>

</html>
