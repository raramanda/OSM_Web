<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form class="form-inline" action="<?= base_url('admin/reset'); ?>" method="post">
        <div class="form-group mb-2">
          <!-- Warning point -->
          <label for="warning_label" class="sr-only">Sisa Jarak Tempuh</label>
          <input type="text" readonly class="form-control-plaintext" id="warning_label" value="Sisa Jarak Tempuh">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" readonly id="warning" name="warning" value="<?= round((7664234 - $sisa['total']) / 3650); ?>">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" readonly placeholder="Kilo Meters">
        </div>
        <button type="submit" class="btn btn-danger mb-2">Reset</button>
        <!-- Limit point -->
        <div class="form-group mb-2">
          <label for="limit_label" class="sr-only">Sisa Waktu Pemakaian</label>
          <input type="text" readonly class="form-control-plaintext" id="limit_label" value="Sisa Waktu Pemakaian">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" readonly id="dlimit" name="dlimit" value="<?= round((($harimin['time'] + 5184000) - $hari['time']) / 86400); ?>">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" readonly placeholder="Hari">
        </div>
        <button type="submit" class="btn btn-warning mb-2">Reset</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->