<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form class="form-inline" action="<?= base_url('admin/config'); ?>" method="post">
        <div class="form-group mb-2">
          <!-- Warning point -->
          <label for="warning_label" class="sr-only">Warning Point</label>
          <input type="text" disabled class="form-control-plaintext" id="warning_label" value="Warning Point">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="warning" name="warning" value="<?= round($ddata['warning'] / $ddata['counter']); ?>">
          <?= form_error('warning', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" disabled placeholder="Kilo Meters">
        </div>
        <button hidden type="submit" class="btn btn-primary mb-2">Update</button>
        <!-- Limit point -->
        <div class="form-group mb-2">
          <label for="limit_label" class="sr-only">Limit Point</label>
          <input type="text" disabled class="form-control-plaintext" id="limit_label" value="Limit Point">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="dlimit" name="dlimit" value="<?= round($ddata['Dlimit'] / $ddata['counter']); ?>">
          <?= form_error('dlimit', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" disabled placeholder="Kilo Meters">
        </div>
        <button hidden type="submit" class="btn btn-warning mb-2">Update</button>
        <!-- Update Frequency -->
        <div class="form-group mb-2">
          <label for="warning_label" class="sr-only">Update Frequency Per</label>
          <input type="text" disabled class="form-control-plaintext" id="update_label" value="Update Frequency Per">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="dupdate" name="dupdate" value="<?= round($ddata['Dupdate'] / $ddata['counter'] * 1000); ?>">
          <?= form_error('dupdate', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" disabled placeholder="Meters">
        </div>
        <button type="submit" class="btn btn-success mb-2">Update</button>
      </form>
    </div>
  </div>
  <br><br>
  <hr>
  <h1 class="h3 mb-4 text-gray-800">Tire Calculator</h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message1'); ?>
      <form class="form-inline" action="<?= base_url('admin/tire'); ?>" method="post">
        <div class="form-group mb-2">
          <!-- Warning point -->
          <label for="warning_label" class="sr-only">Tinggi Ban</label>
          <input type="text" disabled class="form-control-plaintext" id="warning_label" value="Ukuran Ban">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="tinggi" name="tinggi" value="<?= round($ban['tinggi']); ?>">
          <?= form_error('warning', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="lebar" name="lebar" value="<?= round($ban['lebar']); ?>">
        </div>
        <button hidden type="submit" class="btn btn-primary mb-2">Update</button>
        <!-- Limit point -->
        <div class="form-group mb-2">
          <label for="limit_label" class="sr-only">Ukuran Velg</label>
          <input type="text" disabled class="form-control-plaintext" id="velg_label" value="Ukuran Velg">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="velg" name="velg" value="<?= round($ban['velg']); ?>">
          <?= form_error('dlimit', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" disabled placeholder="Inch">
        </div>
        <button hidden type="submit" class="btn btn-warning mb-2">Update</button>
        <!-- Update Frequency -->
        <div class="form-group mb-2">
          <label for="warning_label" class="sr-only">Update Frequency Per</label>
          <input type="text" disabled class="form-control-plaintext" id="update_label" value="Update Frequency Per">
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" id="spoke" name="spoke" value="<?= round($ban['spoke']); ?>">
          <?= form_error('dupdate', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group mx-sm-1 mb-2">
          <input type="text" class="form-control" disabled placeholder="">
        </div>
        <button type="submit" class="btn btn-success mb-2">Save</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->