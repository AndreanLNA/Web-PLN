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


    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Welcome Sub Bidang</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?php echo site_url("C_masterpos_subpos/show_pos"); ?>"><i class="fa fa-circle-o"></i> POS</a></li>
              <li><a href="<?php echo site_url("C_masterpos_subpos/show_subpos"); ?>"><i class="fa fa-circle-o"></i> Sub Pos</a></li>
              <li><a href="<?php echo site_url("C_masterpos_subpos/show_subpos2"); ?>"><i class="fa fa-circle-o"></i> Sub Pos Barang </a></li>
            </ul>
          </li>
          <li class=" active treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>Rekapitulasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Rekap Pos Anggaran</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Rekap Anggaran </a></li>
            </ul>
          </li>
          <li>
            <a href="<?php echo site_url('C_ajuananggaran/show_datapengajuan'); ?>">
              <i class="fa fa-check"></i> <span>Pengajuan Anggaran</span>
              <span class="pull-right-container">
                <span class="pull-right-container">
                </span>
            </a>
          </li>
          <li>
            <a href="pages/widgets.html">
              <i class="fa fa-th"></i> <span>Koreksi Anggaran</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url("C_menutransfer"); ?>">
              <i class="fa fa-edit"></i> <span>Transfer</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li>
            <a href="pages/widgets.html">
              <i class="fa fa-laptop"></i> <span>Setting Pagu Anggaran</span>
              <span class="pull-right-container">
              </span>
            </a>

          </li>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>DM/ Bidang</small>
        </h1>
      </section>
      <section class="content">
        <!-- DataTables -->
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
                        if ($pengajuan_anggaran->status2 == 0) {
                        ?>
                          <span class="btn btn-danger"><i class="fa fa-fw fa-warning"></i> Belum Diajukan</span>
                        <?php
                        } else if ($pengajuan_anggaran->status2 == 1) {
                        ?>
                          <p class="btn btn-info"><i class="fa fa-fw fa-thumbs-up"></i> Sudah diajukan</p>
                        <?php
                        } else if ($pengajuan_anggaran->status2 == 2) {
                        ?>
                          <p class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Disetujui oleh DM</p>
                        <?php
                        } else if ($pengajuan_anggaran->status2 == 3) {
                        ?>
                          <p class="btn btn-success"><i class="fa fa-fw fa-check"></i> Disetujui oleh DMPAU</p>
                        <?php
                        }
                        ?>
                      </td>



                      <td class="small">
                      <td width="250">
                        <a href="<?php echo site_url('C_ajuananggaran/update_datapengajuan/') . $pengajuan_anggaran->id_pengajuan; ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit dan detail</a>
                        <a href="<?php echo site_url('C_ajuananggaran/delete_datapengajuan/') . $pengajuan_anggaran->id_pengajuan; ?>"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </section>


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

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <form action="<?php echo site_url('C_ajuananggaran/add_datapengajuan'); ?>" method="post">
              <button type="submit" class="btn btn-primary">Save changes</button>

            </form>

          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /#wrapper -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <?php $this->load->view('dashboard/sidebarnav/_footpage.php'); ?>
  </div>
  <?php $this->load->view('dashboard/_part/js.php'); ?>




</body>

</html>