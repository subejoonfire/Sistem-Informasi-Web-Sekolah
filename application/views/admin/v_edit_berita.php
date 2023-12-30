<div id="content">
     
        
<div class="container-fluid">

    <?php
        $b=$data->row_array();
    ?>
		<form action="<?php echo base_url().'admin/berita/update_berita'?>" method="post" enctype="multipart/form-data">
        
     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">
            
                
                    
            <div class="box-body">
          <div class="row">
            <div class="col-md-10">
              <input type="hidden" name="kode" value="<?php echo $b['id_berita'];?>">
              <input type="text" name="xjudul" class="form-control" value="<?php echo $b['judul_berita'];?>" placeholder="Judul berita atau artikel" required/>
            </div>
            <!-- /.col -->
            <div class="col-md-2">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
              
            </div>
          </div></div>
    
    
    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tulis Berita</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <textarea class="ckeditor" id="ckeditor" name="xisi" required><?php echo $b['isi_berita'];?></textarea>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pilih Gambar</h6>
                  
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  

			  <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="filefoto" style="width: 100%;">
              </div>
                  
                    
                </div>
              </div>
            </div>
          </div>
          <!-- DataTales Example -->
    </form>

        </div>
   
