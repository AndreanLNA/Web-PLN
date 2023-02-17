<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_ajuananggaran extends CI_Model

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detailajuan');
        $this->load->model('M_paguanggaran');

    }
    // Sub bidang
    public function add_pengajuan()
    {

        $data = array(
            'id_pengajuan' => '',
            'id_anggota' => $this->session->userdata('id_anggota'),
            'catatan_dm2' => '',
            'total_pengajuan2' => '',
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => '',
            'status2' => '0',
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => date("Y-m-d")
        );
        $this->db->insert('pengajuan_anggaran', $data);
    }
    public function delete_pengajuan($id)
    {
        $this->db->delete('pengajuan_anggaran', array('id_pengajuan' => $id));
    }
    public function show_pengajuan($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('pengajuan_anggaran', array('id_pengajuan' => $id));
            return $query->result_array();
        } else {
            $query = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $this->session->userdata('id_anggota')));
            return $query->result();
        }
    }

    public function koreksi_data()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_anggaran');
        $this->db->where('id_anggota',  $this->session->userdata('id_anggota'));
        $this->db->where('status2', '5');
        $this->db->or_where('status2', '6');
        $query = $this->db->get()->result();
        return $query;
   

    }

    public function update_pengajuan()
    {
        $pagu = $this->M_paguanggaran->checkPagu(date('Y-m-d'));


        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
        

        
        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => '',
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => '',
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2')
        );

        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));

       
    }
    public function showbyid_pengajuansub($id)
    {
        
        
        $totalanggaran = $this->db->get_where('pengajuan_anggaran', array('id_anggota ' => $id))->num_rows();
        
        $anggarandisetujui = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE status2='3' AND id_anggota=%s",$id))->num_rows();
        $revisi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s",$id))->num_rows();
    
       
        $dm = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $id, 'status2' => '2'));
        $dmpau = $this->db->get_where('pengajuan_anggaran', array('id_anggota ' => $id, 'status2' => '3'));
        $koreksi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s",$id));
        $totalnotifikasi = $dm->num_rows() + $dmpau->num_rows() + $revisi;
        

        return  array('totalnotifikasi' => $totalnotifikasi, 'dm' => $dm->result_array(), 'dmpau' => $dmpau->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());
    }
    
    public function showbyid_pengajuandm($id)
    {
        
        
          
        $totalanggaran = $this->db->get_where('pengajuan_anggaran',array('status2>' => '1'))->num_rows();
        $anggarandisetujui = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE status2='3'")->num_rows();
        $revisi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6'")->num_rows();
    
       
        // Notifikasi
        $sub = $this->db->get_where('pengajuan_anggaran', array('status2' => '1'));
        
        $koreksi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '7'");
        $totalnotifikasi = $sub->num_rows()  + $koreksi->num_rows();
        

        return  array('totalnotifikasi' => $totalnotifikasi,'sub' => $sub->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());
    }

    public function showbyid_pengajuandmpau($id)
    {
        
        
        $totalanggaran = $this->db->get_where('pengajuan_anggaran',array('status2>' => '1'))->num_rows();
        $anggarandisetujui = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE status2='3'")->num_rows();
        $revisi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6'")->num_rows();
    
       
        // Notifikasi
        $dm = $this->db->get_where('pengajuan_anggaran', array('status2' => '2'));
        
        $koreksi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '8'");
        $totalnotifikasi = $dm->num_rows()  + $koreksi->num_rows();
        

        return  array('totalnotifikasi' => $totalnotifikasi, 'dm' => $dm->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());
    }
    


    public function show_pengajuan_sub()
    {
        $this->db->select('*');

		$this->db->from('pengajuan_anggaran');
		$this->db->where('status2 >=','1');

        $query = $this->db->get();
		
        return $query->result_array();
    }
    // New persetujuan DMPAU
    public function show_persetujuanDMPAU()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_anggaran');
        $this->db->where('status2 >=', '2');
      
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_pengajuanDM()
    {

        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => $this->input->post('catatan_dm2'),
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => '',
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2')
        );


        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));
    }
    public function update_pengajuanDMPAU()
    {
        

        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => $this->input->post('catatan_dm2'),
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => $this->input->post('catatan_dmpau2'),
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2')
        );


        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));
    }
}
