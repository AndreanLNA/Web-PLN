<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_masterpos_subpos extends CI_Model

{
    public function add_posM()
    {
        $data = array (
            'id_pos' => '',
            'nama_pos' => $this->input->post('nama')
        );
        $this->db->insert('pos', $data);
    }
    public function delete_posM($id)
    {
        $this->db->delete('pos', array('id_pos' => $id));
    }
    public function update_posM()
    {
        $id = $this->input->post('id_pos');
        $data = array (
            'id_pos' => $id,
            'nama_pos' => $this->input->post('nama')
        );

        $this->db->update('pos', $data, array('id_pos' => $id));
    }
    public function show_posM($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('pos', array('id_pos' => $id));
            return $query->result_array();
            
        }
        else {
            $query = $this->db->get('pos');
            return $query->result_array();
        }
        
    }
    public function addsubposM()
    {
        $data = array (
            'id_subpos' => '',
            'nama_subpos' => $this->input->post('nama')
        );
        $this->db->insert('sub_pos', $data);
    }
    public function delete_subposM($id)
    {
        $this->db->delete('sub_pos', array('id_subpos' => $id));
    }
    public function update_subposM()
    {
        $id = $this->input->post('id_subpos');
        $data = array (
            'id_subpos' => $id,
            'nama_subpos' => $this->input->post('nama')
        );

        $this->db->update('sub_pos', $data, array('id_subpos' => $id));
    }
    public function show_subposM($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('sub_pos', array('id_subpos' => $id));
            return $query->result_array();
            
        }
        else {
            $query = $this->db->get('sub_pos');
            return $query->result_array();
        }
        
    }
    public function addsubpos2M()
    {
        $data = array (
            'id_subpos2' => '',
            'nama_subpos2' => $this->input->post('nama')
        );
        $this->db->insert('sub_pos2', $data);
    }
    public function delete_subpos2M($id)
    {
        $this->db->delete('sub_pos2', array('id_subpos2' => $id));
    }
    public function update_subpos2M()
    {
        $id = $this->input->post('id_subpos2');
        $data = array (
            'id_subpos2' => $id,
            'nama_subpos2' => $this->input->post('nama')
        );

        $this->db->update('sub_pos2', $data, array('id_subpos2' => $id));
    }
    public function show_subpos2M($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('sub_pos2', array('id_subpos2' => $id));
            return $query->result_array();
            
        }
        else {
            $query = $this->db->get('sub_pos2');
            return $query->result_array();
        }
    }
}
