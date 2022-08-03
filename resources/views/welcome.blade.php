@extends('layout.app')

@section('content')
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6" style="text-align:center" >
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s" >
                <div class="row" style="margin-bottom: 200px;" >
                  <div class="col-lg-12" style="margin-left:-60px;margin-top:60px; ">
                    <p class="display-6" style="color:white;"><b> Pastikan Cara Belajarmu Sesuai dengan Kepribadianmu</b></p>
                    <p class="display-7" style="color:white"><b> Silahkan cek Kepribadian Kamu disini</b></p>
                  </div>
                  <div class="col-lg-12" style="padding: 1x; margin-left:-50px;">
                  <a class="btn btn-primary" href="{{url('login')}}" role="button">Cek Sekarang</a>
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
          </div>
        </div>
      </div>
    </div> -->
    <!-- <div class="container">
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
            <a href="{{url('layananKepribadians')}}">
          <div class="service-item third-service">
          <i class="fa fa-book fa-3x" aria-hidden="true" style="padding-left:40%" ></i>
            <h4 style="padding:10px 20px 10px 80px">Kepribadian</h4>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
            <a href="{{url('login')}}">
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



  <!-- Modal FAQ -->
<div class="modal fade" style="" id="modalFaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1000px;" >
    <div class="modal-content" style="width:1000px; margin-left:-50%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="d-inline" style="">
              <h4 style="font-family: 'Otomanopee One';padding-bottom:10px; font-style: normal;text-align:center"><i class='fas fa-question-circle d-inline' style='font-size:50px; padding:20px;'></i>Ada Pertanyaan ??</h4>
          </div><br>
          <div>
              <h7 style="text-align:center; padding-bottom:20px"><center>Kirimkan pertanyaan Anda kepada kami</center> </h7>
          </div>
          <div style="text-align:center; margin:10px 100px 10px 100px">
              <textarea class="form-control"  placeholder="Silahkan diisi..."  name="" id="" cols="50" rows="4"></textarea>
          </div>
          <div style="text-align:right; margin-right:100px;">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kirim</button>
          </div>

          <div class="commentt">
          <div class="comment-thread">
    <!-- Comment 1 start -->
    <details open class="comment" id="comment-1">
        <a href="#comment-1" class="comment-border-link">
            <span class="sr-only">Jump to comment-1</span>
        </a>
        <summary>
            <div class="comment-heading">
                <div class="comment-voting">
                    <button type="button">
                        <span aria-hidden="true">&#9650;</span>
                        <span class="sr-only">Vote up</span>
                    </button>
                    <button type="button">
                        <span aria-hidden="true">&#9660;</span>
                        <span class="sr-only">Vote down</span>
                    </button>
                </div>
                <div class="comment-info">
                    <a href="#" class="comment-author">someguy14</a>
                    <p class="m-0">
                        22 points &bull; 4 days ago
                    </p>
                </div>
            </div>
        </summary>

        <div class="comment-body">
            <p>
                This is really great! I fully agree with what you wrote, and this is sure to help me out in the future. Thank you for posting this.
            </p>
            <button type="button" data-toggle="reply-form" data-target="comment-1-reply-form">Reply</button>
            <button type="button">Flag</button>

            <!-- Reply form start -->
            <form method="POST" class="reply-form d-none" id="comment-1-reply-form">
                <textarea placeholder="Reply to comment" rows="4"></textarea>
                <button type="submit">Submit</button>
                <button type="button" data-toggle="reply-form" data-target="comment-1-reply-form">Cancel</button>
            </form>
            <!-- Reply form end -->
        </div>

        <div class="replies">
            <!-- Comment 2 start -->
            <details open class="comment" id="comment-2">
                <a href="#comment-2" class="comment-border-link">
                    <span class="sr-only">Jump to comment-2</span>
                </a>
                <summary>
                    <div class="comment-heading">
                        <div class="comment-voting">
                            <button type="button">
                                <span aria-hidden="true">&#9650;</span>
                                <span class="sr-only">Vote up</span>
                            </button>
                            <button type="button">
                                <span aria-hidden="true">&#9660;</span>
                                <span class="sr-only">Vote down</span>
                            </button>
                        </div>
                        <div class="comment-info">
                            <a href="#" class="comment-author">randomperson81</a>
                            <p class="m-0">
                                4 points &bull; 3 days ago
                            </p>
                        </div>
                    </div>
                </summary>

                <div class="comment-body">
                    <p>
                        Took the words right out of my mouth!
                    </p>
                    <button type="button" data-toggle="reply-form" data-target="comment-2-reply-form">Reply</button>
                    <button type="button">Flag</button>

                    <!-- Reply form start -->
                    <form method="POST" class="reply-form d-none" id="comment-2-reply-form">
                        <textarea placeholder="Reply to comment" rows="4"></textarea>
                        <button type="submit">Submit</button>
                        <button type="button" data-toggle="reply-form" data-target="comment-2-reply-form">Cancel</button>
                    </form>
                    <!-- Reply form end -->
                </div>
            </details>
            <!-- Comment 2 end -->

            <a href="#load-more">Load more replies</a>
        </div>
    </details>
    <!-- Comment 1 end -->
</div>
          </div>

      </div>
    </div>
  </div>
</div>

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

