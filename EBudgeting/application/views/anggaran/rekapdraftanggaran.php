<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Anggaran</title>
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
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Rekap Anggaran</h1>
            </section>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-info ">Input</a>
                                <a href="<?php echo site_url('C_ajuananggaran/show_rekapanggaran/') . $id; ?>" class="btn btn-info active">Rekap</a>



                                <div class="box-body">



                                    <!-- mulai ini -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>POS</th>
                                                        <th>SUB POS</th>
                                                        <th>SUB POS</th>
                                                        <th>Kegiatan</th>
                                                        <th>Deskripsi</th>
                                                        <th>Nominal</th>
                                                        <th>Disetujui</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detailajuan as $key) : ?>
                                                        <tr>



                                                            <td>
                                                                <h4><?php echo $key['nama_pos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['nama_subpos2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['kegiatan2']; ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo $key['deskripsi2']; ?></h4>
                                                            </td>

                                                            <td>
                                                                <h4><?php 'Rp.' . number_format(floatval($key['nominal_pengajuan2']),2,',','.'); ?></h4>
                                                            </td>
                                                            <td>
                                                                <h4><?php echo 'Rp.' . number_format(floatval($key['nominal_persetujuan2']),2,',','.'); ?></h4>
                                                            </td>


                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                                <h2></h2>
                                                <tfoot class="bg-gray">
                                                    <td colspan="5"><b> Total Anggaran diajukan Minggu ke - <?= $ajuan['minggu2']; ?></b></td>
                                                    <td>
                                                        <h4><?php echo "Rp. " . number_format($total['nominal_pengajuan2'],2,',','.'); ?></h4>
                                                    </td>
                                                    <td>
                                                        <h4><?php echo "Rp. " .  number_format($total['nominal_persetujuan2'], 2,',','.'); ?></h4>
                                                    </td>
                                                </tfoot>





                                            </table>

                                        </div>
                                    </div>


                                </div>
                                <!-- /.box-body -->

                                <!-- /.box-footer -->

                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                        </div>
                        <!-- /.box -->

                    </div>


                </div>


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











    <?php $this->load->view('dashboard/_part/js'); ?>
</body>

</html>