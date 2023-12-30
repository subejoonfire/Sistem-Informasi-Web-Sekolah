<div class="popular_program_area section__padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center">
                    <h3>DAFTAR SISWA</h3>
                    <p>Daftar Siswa Sekolah Di SDN Pelaihari 9</p>
                    <br><br>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">



                    <?php foreach ($data->result() as $row) : ?>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="single__program">
                                <div class="program_thumb">
                                    <?php if (empty($row->foto_siswa)) : ?>
                                        <img src="<?php echo base_url() . 'assets/images/blank.png'; ?>" class="img-thumbnail" alt="<?php echo $row->nama_siswa; ?>">
                                    <?php else : ?>
                                        <img src="<?php echo base_url() . 'assets/images/' . $row->foto_siswa; ?>" class="img-thumbnail" alt="<?php echo $row->nama_siswa; ?>">
                                    <?php endif; ?>

                                </div>
                                <div class="program__content">
                                    <span><?php echo $row->nama_kelas; ?></span>
                                    <h4><?php echo $row->nama_siswa; ?></h4>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>

                <nav><?php echo $page; ?></nav>


            </div>



        </div>


    </div>
</div>