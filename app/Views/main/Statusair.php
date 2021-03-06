<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>
<link href="/custom_css/pages/BODEksisting.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Hi Oki Kurniawan,</h1>
        <h4>Status Mutu Air</h4>
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
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Data Ukur</h6>
                                        <h5 class="card-title"><?= $jumlahtikpan ?></h5>
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
                                        <i class="bx bxs-location-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Titik Pantau</h6>
                                        <h5 class="card-title"></h5>
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
                                        <h6>Sungai</h6>
                                        <h5 class="card-title">5</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->


                    <div class="custom__card__large">
                        <div class="custom__header__card__large">
                            <button type="button" class="btn btn-primary" onclick="document.location.href='/buattss'">Create TSS</button>
                            <button type="button" class="btn btn-primary" onclick="document.location.href='/Import'">Input Excel</button>
                        </div>

                    </div>
                    <div class="cardsampling">
                        <div class="card-bodysampling">
                            <!-- General Form Elements -->
                            <div class="table__wrapper">
                                <table id="tabel1" class="custom__table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.id</th>
                                            <th scope="col">Nama Sungai</th>
                                            <th scope="col">Nilai Pij</th>
                                            <th scope="col">Status Mutu</th>
                                            <th scope="col">Tanggal Pantau</th>
                                            <th scope="col">Periode</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Pantau as $u) : ?>
                                            <tr>
                                                <td><?= $u['id_tikpan']; ?></td>
                                                <td><?= $u['nama_titikPantau']; ?></td>
                                                <td><?= $u['Nilai_pij']; ?></td>
                                                <td><?= $u['status_mutu']; ?></td>
                                                <td><?= $u['tanggal_pantau']; ?></td>
                                                <td><?= $u['periode_pantau']; ?></td>
                                                <td>

                                                    <div class="button__action__container">
                                                        <form action="/Mutuair/tampilEdit/<?= $u['id_tikpan']; ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-primary custombuttonedit">Update</button>
                                                        </form>

                                                        <form action="/Mutuair/hapusPantau/<?= $u['id_tikpan']; ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form>


                                                    </div>



                                                </td>
                                            </tr>
                                        <?php endforeach; ?>



                                    </tbody>
                                </table>




                                <?= $this->endSection();  ?>