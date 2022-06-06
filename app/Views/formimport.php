
<?= $this->extend('viewimport'); ?>

<?= $this->section('isi'); ?>

<div class="col-lg-12">

<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Import Data</h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text">
        <form action="/import/upload" class="" method="post" enctype="multipart/form-data">
        <?= form_open_multipart('Import/upload')?>
        <?php
            $session = \Config\Services::session();
            if(!empty($session->getFlashdata('pesan'))){
                echo '<div class="alert alert-danger" role="alert">
                '.$session->getFlashdata('pesan').'

                </div>';
            }

            if(!empty($session->getFlashdata('sukses'))){
                echo '<div class="alert alert-success" role="alert">
                '.$session->getFlashdata('sukses').'

                </div>';
            }
        ?>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Import Excel</label>
            <div class="col-sm-4">
                <input type="file" name="fileimport" class="fileimport" class="form-control" requiredaccept=".xls, .xlsx">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
               <button type="submit" class="btn btn-success">submit</button>
            </div>
        </div>

        <?= form_close(); ?>
        </form>

        
        <h5>Download Template Excel</h5>

        <a href="<?= base_url('/Downloadtemplate/proses_download'); ?>" >Download File</a>

    </p>



  </div>
</div>
</div>


<?= $this->endSection(); ?>
