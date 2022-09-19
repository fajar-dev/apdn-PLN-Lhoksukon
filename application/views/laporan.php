<section class="section">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex justify-content-between">
                              <div><h4 class="card-title">Data Laporan Meteran</h4></div>
                              <div><a href="<?php echo base_url('page/csv') ?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet"></i> Export CSV</a></div>

                            </div>
                            <div class="card-body">
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
                                            <?php if($this->session->userdata('level') == 1){ ?>
                                              <th>Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                            $no=1;
                                            foreach($hasil as $data){
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
                                            <?php if($this->session->userdata('level') == 1){ ?>
                                              <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data->id?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                                  <a href="<?php echo base_url('page/hapus/'.$data->id) ?>" class="btn btn-danger btn-del"><i class="bi bi-trash-fill"></i></a>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="edit<?php echo $data->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                      <form action="<?php echo base_url('page/edit_laporan/') ?>" method="POST">
                                                      <input type="hidden" name="id" value="<?php echo $data->id?>" >
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Meteran</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="form-body">
                                                            <div class="col-12 mb-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">ID Pelanggan</label>
                                                                  <input type="text" id="first-name-vertical" class="form-control" name="id_pel" value="<?php echo htmlentities($data->id_pel, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                            <div class="col-12 my-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">No Meter Awal</label>
                                                                  <input type="number" id="first-name-vertical" class="form-control" name="meter_awal" value="<?php echo htmlentities($data->meter_awal, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                            <div class="col-12 my-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">No Meter Akhir</label>
                                                                  <input type="number" id="first-name-vertical" class="form-control" name="ameter_akhir" value="<?php echo htmlentities($data->meter_akhir, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                            <div class="col-12 my-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">Stan Awal</label>
                                                                  <input type="text" id="first-name-vertical" class="form-control" name="stan_awal" value="<?php echo htmlentities($data->stan_awal, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                            <div class="col-12 my-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">Stan Akhir</label>
                                                                  <input type="text" id="first-name-vertical" class="form-control" name="stan_akhir" value="<?php echo htmlentities($data->stan_akhir, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                            <div class="col-12 my-3">
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">Daya Awal</label>
                                                                  <input type="text" id="first-name-vertical" class="form-control" name="daya_awal" value="<?php echo htmlentities($data->daya_awal, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="first-name-vertical">Daya Akhir</label>
                                                                  <input type="text" id="first-name-vertical" class="form-control" name="daya_akhir" value="<?php echo htmlentities($data->daya_akhir, ENT_QUOTES, 'UTF-8');?>" required>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>

                                              </td>
                                            <?php } ?>
                                        </tr>
                                          <?php
                                            }
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>