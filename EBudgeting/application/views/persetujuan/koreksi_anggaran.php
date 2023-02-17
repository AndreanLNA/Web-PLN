<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("dashboard/_part/head"); ?>


  <!-- Google Font -->


</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <?php
    if ($this->session->userdata('id_jabatan') == 1) {
      $this->load->view('dashboard/sidebarnav/_headsubbidang');
    } else if ($this->session->userdata('id_jabatan') == 2) {
      $this->load->view('dashboard/sidebarnav/_headdm');
    } else if ($this->session->userdata('id_jabatan') == 3) {
      $this->load->view('dashboard/sidebarnav/_headdmpau');
    }

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Koreksi Anggaran</h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="card mb-3">



                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Pengajuan</th>
                          <th>Bulan</th>
                          <th>Pengajuan</th>
                          <th>Tanggal Mulai </th>
                          <th>Tanggal Sampai </th>
                          <th>Total </th>

                          <th>Status </th>
                          <th>Aksi</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($pengajuan_anggaran as $pengajuan_anggaran) : ?>

                          <tr>
                            <td width="150">
                              <?php echo $pengajuan_anggaran->id_pengajuan ?>
                            </td>
                            <td>
                              <?php echo $pengajuan_anggaran->bulan2 ?>
                            </td>
                            <td>
                              <?php echo $pengajuan_anggaran->tgl_pengajuan2 ?>
                            </td>
                            <td>
                              <?php echo $pengajuan_anggaran->tanggal_mulai2 ?>
                            </td>
                            <td>
                              <?php echo $pengajuan_anggaran->tanggal_sampai2 ?>
                            </td>
                            <td>
                              <?php echo $pengajuan_anggaran->total_pengajuan2 ?>
                            </td>
                            <td>

                              <?php
                              if ($pengajuan_anggaran->status2 == 5) {
                              ?>
                                <span class="btn btn-danger"><i class="fa fa-fw fa-warning"></i> Permohonan Koreksi oleh DM</span>
                              <?php
                              } else if ($pengajuan_anggaran->status2 == 6) {
                              ?>
                                <p class="btn btn-danger"><i class="fa fa-fw fa-warning"></i> Permohonoan Koreksi oleh DMPAU</p>
                              <?php
                              }
                              ?>
                            </td>
                            <td width="250">
                              <a href="<?php echo site_url('C_koreksi_anggaran/update_koreksi/') . $pengajuan_anggaran->id_pengajuan . '/' . $pengajuan_anggaran->status2; ?>" class="btn btn-small"><i class="fas fa-edit"></i> Detail anggaran</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box -->

          </div>


        </div>
        <!-- /.row -->
      </section>

      <!-- right col -->
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Create by</b> Mahasiswa UNS 2020.
      </div>
      <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
      reserved.
    </footer>

    <!-- /.row (main row) -->


    <!-- /.content -->
  </div>

  <!-- Add the sidebar's background. This div must be placed -->

  <div class="control-sidebar-bg"></div>
  </div>





  <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>