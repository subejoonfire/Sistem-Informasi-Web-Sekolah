<div id="content">



  <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
      </div>
      <div class="card-body">

        <div class="box-header">
          <a href="#" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Galeri</a>
        </div>

        <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Oleh Admin</th>
                  <th>Tanggal Posting</th>
                  <th style="text-align:right;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                    $id_galeri = $i['id_galeri'];
                    $judul_galeri = $i['judul_galeri'];
                    $user_id = $i['id_admin'];
                    $user_nama = $i['nama_admin'];
                    $gambar_galeri = $i['gambar_galeri'];
                    $tanggal_galeri= $i['tanggal'];
                ?>
                    <tr>
                      <td><img src="<?php echo base_url() . 'assets/images/' . $gambar_galeri; ?>" width="120px"></td>
                      <td><?php echo $judul_galeri; ?></td>
                      <td><?php echo $user_nama;?></td>
                      <td><?php echo $tanggal_galeri;?></td>
                      <td style="text-align:right;">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $id_galeri; ?>">
                          <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                          </span>
                          <span class="text">Edit</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id_galeri; ?>">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Hapus</span>
                        </a>


                      </td>
                    </tr>
                <?php
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Foto</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/simpan_galeri' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
              <div class="col-sm-7">
                <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto" required />
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

  <!--Modal Edit Album-->
  <?php foreach ($data->result_array() as $i) :
    $id_galeri = $i['id_galeri'];
    $judul_galeri = $i['judul_galeri'];
    $gambar_galeri = $i['gambar_galeri'];

  ?>

    <div class="modal fade" id="ModalEdit<?php echo $id_galeri; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Foto</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/update_galeri' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id_galeri; ?>" />
              <input type="hidden" value="<?php echo $gambar_galeri; ?>" name="gambar">
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                <div class="col-sm-7">
                  <input type="text" name="xjudul" class="form-control" value="<?php echo $judul_galeri; ?>" id="inputUserName" placeholder="Judul" required>
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
    $id_galeri = $i['id_galeri'];
    $judul_galeri = $i['judul_galeri'];
    $gambar_galeri = $i['gambar_galeri'];

  ?>
    <!--Modal Hapus admin-->
    <div class="modal fade" id="ModalHapus<?php echo $id_galeri; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Foto</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/hapus_galeri' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id_galeri; ?>" />
              <input type="hidden" value="<?php echo $gambar_galeri; ?>" name="gambar">
              <p>Apakah Anda yakin mau menghapus Foto <b><?php echo $judul_galeri; ?></b> ?</p>

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