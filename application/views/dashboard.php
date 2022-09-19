<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div><h4 class="card-title">Log Pencatatan</h4></div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>ID Pelanggan</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                                        <?php
                                            $no=1;
                                            foreach($hasil as $data){
                                        ?>
                          <tr>
                            <td class="text-bold-500"><?= $no++ ?></td>
                            <td><?php echo htmlentities($data->log_petugas, ENT_QUOTES, 'UTF-8');?></td>
                            <td class="text-bold-500"><?php echo htmlentities($data->id_pel, ENT_QUOTES, 'UTF-8');?></td>
                            <td><?php echo htmlentities($data->tanggal, ENT_QUOTES, 'UTF-8');?></td>
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
        <div class="col-lg-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                <img src="<?php echo base_url()?>assets/images/faces/1.jpg">
                                </div>
                                <div class="ms-3 name">
                                <h5 class="font-bold"><?= $this->session->userdata('nama') ?></h5>
                                <h6 class="text-muted mb-0">
                                    <?php 
                                        if( $this->session->userdata('level') == 1){
                                            echo 'Admin';
                                        }elseif( $this->session->userdata('level') == 2){
                                            echo 'Petugas';
                                        }
                                    ?>
                            
                                </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>Log Aktifitas</h4>
                        </div>
                        <div class="card-content pb-4">
                                         <?php
                                            $no=1;
                                            foreach($login as $data){
                                        ?>
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="<?php echo base_url()?>assets/images/faces/1.jpg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?> <small>( 
                                        <?php 
                                        if( $data->level == 1){
                                            echo 'Admin';
                                        }elseif( $data->level == 2){
                                            echo 'Petugas';
                                        }
                                        ?>
                                    )</small></h5>
                                    <h6 class="text-muted mb-0">
                                    <?php echo htmlentities($data->date, ENT_QUOTES, 'UTF-8');?>
                                    </h6>
                                </div>
                            </div>
                                    <?php
                                            }
                                    ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>