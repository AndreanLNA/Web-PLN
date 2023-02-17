<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review DM</title>
    <?php $this->load->view('dashboard/_part/head'); ?>
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
                <h1>Review DM</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Dashboard</li>
                    <li>Pengajuan DM</li>
                    <li class="active">Review</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <a href="<?php echo site_url('C_ajuananggaran/update_datapengajuan/') . $id; ?>" class="btn btn-info active">Input</a>
                                <a href="<?php echo site_url('C_ajuananggaran/show_rekapanggaran/') . $id; ?>" class="btn btn-info">Rekap</a>


                                <div class="box-body">
                                    <form class="form-horizontal" id="ajuananggaran" action="<?php echo site_url('C_koreksi_anggaran/update_koreksi'); ?>" method="post">

                                        <input type="hidden" name="id_pengajuan" value="<?php echo $ajuan['id_pengajuan']; ?>">
                                        <input type="hidden" name="id_anggota" value="<?php echo $ajuan['id_anggota']; ?>">
                                        <input type="hidden" name="status2" value="<?php echo $ajuan['status2']; ?>" id="status">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="minggu2" class="col-sm-2 control-label">Minggu</label>

                                                    <div class="col-sm-10">

                                                        <select name="minggu2" id="minggu2" class="form-control">
                                                            <option value="" selected disabled>=== Pilih Minggu ==</option>
                                                            <?php foreach ($minggu as $mingguu) : ?>


                                                                <option <?= set_select('minggu2', $mingguu); ?> <?php if ($mingguu == $ajuan['minggu2']) echo "selected"; ?> value="<?= $mingguu ?>">Minggu ke -<?= $mingguu; ?></option>
                                                            <?php endforeach; ?>

                                                        </select>



                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_mulai2" class="col-sm-2 control-label">Tanggal Mulai</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal_mulai2" id="tanggal_mulai2" placeholder="tanggal mulai" value="<?php echo date('Y-m-d', strtotime($ajuan['tanggal_mulai2'])); ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bulan2" class="col-sm-2 control-label">Bulan</label>
                                                    <div class="col-sm-10">

                                                        <select name="bulan2" id="bulan2" class="form-control">
                                                            <option value="" selected disabled>=== Pilih Bulan ==</option>
                                                            <?php foreach ($bulan as $bulann) : ?>

                                                                <option <?= set_select('bulan2', $bulann); ?> <?php if ($bulann == $ajuan['bulan2']) echo "selected"; ?> value="<?= $bulann ?>"><?= $bulann; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>



                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_sampai2" class="col-sm-2 control-label">Tanggal Sampai</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal_sampai2" id="tanggal_sampai2" placeholder="tanggal sampai" value="<?php echo date('Y-m-d', strtotime($ajuan['tanggal_sampai2'])); ?>">

                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                        <!-- mulai ini -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered text-center">
                                                    <tr>
                                                        <th> POS</th>
                                                        <th>SUB POS</th>
                                                        <th>SUB POS</th>
                                                        <th>Kegiatan</th>
                                                        <th>nominal</th>
                                                        <th>Deskripsi</th>
                                                        <th>Disetujui</th>

                                                    </tr>

                                                    <?php foreach ($detailajuan as $key) : ?>

                                                        <tr>

                                                            <input type="hidden" name="id_pengajuan" id="id_pengajuan" value="<?php echo $ajuan['id_pengajuan']; ?>">
                                                            <input type="hidden" name="id_detailpengajuan[]" id="id_detailpengajuan[]" value="<?= $key['id_detailpengajuan']; ?>">


                                                            <td>
                                                                <select name="id_pos[]" id="id_pos" class="form-control">
                                                                    <option value="" selected disabled>Pos</option>
                                                                    <?php foreach ($pos as $poss) : ?>
                                                                        <option <?= set_select('id_pos', $poss['id_pos']) ?> <?php if ($poss['id_pos'] == $key['id_pos']) echo "Selected"; ?> value="<?= $poss['id_pos'] ?>"><?= $poss['nama_pos'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                            </td>
                                                            <td>
                                                                <select name="id_subpos[]" id="id_subpos" class="form-control">
                                                                    <option value="" selected disabled>Sub pos</option>
                                                                    <?php foreach ($subpos as $poss) : ?>
                                                                        <option <?= set_select('id_subpos', $poss['id_subpos']) ?> <?php if ($poss['id_subpos'] == $key['id_subpos']) echo "Selected"; ?> value="<?= $poss['id_subpos'] ?>"><?= $poss['nama_subpos'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="id_subpos2[]" id="id_subpos2" class="form-control">
                                                                    <option value="" selected disabled>Sub Pos</option>
                                                                    <?php foreach ($subpos2 as $poss) : ?>
                                                                        <option <?= set_select('id_subpos2', $poss['id_subpos2']) ?> <?php if ($poss['id_subpos2'] == $key['id_subpos2']) echo "Selected"; ?> value="<?= $poss['id_subpos2'] ?>"><?= $poss['nama_subpos2'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="kegiatan[]" id="kegiatan" placeholder="kegiatan" class="form-control" value="<?= $key['kegiatan2']; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="nominal[]" id="nominal" placeholder="nominal" class="form-control" value="<?= $key['nominal_pengajuan2']; ?>">
                                                            </td>
                                                            <td> <input type="text" name="deskripsi[]" id="deskripsi" placeholder="deskripsi" class="form-control" value="<?= $key['deskripsi2']; ?>"></td>
                                                            <td><input readonly type="text" name="nominal_persetujuan2[]" id="nominal_persetujuan2" placeholder="nominal persetujuan" class="form-control" class="form-control" value="<?= $key['nominal_persetujuan2']; ?>"></td>




                                                        </tr>
                                                    <?php endforeach; ?>






                                                </table>

                                            </div>
                                            <div class="col-md-12" id="review-dm">

                                                <?php
                                                if ($ajuan['catatan_dm2']) {
                                                ?>
                                                    <div class="form-group has-warning">

                                                        <label for="catatan_dm2">Catatan DM</label>
                                                        <textarea disabled name="catatan_dm2" id="catatan_dm2" class="form-control" cols="30" rows="10"><?php echo $ajuan['catatan_dm2']; ?></textarea>
                                                    </div>


                                                <?php
                                                    # code...
                                                }


                                                ?>

                                            </div>
                                            <div class="col-md-12">
                                                <?php
                                                if ($ajuan['catatan_dmpau2']) {
                                                ?>
                                                    <div class="form-group has-warning">
                                                        <label for="catatan_dmpau2">Catatan DMPAU</label>
                                                        <textarea disabled name="catatan_dmpau2" id="catatan_dm2" class="form-control" cols="30" rows="10"><?php echo $ajuan['catatan_dmpau2']; ?></textarea>
                                                    </div>


                                                <?php
                                                    # code...
                                                } ?>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer bg-gray" id="box-footer">
                                    <div class="pull-right">
                                        <?php
                                        if ($ajuan['status2'] == 5) {
                                        ?>


                                            <button id="kirimDM" class="btn btn-primary">Ajukan ke DM</button>

                                        <?php
                                        }
                                        if ($ajuan['status2'] == 6) {
                                        ?>

                                            <button id="kirimDMPAU" class="btn btn-primary">Ajukan Ke DMPAU</button>



                                        <?php
                                        }
                                        ?>








                                    </div>




                                </div>
                                <!-- /.box-footer -->

                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                        </div>
                        <!-- /.box -->

                    </div>


                </div>
                <!-- /.row -->
            </section>

            <!-- right col -->
        </div>
        <?php $this->load->view('dashboard/sidebarnav/_footpage.php'); ?>
        <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->








    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $(document).on('click','#kirimDM', function(){
                Kirim(7);

            });
            $(document).on('click','#kirimDMPAU', function(){
                Kirim(8);

            });
        });

        function Kirim(id) {
            var input = document.getElementById('status');
            input.setAttribute('value', id);
            FormSubmit();


        }

        function FormSubmit() {
            $(':disabled').each(function(e) {
                $(this).removeAttr('disabled');
            });
            document.getElementById('ajuananggaran').submit();

        }
    </script>




    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>