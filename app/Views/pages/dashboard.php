<?= $this->extend('layout/template');  ?>

<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Hi <?= session()->get('user_name'); ?>,</h1>
        <h4>Welcome to DLH Cimahi!</h4>
    </div><!-- End Page Title -->

    <!-- card start -->
    <section class="dashboard">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="card info-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bxs-location-plus"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="card-title">Titik Pantau</h6>
                                <h5 class="card-title"><?= $jumlah_titikpantau ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 mb-3">
                <div class="card info-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bxs-bar-chart-alt-2"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="card-title">Jumlah Sungai</h6>
                                <h5 class="card-title"><?= $jumlah_sungai ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 mb-3">
                <div class="card info-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bxs-user"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="card-title">Jumlah Karyawan</h6>
                                <h5 class="card-title"><?= $jumlah_karyawan ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 mb-3">
                <div class="card info-card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bxs-layer-plus"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="card-title">Jumlah Data Pencemaran Air</h6>
                                <h5 class="card-title"><?= $jumlah_IndexPencemaran ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- card end -->

    <!-- pilihan grafik start -->
    <section class="Grafikpilihan">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="grafik-flters">
                        <li data-filter=".filter-ika">Index Kualitas Air</li>
                        <li data-filter=".filter-ipa">Indeks Pencemaran Air</li>
                        <li data-filter=".filter-bpb">Beban Pencemaran Bod</li>
                        <li data-filter=".filter-bpt">Beban Pencemaran Tss</li>
                    </ul>
                </div>
            </div>
    </section>
    <!-- pilihan grafik end -->

    <section>
        <div class="row grafik-container">
            <!-- GRAFIK IKA -->
            <div class="grafikitem filter-ika">
                <div class="row">
                    <!-- NILAI IKA -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nilai Index Kualitas Air</h5>
                            <div id="NilaiIKA"></div>
                        </div>
                    </div>
                    <!-- END NILAI IKA -->
                </div>
            </div>
            <!-- END GRAFIK IKA -->

            <!-- START IPA -->
            <div class="grafikitem filter-ipa">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Index Pencemaran Air</h5>
                            <div class="form-group">
                                <input type="month" class="form-control" id="bulan" value="<?= date('Y-m') ?>">
                                <br>
                                <button class="btntampil" onclick="getDataPencemaran()">
                                    Tampil
                                </button>
                            </div>
                            <div id="viewTampilGrafik"></div>
                        </div>
                    </div>


                    <!-- JUMLAH IKA -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Index Kualitas Air</h5>
                            <div id="JumlahIKA"></div>
                        </div>
                    </div>
                    <!-- END JUMLAH IKA -->

                    <!-- STATUS MUTU AIR -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Status Mutu Air</h5>
                            <div id="jumlahmutu"></div>
                        </div>
                    </div>
                    <!-- STATUS MUTU AIR END -->
                </div>
            </div>
            <!-- END START IPA -->

            <!-- START BOD -->
            <div class="grafikitem filter-bpb">
                <div class="row">
                    <!-- BOD EKSISTING -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar BOD Eksisting</h5>
                            <div class="form-group">
                                <input type="month" class="form-control" id="bulann" value="<?= date('Y-m') ?>">
                                <br>
                                <button class="btntampil" onclick="getDataBodEksisting()">
                                    Tampil
                                </button>
                            </div>
                            <div id="BODEKSISTING"></div>
                        </div>
                    </div>
                    <!-- END BOD EKSISTING -->

                    <!-- BOD POTENSIAL -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar BOD Potensial Domestik</h5>
                            <div id="BODPOTENSIAL"></div>
                        </div>
                    </div>
                    <!-- END BOD POTENSIAL -->
                </div>
            </div>

            <!-- START TSS -->
            <div class="grafikitem filter-bpt">
                <div class="row">
                    <!-- TSS EKSISTING -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar TSS Eksisting</h5>
                            <div class="form-group">
                                <input type="month" class="form-control" id="bulantssek" value="<?= date('Y-m') ?>">
                                <br>
                                <button class="btntampil" onclick="getDataTssEksisting()">
                                    Tampil
                                </button>
                            </div>
                            <div id="TSSEKSISTING"></div>
                        </div>
                    </div>

                    <!-- END TSS EKSISTING -->

                    <!-- TSS POTENSIAL -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beban Pencemar TSS Potensial</h5>
                            <!-- <div id="TSSEKSISTING"></div> -->
                        </div>
                    </div>

                    <!-- END TSS POTENSIAL -->
                </div>
            </div>



        </div>


    </section>

