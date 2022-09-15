<section class="section">
                      <div class="row">
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldGraph"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sampah Kertas</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo round($kertas->hasil,1); ?> Kg</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                              <i class="iconly-boldGraph"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sampah Plastik</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo round($plastik->hasil,1) ?> Kg</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                              <i class="iconly-boldGraph"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sampah Kaleng</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo round($kaleng->hasil,1) ?> Kg</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldHome"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Afdeling</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo $distrik ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon">
                                              <i class="iconly-boldGraph"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sampah Terkumpul</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo round($total->hasil,1); ?> Kg</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Statistik Pencatatan</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Statistik Jenis Sampah</h4>
                                </div>
                                <div class="card-body">
                                  <div id="chart-visitors-profile"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>