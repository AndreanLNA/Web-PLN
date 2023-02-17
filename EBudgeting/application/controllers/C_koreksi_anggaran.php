<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_koreksi_anggaran extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_ajuananggaran');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('M_masterpos_subpos');
		$this->load->model('M_detailajuan');
		$this->load->model('M_koreksianggaran');
	}

    
    public function index()
    {
        if ($this->session->userdata('jabatan') != 'subbidang') {
			
			
			redirect(site_url('C_login'));
		}
        $data['pengajuan_anggaran'] = $this->M_ajuananggaran->koreksi_data();
        
		$data['bulan'] = array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
		$data['minggu'] = array('1', '2', '3', '4');
		
	
        $this->load->view('persetujuan/koreksi_anggaran.php', $data);
    }
	public function update_koreksi($id= null,$status=null)
	{
        // cek jabatan user login
        if ($this->session->userdata('jabatan') != 'subbidang') {
			
			
			redirect(site_url('C_login'));
		}
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
		
            $this->load->view('persetujuan/update_koreksi.php', $data);


        } else {
            
            $this->M_koreksianggaran->update_koreksi();
     
            redirect(site_url('C_koreksi_anggaran'));
        }
		

	}
}
