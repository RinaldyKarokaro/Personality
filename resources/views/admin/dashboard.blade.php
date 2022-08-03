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
            <!-- Navbar End -->


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
            <!--

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <h2 class="font-weight-bolder">Selamat Datang di </h2><br>
                                    <h2 >Sistem Identifikasi Kepribadian</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="border-radius-lg h-100">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <img class="w-100 position-relative " src="assets/images/wal.jpg" style="height:350px;">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="card" style="width: 80%;margin-left:10%;margin-top:2%;padding:1%"  >
                <canvas id="myChart"></canvas>
            </div>
                <script>

                var barChartData = {
                labels: [
                    "Januari",
                    "Februari",
                    "Maret",
                    "April",
                    "Mei",
                    "Juni",
                    "Juli",
                    "Agustus",
                    "September",
                    "Oktober",
                    "November",
                    "Desember"
                ],

                datasets: [
                    {
                    label: "Dominance",
                    backgroundColor: "Black",
                    borderColor: "Black",
                    borderWidth: 1,
                    data: [{{$dominance[0]}},{{$dominance[1]}},{{$dominance[2]}},{{$dominance[3]}},{{$dominance[4]}},{{$dominance[5]}},{{$dominance[6]}},{{$dominance[7]}},{{$dominance[8]}},{{$dominance[9]}},{{$dominance[10]}},{{$dominance[11]}}]
                    },
                    {
                    label: "Dominance and Compliance",
                    backgroundColor: "Yellow",
                    borderColor: "Yellow",
                    borderWidth: 1,
                    data: [{{$dominanceCompliance[0]}},{{$dominanceCompliance[1]}},{{$dominanceCompliance[2]}},{{$dominanceCompliance[3]}},{{$dominanceCompliance[4]}},{{$dominanceCompliance[5]}},{{$dominanceCompliance[6]}},{{$dominanceCompliance[7]}},{{$dominanceCompliance[8]}},{{$dominanceCompliance[9]}},{{$dominanceCompliance[10]}},{{$dominanceCompliance[11]}}]
                    },
                    {
                    label: "Dominance and Influence",
                    backgroundColor: "Red",
                    borderColor: "Red",
                    borderWidth: 1,
                    data: [{{$dominanceInfluence[0]}},{{$dominanceInfluence[1]}},{{$dominanceInfluence[2]}},{{$dominanceInfluence[3]}},{{$dominanceInfluence[4]}},{{$dominanceInfluence[5]}},{{$dominanceInfluence[6]}},{{$dominanceInfluence[7]}},{{$dominanceInfluence[8]}},{{$dominanceInfluence[9]}},{{$dominanceInfluence[10]}},{{$dominanceInfluence[11]}}]
                    },
                    {
                    label: "Influence",
                    backgroundColor: "Green",
                    borderColor: "Green",
                    borderWidth: 1,
                    data: [{{$influence[0]}},{{$influence[1]}},{{$influence[2]}},{{$influence[3]}},{{$influence[4]}},{{$influence[5]}},{{$influence[6]}},{{$influence[7]}},{{$influence[8]}},{{$influence[9]}},{{$influence[10]}},{{$influence[11]}}]
                    },
                    {
                    label: "Influence and Dominance",
                    backgroundColor: "Blue",
                    borderColor: "Blue",
                    borderWidth: 1,
                    data: [{{$influenceDominance[0]}},{{$influenceDominance[1]}},{{$influenceDominance[2]}},{{$influenceDominance[3]}},{{$influenceDominance[4]}},{{$influenceDominance[5]}},{{$influenceDominance[6]}},{{$influenceDominance[7]}},{{$influenceDominance[8]}},{{$influenceDominance[9]}},{{$influenceDominance[10]}},{{$influenceDominance[11]}}]
                    },
                    {
                    label: "Influence and Steadiness",
                    backgroundColor: "Orange",
                    borderColor: "Orange",
                    borderWidth: 1,
                    data: [{{$influenceSteadiness[0]}},{{$influenceSteadiness[1]}},{{$influenceSteadiness[2]}},{{$influenceSteadiness[3]}},{{$influenceSteadiness[4]}},{{$influenceSteadiness[5]}},{{$influenceSteadiness[6]}},{{$influenceSteadiness[7]}},{{$influenceSteadiness[8]}},{{$influenceSteadiness[9]}},{{$influenceSteadiness[10]}},{{$influenceSteadiness[11]}}]
                    },
                    {
                    label: "Steadiness",
                    backgroundColor: "Grey",
                    borderColor: "Grey",
                    borderWidth: 1,
                    data: [{{$steadiness[0]}},{{$steadiness[1]}},{{$steadiness[2]}},{{$steadiness[3]}},{{$steadiness[4]}},{{$steadiness[5]}},{{$steadiness[6]}},{{$steadiness[7]}},{{$steadiness[8]}},{{$steadiness[9]}},{{$steadiness[10]}},{{$steadiness[11]}}]
                    },
                    {
                    label: "Steadiness and Compliance",
                    backgroundColor: "Pink",
                    borderColor: "Pink",
                    borderWidth: 1,
                    data: [{{$steadinessCompliance[0]}},{{$steadinessCompliance[1]}},{{$steadinessCompliance[2]}},{{$steadinessCompliance[3]}},{{$steadinessCompliance[4]}},{{$steadinessCompliance[5]}},{{$steadinessCompliance[6]}},{{$steadinessCompliance[7]}},{{$steadinessCompliance[8]}},{{$steadinessCompliance[9]}},{{$steadinessCompliance[10]}},{{$steadinessCompliance[11]}}]
                    },
                    {
                    label: "Steadiness and Influence",
                    backgroundColor: "Yellow",
                    borderColor: "Yellow",
                    borderWidth: 1,
                    data: [{{$steadinessInfluence[0]}},{{$steadinessInfluence[1]}},{{$steadinessInfluence[2]}},{{$steadinessInfluence[3]}},{{$steadinessInfluence[4]}},{{$steadinessInfluence[5]}},{{$steadinessInfluence[6]}},{{$steadinessInfluence[7]}},{{$steadinessInfluence[8]}},{{$steadinessInfluence[9]}},{{$steadinessInfluence[10]}},{{$steadinessInfluence[11]}}]
                    },
                    {
                    label: "Compliance",
                    backgroundColor: "Purple",
                    borderColor: "Purple",
                    borderWidth: 1,
                    data: [{{$compliance[0]}},{{$compliance[1]}},{{$compliance[2]}},{{$compliance[3]}},{{$compliance[4]}},{{$compliance[5]}},{{$compliance[6]}},{{$compliance[7]}},{{$compliance[8]}},{{$compliance[9]}},{{$compliance[10]}},{{$compliance[11]}}]
                    },
                    {
                    label: "Compliance and Dominance",
                    backgroundColor: "Gold",
                    borderColor: "Gold",
                    borderWidth: 1,
                    data: [{{$complianceDominance[0]}},{{$complianceDominance[1]}},{{$complianceDominance[2]}},{{$complianceDominance[3]}},{{$complianceDominance[4]}},{{$complianceDominance[5]}},{{$complianceDominance[6]}},{{$complianceDominance[7]}},{{$complianceDominance[8]}},{{$complianceDominance[9]}},{{$complianceDominance[10]}},{{$complianceDominance[11]}}]
                    },
                    {
                    label: "Compliance and Steadiness",
                    backgroundColor: "Navi",
                    borderColor: "Navi",
                    borderWidth: 1,
                    data: [{{$complianceSteadiness[0]}},{{$complianceSteadiness[1]}},{{$complianceSteadiness[2]}},{{$complianceSteadiness[3]}},{{$complianceSteadiness[4]}},{{$complianceSteadiness[5]}},{{$complianceSteadiness[6]}},{{$complianceSteadiness[7]}},{{$complianceSteadiness[8]}},{{$complianceSteadiness[9]}},{{$complianceSteadiness[10]}},{{$complianceSteadiness[11]}}]
                    }
                ]
                };

                var chartOptions = {
                responsive: true,
                legend: {
                    position: "top"
                },
                title: {
                    display: true,
                    text: "Data Kepribadian DISC perbulan"
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                    }]
                }
                }

                var ctx = document.getElementById("myChart").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: "bar",
                    data: barChartData,
                    options: chartOptions
                });

</script>

            @endsection