</main><!-- End main -->
<?= $this->endSection();  ?>
<?= $this->section('script') ?>
<script>
    // START IKA
    // NILAI IKA
    <?php
    $chartData = [];
    foreach ($nilaiIKA->getResult() as $key => $value) : {
            $chartData[] = [
                'label' => $value->tahun_ika,
                'value' => $value->nilai_ika
            ];
        };
    endforeach ?>

    const chartData = <?= json_encode($chartData); ?>;
    const chartConfig = {
        type: 'spline',
        renderAt: 'NilaiIKA',
        width: '100%',
        height: '300%',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                showvalues: "1",
                showpercentintooltip: "0",
                enablemultislicing: "1",
                theme: "fusion"
            },
            data: chartData
        },
    };
    FusionCharts.ready(function() {
        var fusioncharts = new FusionCharts(chartConfig);
        fusioncharts.render();
    });
    // END NILAI IKA 


    // START IPA
    function getDataPencemaran() {
        $("#viewTampilGrafik").html('');
        $.ajax({
            type: "POST",
            url: "/api/indexPencemaran",
            data: {
                bulan: $('#bulan').val()
            },
            dataType: "JSON",
            success: function(response) {
                tampilkanIndexPencemaran(response)
            }
        });
    }

    function tampilkanIndexPencemaran(response) {
        let dataSource = {
            chart: {
                formatnumberscale: "1",
                showvalues: "1",
                theme: "fusion"
            },
            categories: [{
                category: response.category
            }],
            dataset: response.dataset
        };
        FusionCharts.ready(function() {
            var myChart = new FusionCharts({
                type: "mscolumn3d",
                renderAt: "viewTampilGrafik",
                width: "100%",
                height: "190%",
                dataFormat: "json",
                dataSource
            }).render();
        });
    }
    $(document).ready(function() {
        getDataPencemaran()
    });
    // END START IPA


    // START JUMLAH IKA
    <?php
    $chart = [];
    foreach ($jumlahIKA->getResult() as $key => $value) : {
            $chart[] = [
                'label' => $value->tahun_ika,
                'value' => $value->jumlah_ika
            ];
        };
    endforeach ?>
    const chart = <?= json_encode($chart); ?>;
    FusionCharts.ready(function() {
        var myChart = new FusionCharts({
            type: "line",
            renderAt: "JumlahIKA",
            width: "100%",
            height: "300%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    showvalues: "1",
                    showpercentintooltip: "0",
                    enablemultislicing: "1",
                    numvisibleplot: "12",
                    theme: "fusion"
                },
                data: chart
            },
        }).render();
    });
    // END JUMLAH IKA

    // JUMLAH MUTU air start


    // JUMLAH MUTU AIR END


    // COBAAA
    <?php
    $Dataaa = [];
    foreach ($jumlahMUTU->getResult() as $key => $value) : {
            $Dataaa[] = [
                'label' => $value->katagori,
                'color' => $value->kode_warna,
                'value' => $value->jumlah,
            ];
        };
    endforeach;

    ?>
    const Dataaa = <?= json_encode($Dataaa); ?>;
    FusionCharts.ready(function() {
        var myChart = new FusionCharts({
            type: "doughnut3d",
            renderAt: "jumlahmutu",
            width: "100%",
            height: "300%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    showvalues: "1",
                    theme: "fusion",
                },
                data: Dataaa,
            },
        }).render();
    });

    // END COBAA

    // START BOD EKSISTING
    function getDataBodEksisting() {
        $("#BODEKSISTING").html('');
        $.ajax({
            type: "POST",
            url: "/api/bodeksisting",
            data: {
                bulan: $('#bulann').val()
            },
            dataType: "JSON",
            success: function(response) {
                tampilkanbodex(response)
            }
        });
    }

    function tampilkanbodex(response) {
        let dataSource = {
            chart: {
                formatnumberscale: "1",
                showvalues: "1",
                theme: "fusion"
            },
            categories: [{
                category: response.category
            }],
            dataset: response.dataset
        };
        FusionCharts.ready(function() {
            var myChart = new FusionCharts({
                type: "mscolumn3d",
                renderAt: "BODEKSISTING",
                width: "100%",
                height: "190%",
                dataFormat: "json",
                dataSource
            }).render();
        });
    }
    $(document).ready(function() {
        getDataBodEksisting()
    });
    // END BOD EKSISTING

    // BOD POTENSIAL DOMESTIK
    <?php
    $Data = [];
    foreach ($BodPOTENSIAL->getResult() as $key => $value) : {
            $Data[] = [
                'label' => $value->Tahun_domestik,
                'value' => $value->Nilai_domestik
            ];
        };
    endforeach ?>

    const Data = <?= json_encode($Data); ?>;
    FusionCharts.ready(function() {
        var myChart = new FusionCharts({
            type: "pie3d",
            renderAt: "BODPOTENSIAL",
            width: "100%",
            height: "300%",
            dataFormat: "json",
            dataSource: {
                "chart": {
                    showvalues: "1",
                    theme: "fusion"
                },
                data: Data
            },
        }).render();
    });
    // END BOD POTENSIAL DOMESTIK

    // START TSS EKSISTING
    function getDataTssEksisting() {
        $("#TSSEKSISTING").html('');
        $.ajax({
            type: "POST",
            url: "/api/tsseksisting",
            data: {
                bulan: $('#bulantssek').val()
            },
            dataType: "JSON",
            success: function(response) {
                tampilkantssex(response)
            }
        });
    }

    function tampilkantssex(response) {
        let dataSource = {
            chart: {
                formatnumberscale: "1",
                showvalues: "1",
                theme: "fusion"
            },
            categories: [{
                category: response.category
            }],
            dataset: response.dataset
        };
        FusionCharts.ready(function() {
            var myChart = new FusionCharts({
                type: "mscolumn3d",
                renderAt: "TSSEKSISTING",
                width: "100%",
                height: "190%",
                dataFormat: "json",
                dataSource
            }).render();
        });
    }
    $(document).ready(function() {
        getDataTssEksisting()
    });
    // END TSS EKSISTING
</script>
<?= $this->endSection() ?>