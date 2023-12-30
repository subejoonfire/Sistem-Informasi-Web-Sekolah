<!-- application/views/admin/v_dashboard.php -->

<div id="content">
  <div class="container-fluid">
    <!-- ... (content area) ... -->

    <div class="row">
      <div class="col-md-12">
        <!-- Card untuk Tabel -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
          </div>
          <div class="card-body">
            <!-- Menambahkan kotak "Jumlah Guru" di dalam card-body -->
            <div class="row">
              <div class="col-md-3">
                <div class="card shadow mb-4">
                  <div class="card-header bg-info text-white">
                    <h6 class="m-0 font-weight-bold">Jumlah Guru</h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <i class="bx bxs-group" style="font-size: 2rem;"></i>
                      <div class="text-right">
                        <h3 class="card-title"><?= $jumlah_guru ?></h3>
                        <p class="card-text">Total Guru</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>