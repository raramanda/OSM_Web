<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12">
      <?= $this->session->flashdata('message3'); ?>
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Estimasi Penggunaan</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart" width="19" height="5"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12">
      <div class="table-box">
        <div class="table-row table-head">
          <div class="table-cell first-cell">
            <p>No</p>
          </div>
          <div class="table-cell">
            <p>Waktu Pemakaian</p>
          </div>
          <div class="table-cell last-cell">
            <p>Tanggal Pemakaian</p>
          </div>
          <div class="table-cell last-cell">
            <p>Jarak Yang Ditempuh</p>
          </div>
          <div class="table-cell last-cell">
            <p>Jarak Yang tersisa</p>
          </div>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($tobs as $t) : ?>
          <div class="table-row">
            <div class="table-cell first-cell">
              <p><?= $i; ?></p>
            </div>
            <div class="table-cell">
              <p><?= date('H:i:s', $t['time']); ?></p>
            </div>
            <div class="table-cell">
              <p><?= date('d M y', $t['time']); ?></p>
            </div>
            <div class="table-cell">
              <p><?= round($t['total'] * (31 / 100000), 1); ?> KM</p>
            </div>
            <div class="table-cell last-cell">
              <p><?= round((6774194 - $t['total']) * (31 / 100000), 1); ?> KM</p>
            </div>
          </div>
          <?php $i++; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->