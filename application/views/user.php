<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div><h4 class="card-title">Data user</h4></div>
          <div><button type="button" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary btn-sm"><strong>+</strong> Tambah Data</button></div>
                <!-- Modal -->
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <form action="<?php echo base_url('page/tambah_user/') ?>" method="POST">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-body">
                            <div class="col-12 mb-3">
                              <div class="form-group">
                                  <label for="first-name-vertical">Nama</label>
                                  <input type="text" id="first-name-vertical" class="form-control" name="nama"  required>
                              </div>
                            </div>
                            <div class="col-12 mb-2">
                              <div class="form-group">
                                  <label for="first-name-vertical">Jenis Kelamin</label>
                                  <select class="form-select" name="jk">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-12 my-3">
                              <div class="form-group">
                                  <label for="first-name-vertical">Alamat</label>
                                  <input type="text" id="first-name-vertical" class="form-control" name="alamat"  required>
                              </div>
                            </div>
                            <div class="col-12 my-3">
                              <div class="form-group">
                                  <label for="first-name-vertical">Username</label>
                                  <input type="text" id="first-name-vertical" class="form-control" name="username"  required>
                              </div>
                            </div>
                            <div class="col-12 my-3">
                              <div class="form-group">
                                  <label for="first-name-vertical">Password</label>
                                  <input type="password" id="first-name-vertical" class="form-control" name="password"  required>
                              </div>
                            </div>
                            <div class="col-12 mb-2">
                              <div class="form-group">
                                  <label for="first-name-vertical">Level</label>
                                  <select class="form-select" name="level">
                                    <option value="1">Admin</option>
                                    <option value="2">Petugas</option>
                                  </select>
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
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $no=1;
                      foreach($hasil as $data){
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo htmlentities($data->username, ENT_QUOTES, 'UTF-8');?></td>
                        <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
                        <td><?php echo $data->jk;?></td>
                        <td><?php echo htmlentities($data->alamat, ENT_QUOTES, 'UTF-8');?></td>
                        <td><?php if($data->level == 1){ echo'admin'; }elseif($data->level == 2){ echo'Petugas'; } ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data->id?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                            <a href="<?php echo base_url('page/hapus_user/'.$data->id) ?>" class="btn btn-danger btn-del"><i class="bi bi-trash-fill"></i></a>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="edit<?php echo $data->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <form action="<?php echo base_url('page/edit_user/') ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $data->id?>" >
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Distrik</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-body">
                                      <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="nama" value="<?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?>" required>
                                        </div>
                                      </div>
                                      <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jenis Kelamin</label>
                                            <select class="form-select" name="jk">
                                              <?php if($data->jk == 'Laki-Laki') { ?>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                              <?php }elseif($data->jk == 'Perempuan'){?>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-12 my-3">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Alamat</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="alamat" value="<?php echo htmlentities($data->alamat, ENT_QUOTES, 'UTF-8');?>" required>
                                        </div>
                                      </div>
                                      <div class="col-12 my-3">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Username</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="username" value="<?php echo htmlentities($data->username, ENT_QUOTES, 'UTF-8');?>" required>
                                        </div>
                                      </div>
                                      <div class="col-12 my-3">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Password</label>
                                            <input type="password" id="first-name-vertical" class="form-control" name="password" placeholder="***">
                                        </div>
                                      </div>
                                      <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Level</label>
                                            <select class="form-select" name="level">
                                              <?php if($data->level == 1) { ?>
                                                <option value="1">Admin</option>
                                                <option value="2">Petugas</option>
                                              <?php }elseif($data->level == 2){?>
                                                <option value="2">Petugas</option>
                                                <option value="1">Admin</option>
                                              <?php } ?>
                                            </select>
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