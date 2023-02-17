<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_persetujuan_dmpau extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
     
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('M_masterpos_subpos');
        $this->load->model('M_detailajuan');
        $this->load->model('M_ajuananggaran');
    }
    public function index()
    {
        redirect('C_persetujuan_dmpau/show_pengajuandmpau');
    }
    public function show_pengajuandmpau()
    {
        $data['pengajuan'] = $this->M_ajuananggaran->show_persetujuanDMPAU();

        foreach ($data['pengajuan'] as $k) {


            $data['item'][] = $this->M_detailajuan->item($k['id_pengajuan']);
        }
        $data['status'] = array(
            '0' => '<span class="btn btn-danger"><i class="fa fa-fw fa-warning"></i>Draft</span>',
            '1' => '<span class="btn btn-info"><i class="fa fa-fw fa-thumbs-up"></i> Telah diajukan oleh subidang</span>',
            '2' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Telah disetujui oleh DM</span>',
            '3' => '<span class="btn btn-success"><i class="fa fa-fw fa-check"></i> Telah disetujui oleh DMPAU</span>',

            '5' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Koreksi Anggaran oleh DM</span>',
            '6' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Koreksi Anggaran oleh DMPAU</span>',

            '7' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Anggaran telah dikoreksi [DM]</span>',
            '8' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Anggaran telah dikoreksi [DMPAU]</span>'



        );







        $this->load->view('dashboard/_part/head');
        $this->load->view('persetujuan/persetujuan_dmpau.php', $data);

        $this->load->view('dashboard/_part/footer');
    }
    public function reviewdmpau($id = null)
    {
        $this->form_validation->set_rules('id_pengajuan', 'Id pengajuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['ajuan'] = $this->M_ajuananggaran->show_pengajuan($id)[0];
            $data['pos'] = $this->M_masterpos_subpos->show_posM();
            $data['subpos'] = $this->M_masterpos_subpos->show_subposM();
            $data['subpos2'] = $this->M_masterpos_subpos->show_subpos2M();
            $data['detailajuan'] = $this->M_detailajuan->showbyid_detailanggaranM($id);
            $data['id'] = $id;
            $data['bulan'] = array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
            $data['minggu'] = array('1', '2', '3', '4');
            $this->load->view('persetujuan/review_dmpau', $data);
        } else {
        

            $this->M_ajuananggaran->update_pengajuanDMPAU();
            $this->M_detailajuan->update_pengajuanDM();
            redirect(site_url('C_persetujuan_dmpau/show_pengajuandmpau'));
        }
    }
}
