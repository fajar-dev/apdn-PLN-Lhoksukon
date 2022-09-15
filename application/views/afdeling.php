<section class="section">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex justify-content-between">
                              <div><h4 class="card-title">Data pencatatan Sampah</h4></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Waktu</th>
                                            <th>Jenis</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Berat</th>
                                            <th>Foto</th>
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
                                            <td><?php echo date('d F Y', strtotime($data->waktu)); ?></td>
                                            <td><?php echo $data->jenis;?></td>
                                            <td><?php echo htmlentities($data->pj, ENT_QUOTES, 'UTF-8');?></td>
                                            <td><?php echo htmlentities($data->berat, ENT_QUOTES, 'UTF-8');?> Kg</td>
                                            <td>
                                                <a href="<?php echo base_url('file/'.$data->foto) ?>" class="test-popup-link"><img src="<?php echo base_url('file/'.$data->foto) ?>" width="50px" class="img-fluid" alt="Foto Sampah"></a>
                                            </td>
                                            <?php if($this->session->userdata('level') == 1){ ?>
                                              <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                  <a href="<?php echo base_url('page/hapus_sampah/'.$get.'/'.$data->id) ?>" class="btn btn-danger btn-del"><i class="bi bi-trash-fill"></i></a>
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