<?php
function limit_words($string, $word_limit)
{
  $words = explode(" ", $string);
  return implode(" ", array_splice($words, 0, $word_limit));
}

?>
<div id="content">


  <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
      </div>
      <div class="card-body">

        <div class="box-header">
          <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'admin/berita/add_berita' ?>"><span class="fa fa-plus"></span> Tambah berita</a>
        </div>

        <br>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Oleh Admin</th>
                <th>Tanggal</th>
                <th style="text-align:right;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $i) :
                $no++;
                $id_berita = $i['id_berita'];
                $judul_berita = $i['judul_berita'];
                $isi_berita = $i['isi_berita'];
                $user_id = $i['id_admin'];
                $user_nama = $i['nama_admin'];
                $tanggal_berita = $i['tanggal'];
                $gambar_berita = $i['gambar_berita'];

              ?>
                <tr>
                  <td><img src="<?php echo base_url() . 'assets/images/' . $gambar_berita; ?>" style="width:90px;"></td>
                  <td><?php echo $judul_berita; ?></td>
                  <td><?php echo $user_nama; ?></td>
                  <td><?php echo $tanggal_berita; ?></td>
                  <td style="text-align:right;">

                    <a href="<?php echo base_url() . 'admin/berita/get_edit/' . $id_berita; ?>" class="btn btn-info btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id_berita; ?>">
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

  <?php foreach ($data->result_array() as $i) :
    $id_berita = $i['id_berita'];
    $judul_berita = $i['judul_berita'];
    $gambar_berita = $i['gambar_berita'];
  ?>
    <!--Modal Hapus admin-->
    <div class="modal fade" id="ModalHapus<?php echo $id_berita; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/berita/hapus_berita' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id_berita; ?>" />
              <input type="hidden" value="<?php echo $gambar_berita; ?>" name="gambar">
              <p>Apakah Anda yakin mau menghapus Postingan ? <b><?php echo $judul_berita; ?></b> ?</p>

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