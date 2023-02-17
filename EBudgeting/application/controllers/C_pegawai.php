<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pegawai");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pegawai"] = $this->M_pegawai->getAll();
        $this->load->view("pegawaivw/menupegawai", $data);
    }

    public function add()
    {


        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|regex_match[/^[a-zA-Z ]*$/]|max_length[80]', array('max_length' => 'Batas input maksimal 80 karakter', 'regex_match' => '{field} tidak boleh mengandung simbol dan angka'));
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|regex_match[/^[a-zA-Z0-9\.\, ]*$/]', array('regex_match' => '{field} tidak boleh mengandung simbol kecuali , dan .'));
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[A-Za-z][A-Za-z0-9_]{7,29}$/]', array('regex_match' => '<ul>
        <li>A valid username should start with an alphabet.</li>
        <li>All other characters can be alphabets, numbers or an underscore</li>
        <li>Minimum eight in length</li>
        </ul>'));
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/]', array('regex_match' => '<ul>
        <li>At least one upper case </li>
        <li>At least one lower case English letter</li>
        <li>At least one digit</li>
        <li>At least one special character (#?!@$%^&*-)</li>
        <li>Minimum eight in length</li>
        </ul>'));
        
        echo $this->form_validation->run();
        if ($this->form_validation->run()) {
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            $this->M_pegawai->save();
            redirect(site_url('C_pegawai'));
        } else {
            $this->load->view("pegawaivw/addpegawai");
        }
    }

    public function edit($id = null)
    {
        
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|regex_match[/^[a-zA-Z ]*$/]|max_length[80]', array('max_length' => 'Batas input maksimal 80 karakter', 'regex_match' => '{field} tidak boleh mengandung simbol dan angka'));
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|regex_match[/^[a-zA-Z0-9\.\, ]*$/]', array('regex_match' => '{field} tidak boleh mengandung simbol kecuali , dan .'));
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[A-Za-z][A-Za-z0-9_]{7,29}$/]', array('regex_match' => '<ul>
        <li>A valid username should start with an alphabet.</li>
        <li>All other characters can be alphabets, numbers or an underscore</li>
        <li>Minimum eight in length</li>
        </ul>'));
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/]', array('regex_match' => '<ul>
        <li>At least one upper case </li>
        <li>At least one lower case English letter</li>
        <li>At least one digit</li>
        <li>At least one special character (#?!@$%^&*-)</li>
        <li>Minimum eight in length</li>
        </ul>'));

        if ( $this->form_validation->run()) {
            $this->M_pegawai->update($id);

            redirect(site_url('C_pegawai'));
        } else {


            $data["pegawaivw"] = $this->M_pegawai->getById($id);
            $data['id'] = $id;

            $this->load->view("pegawaivw/updatepegawai", $data);
        }
    }

    public function delete($id = null)
    {

        if (isset($id)) {
            $this->M_pegawai->delete($id);

            redirect(site_url('C_pegawai'));
        } else {
            show_error('Invalid Action has been detected please back to previous page', 404, "Invalid Action Error 404");
        }
    }
}
