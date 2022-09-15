<section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="card">
                              <div class="card-content">
                                  <div class="card-header">
                                      <h4 class="card-title">Pencatatan Data Meteran</h4>
                                  </div>
                                  <div class="card-body">
                                    <?php echo $this->session->flashdata('pesan');?>
                                    <?php echo form_open_multipart('page/tambah');?>
                                          <div class="form-body">
                                          <div class="row">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="id_pel">ID Pelanggan</label>
                                                        <input type="number" id="id_pel" class="form-control" placeholder="ID Pelanggan" name="id_pel">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" id="tanggal" class="form-control" placeholder="Tanggal" name="tanggal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="meter_awal">NO Meteran Awal</label>
                                                        <input type="number" id="meter_awal" class="form-control" placeholder="NO Meteran Awal" name="meter_awal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="meter_akhir">NO Meteran Akhir</label>
                                                        <input type="number" id="meter_akhir" class="form-control" name="meter_akhir" placeholder="NO Meteran Akhir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="stan_awal">Stan Awal</label>
                                                        <input type="text" id="stan_awal" class="form-control" name="stan_awal" placeholder="Stan Awal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="stan_akhir">Stan Akhir</label>
                                                        <input type="text" id="stan_akhir" class="form-control" name="stan_akhir" placeholder="Stan Akhir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="daya_awal">Daya Awal</label>
                                                        <input type="text" id="daya_awal" class="form-control" name="daya_awal" placeholder="Daya Awal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="daya_akhir">Daya Akhir</label>
                                                        <input type="text" id="daya_akhir" class="form-control" name="daya_akhir" placeholder="Daya Akhir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="foto_meter_awal">Foto Meter Awal</label>
                                                        <input type="file" id="foto_meter_awal" class="form-control" name="foto_awal">
                                                        <small class="text-muted">*ekstensi yang diizinkan berupa gif, png, jpeg, jpg</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                      <label for="foto_meter_akhir">Foto Meter Akhr</label>
                                                        <input type="file" id="foto_meter_akhir" class="form-control" name="foto_akhir">
                                                        <small class="text-muted">*ekstensi yang diizinkan berupa gif, png, jpeg, jpg</small>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                      <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>

                                          </div>
                                      <?php echo form_close(); ?>   
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    </section>