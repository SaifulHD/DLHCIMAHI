<?= $this->extend('layout/template');  ?>


<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Hi Marco,</h1>
        <h4>Indeks Kualitas Air</h4>
    </div><!-- End Page Title -->

    <section class="section dashboard">



        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">


                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-bar-chart-alt-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Tidak Tercemar</h6>
                                        <h5 class="card-title">0 %</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-bar-chart-alt-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Pencemaran rendah</h6>
                                        <h5 id="trcringan" name="trcringan" class="card-title"><?= $trcringan ?> % </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-bar-chart-alt-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Pencemaran Sedang</h6>
                                        <h5 id="trcsedang" name="trcsedang" class="card-title"><?= $trcsedang ?> %</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card info-card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-bar-chart-alt-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Pencemaran Tinggi</h6>
                                        <h5 id="trcberat" name="trcberat" class="card-title"><?= $trcberat ?> %</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->





                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="col-lg-12">
            <div class="row">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-1">

                        <div class="col-lg-4 col-md-8" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-box blue">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Perhitungan Indeks</h3>
                                <p>Menghitung indeks kualitas air dengan keseluruhan status mutu air yang berada di kota
                                    cimah terdapat 45 jumlah data yang akan diindeks,data tersebut diambil dari 15 titik
                                    pantau di 5 sungai kota cimahi.</p>
                                <select id="periode" name="periode" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onclick="getSelectValue()">

                                    <option selected>Pilih Periode</option>
                                    <option value="Periode1">Periode 1</option>
                                    <option value="Periode2">Periode 2</option>
                                    <option value="Periode3">Periode 3</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-box orange">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Nilai Indeks Kualitas Air 2017</h3>
                                <h4> <?= $trcindexair ?> </h4>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-box green">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Data Status Mutu</h3>
                                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                    voluptas adipisci eos earum corrupti.</p>

                            </div>
                        </div>

                        <script>
                            function getSelectValue() {
                                var selectedValue = document.getElementById("periode").value;




                                document.getElementById("collist").value = <?= $trcberat ?>;


                            }
                        </script>



                    </div>

                </div>
            </div>

        </div>

    </section><!-- End Services Section -->
</main><!-- End #main -->
<?= $this->endSection();  ?>