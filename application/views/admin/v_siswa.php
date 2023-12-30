<div id="content">



  <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
      </div>
      <div class="card-body">

        <div class="box-header">
          <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Data Siswa</a>
        </div><br>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data->result_array() as $i) :
                $id = $i['id_siswa'];
                $nis = $i['nis_siswa'];
                $nama = $i['nama_siswa'];
                $jenkel = $i['jenkel_siswa'];
                $id_kelas = $i['id_kelas'];
                $nama_kelas = $i['nama_kelas'];
                $photo = $i['foto_siswa'];

              ?>

                <tr>
                  <th><?php echo $no++ ?></th>
                  <?php if (empty($photo)) : ?>
                    <td><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                  <?php else : ?>
                    <td><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $photo; ?>" width="50px"></td>
                  <?php endif; ?>
                  <td><?php echo $nis; ?></td>
                  <td><?php echo $nama; ?></td>
                  <?php if ($jenkel == 'L') : ?>
                    <td>Laki-Laki</td>
                  <?php else : ?>
                    <td>Perempuan</td>
                  <?php endif; ?>

                  <td><?php echo $nama_kelas; ?></td>
                  <td style="text-align:right;">

                    <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">
                      <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Hapus</span>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/simpan_siswa' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                <div class="col-sm-7">
                  <input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIS" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-7">
                  <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                    <label for="inlineRadio1"> Laki-Laki </label>
                  </div>
                  <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                    <label for="inlineRadio2"> Perempuan </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
                <div class="col-sm-7">
                  <select name="xkelas" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <?php
                    foreach ($kelas->result_array() as $k) {
                      $id_kelas = $k['id_kelas'];
                      $nm_kelas = $k['nama_kelas'];

                    ?>
                      <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                <div class="col-sm-7">
                  <input type="file" name="filefoto" />
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php foreach ($data->result_array() as $i) :
      $id = $i['id_siswa'];
      $nis = $i['nis_siswa'];
      $nama = $i['nama_siswa'];
      $jenkel = $i['jenkel_siswa'];
      $id_kelas = $i['id_kelas'];
      $photo = $i['foto_siswa'];
    ?>

      <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Siswa</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/update_siswa' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">NIS</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnis" value="<?php echo $nis; ?>" class="form-control" id="inputUserName" placeholder="NIS" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="inputUserName" placeholder="Nama" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <?php if ($jenkel == 'L') : ?>
                      <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                        <label for="inlineRadio1"> Laki-Laki </label>
                      </div>
                      <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                        <label for="inlineRadio2"> Perempuan </label>
                      </div>
                    <?php else : ?>
                      <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                        <label for="inlineRadio1"> Laki-Laki </label>
                      </div>
                      <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                        <label for="inlineRadio2"> Perempuan </label>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Kelas</label>
                  <div class="col-sm-7">
                    <select name="xkelas" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <?php
                      foreach ($kelas->result_array() as $k) {
                        $id_kelas = $k['id_kelas'];
                        $nm_kelas = $k['nama_kelas'];

                      ?>
                        <?php if ($id_kelas == $id_kelas) : ?>
                          <option value="<?php echo $id_kelas; ?>" selected><?php echo $nm_kelas; ?></option>
                        <?php else : ?>
                          <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                        <?php endif; ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                  <div class="col-sm-7">
                    <input type="file" name="filefoto" />
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!--Modal Edit Album-->

    <?php foreach ($data->result_array() as $i) :
      $id = $i['id_siswa'];
      $nis = $i['nis_siswa'];
      $nama = $i['nama_siswa'];
      $jenkel = $i['jenkel_siswa'];
      $id_kelas = $i['id_kelas'];
      $photo = $i['foto_siswa'];
    ?>
      <!--Modal Hapus admin-->
      <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Siswa</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/siswa/hapus_siswa' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                <p>Apakah Anda yakin mau menghapus Siswa <b><?php echo $nama; ?></b> ?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>