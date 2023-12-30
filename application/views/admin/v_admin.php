<div id="content">




    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">

                <div class="box-header">
                    <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Tambah Admin</a>
                </div>

                <br>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Password</th>
                                <th>Kontak</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result_array() as $i) :
                                $id_admin = $i['id_admin'];
                                $nama_admin = $i['nama_admin'];
                                $jenkel_admin = $i['jenkel_admin'];
                                $email_admin = $i['email_admin'];
                                $username_admin = $i['username_admin'];
                                $password_admin = $i['password_admin'];
                                $nohp_admin = $i['nohp_admin'];
                                $foto_admin = $i['foto_admin'];
                            ?>
                                <tr>
                                    <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $foto_admin; ?>"></td>
                                    <td><?php echo $nama_admin; ?></td>
                                    <td><?php echo $email_admin; ?></td>
                                    <?php if ($jenkel_admin == 'L') : ?>
                                        <td>Laki-Laki</td>
                                    <?php else : ?>
                                        <td>Perempuan</td>
                                    <?php endif; ?>
                                    <td><?php echo $password_admin; ?></td>
                                    <td><?php echo $nohp_admin; ?></td>
                                    <td style="text-align:right;">

                                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $id_admin; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <a href="<?php echo base_url() . 'admin/admin/reset_password/' . $id_admin; ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fa-refresh"></i>
                                            </span>
                                            <span class="text">Reset</span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id_admin; ?>">
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

    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah admin</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/admin/simpan_admin' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" name="xemail" class="form-control" id="inputEmail3" placeholder="Email" required>
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
                            <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                            <div class="col-sm-7">
                                <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkontak" class="form-control" id="inputUserName" placeholder="Kontak Person" required>
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


    <?php foreach ($data->result_array() as $i) :
        $id_admin = $i['id_admin'];
        $nama_admin = $i['nama_admin'];
        $jenkel_admin = $i['jenkel_admin'];
        $email_admin = $i['email_admin'];
        $username_admin = $i['username_admin'];
        $password_admin = $i['password_admin'];
        $nohp_admin = $i['nohp_admin'];
        $foto_admin = $i['foto_admin'];
    ?>
        <!--Modal Edit admin-->
        <div class="modal fade" id="ModalEdit<?php echo $id_admin; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/admin/update_admin' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="kode" value="<?php echo $id_admin; ?>" />
                                    <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $nama_admin; ?>" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="xemail" class="form-control" value="<?php echo $email_admin; ?>" id="inputEmail3" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-7">
                                    <?php if ($jenkel_admin == 'L') : ?>
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
                                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xusername" class="form-control" value="<?php echo $username_admin; ?>" id="inputUserName" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xkontak" class="form-control" value="<?php echo $nohp_admin; ?>" id="inputUserName" placeholder="Kontak Person" required>
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
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($data->result_array() as $i) :
        $id_admin = $i['id_admin'];
        $nama_admin = $i['nama_admin'];
        $jenkel_admin = $i['jenkel_admin'];
        $email_admin = $i['email_admin'];
        $username_admin = $i['username_admin'];
        $password_admin = $i['password_admin'];
        $nohp_admin = $i['nohp_admin'];
        $foto_admin = $i['foto_admin'];
    ?>
        <!--Modal Hapus admin-->
        <div class="modal fade" id="ModalHapus<?php echo $id_admin; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/admin/hapus_admin' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id_admin; ?>" />
                            <p>Apakah Anda yakin mau menghapus admin <b><?php echo $nama_admin; ?></b> ?</p>

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

    <!--Modal Reset Password-->
    <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                </div>

                <div class="modal-body">

                    <table>
                        <tr>
                            <th style="width:120px;">Username</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('uname'); ?></th>
                        </tr>
                        <tr>
                            <th style="width:120px;">Password Baru</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('upass'); ?></th>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>