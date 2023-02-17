<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("dashboard/_part/head"); ?>


  <!-- Google Font -->

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
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
        <h1>Pengajuan Anggaran</h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-2">
            <a href="<?php echo site_url('SearchController2/'); ?>" class="btn btn-block btn-info"></i> Filter Minggu</a>
            <a href="<?php echo site_url('SearchController/'); ?>" class="btn btn-block btn-info"></i> Filter Bulan</a>
          </div>
        </div><br>
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="card mb-3">
            <div class="card-header">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">

                <i class="fa fa-fw fa-plus"></i> Pengajuan Anggaran

              </button>

            </div>


            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Pengajuan</th>
                      <th>Minggu Ke</th>
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
                        <td>
                          <?php echo $pengajuan_anggaran->id_pengajuan ?>
                        </td>
                        <td>
                          <?php echo $pengajuan_anggaran->minggu2 ?>
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
                          <?php echo  $pengajuan_anggaran->total_pengajuan2 != null ?  'Rp. ' . number_format($pengajuan_anggaran->total_pengajuan2, 2, ',', '.') : ''; ?>
                        </td>
                        <td>
                          <?php
                          $array = array_intersect(array($pengajuan_anggaran->status2), array_flip($status));


                          if (!empty($array)) {

                            echo $status[$array[0]];
                          }
                          ?>
                        </td>



                        <td class="small">
                        <td width="250">
                          <a href="<?php echo site_url('C_ajuananggaran/update_datapengajuan/') . $pengajuan_anggaran->id_pengajuan; ?>" class="btn btn-small"><i class="fas fa-edit"></i> Detail anggaran</a>
                          <?php
                          if ($pengajuan_anggaran->status2 < 2) {
                          ?>
                            <a href="<?php echo site_url('C_ajuananggaran/delete_datapengajuan/') . $pengajuan_anggaran->id_pengajuan; ?>"><i class="fas fa-trash"></i> Hapus</a>

                          <?php
                          }

                          ?>

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
      </section>


    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Create by</b> Mahasiswa UNS 2020.
      </div>
      <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PLN ASTER</a>.</strong> All rights
      reserved.
    </footer>
  </div>



  <!-- /.row (main row) -->


  <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-info">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Menambahkan Ajuan?</h4>
        </div>
        <form class="form-horizontal" id="aju" action="<?php echo site_url('C_ajuananggaran/add_datapengajuan'); ?>" method="post">
          <div class="content">


            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="minggu2" class="col-sm-3  control-label">Minggu</label>

                  <div class="col-sm-9">

                    <select name="minggu2" id="minggu2" class="form-control" required>
                      <option value="" selected disabled>=== Pilih Minggu ==</option>
                      <?php foreach ($minggu as $mingguu) : ?>
                        <option <?= set_select('minggu2', $mingguu); ?> value="<?= $mingguu ?>">Minggu ke -<?= $mingguu; ?></option>
                      <?php endforeach; ?>

                    </select>


                  </div>
                </div>

                <div class=" form-group">
                  <label for="tanggal_mulai2" class="col-sm-3  control-label">Tanggal Mulai</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="tanggal_mulai2" id="tanggal_mulai2" placeholder="tanggal mulai" required>

                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="bulan2" class="col-sm-3 control-label">Bulan</label>
                  <div class="col-sm-9">
                    <select name="bulan2" id="bulan2" class="form-control" required>
                      <option value="" selected disabled>=== Pilih Bulan ==</option>
                      <?php foreach ($bulan as $bulann) : ?>

                        <option <?= set_select('bulan2', $bulann); ?> value="<?= $bulann ?>"><?= $bulann; ?></option>
                      <?php endforeach; ?>
                    </select>


                  </div>
                </div>

                <div class="form-group">
                  <label for="tanggal_sampai2" class="col-sm-3  control-label">Tanggal Sampai</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="tanggal_sampai2" id="tanggal_sampai2" placeholder="tanggal sampai" required>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Save changes</button>


          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- Add the sidebar's background. This div must be placed -->

  <div class="control-sidebar-bg"></div>
  </div>





  <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>