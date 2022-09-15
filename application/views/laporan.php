<section class="section">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex justify-content-between">
                              <div><h4 class="card-title">Data pencatatan Sampah</h4></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="example">
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
                                                  <a href="<?php echo base_url('page/hapus/'.$data->id) ?>" class="btn btn-danger btn-del"><i class="bi bi-trash-fill"></i></a>
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