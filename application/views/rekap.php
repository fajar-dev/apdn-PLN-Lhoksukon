<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div><h4 class="card-title">Data Laporan Periode</h4></div>
        </div>
        <div class="card-body">
        <form action="" method="post">
          <div class="row g-3">
            <div class="col">
              <label>Dari :</label>
              <input type="date" class="form-control" name="dari" value="<?php if(isset($dari)){ echo $dari; } ?>" required>
            </div>
            <div class="col">
              <label>sampai :</label>
              <input type="date" class="form-control" name="sampai" value="<?php if(isset($sampai)){ echo $sampai; } ?>" required>
            </div>
          </div>
          <div class="text-end">
          <button class="btn btn-primary my-3 text-center" name="submit">Tampilkan </button>
          </div>
        </form>

                              <?php if (isset($harian)) { ?>
                                <div class="text-center">
                                  <a href="<?php echo base_url('page/csv_rekap') ?>/<?php echo $dari?>/<?php echo $sampai?>" class="btn btn-success w-25"><i class="bi bi-file-earmark-spreadsheet"></i> Export CSV</a>
                                </div>
                                <table class="table table-striped" id="table1">
                                <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ID Pel</th>
                                            <th>No Meter Awal</th>
                                            <th>No Meter Akhir</th>
                                            <th>stan Awal</th>
                                            <th>Stan Akhir</th>
                                            <th>Daya Awal</th>
                                            <th>Daya Akhir</th>
                                            <th>Foto Meteran Awal</th>
                                            <th>Foto Meteran Akhir</th>
                                            <th>tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                            $no=1;
                                            foreach($harian as $data){
                                          ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo htmlentities($data->id_pel, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->meter_awal, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->meter_akhir, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->stan_awal, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->stan_akhir, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->daya_awal, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->daya_akhir, ENT_QUOTES, 'UTF-8');?></td>
                                            <td>
                                                <a href="<?php echo base_url('file/'.$data->foto_awal) ?>" class="test-popup-link"><img src="<?php echo base_url('file/'.$data->foto_awal) ?>" width="50px" class="img-fluid" alt="Foto Sampah"></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('file/'.$data->foto_akhir) ?>" class="test-popup-link"><img src="<?php echo base_url('file/'.$data->foto_akhir) ?>" width="50px" class="img-fluid" alt="Foto Sampah"></a>
                                            </td>
                                            <td><?php echo date('d F Y', strtotime($data->tanggal)); ?></td>
                                        </tr>
                                          <?php
                                            }
                                          ?>
                                    </tbody>
                                </table>
                              <?php } ?> 
        </div>
      </div>
    </div>
  </div>
</section>