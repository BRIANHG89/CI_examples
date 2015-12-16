<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author nayosx
 */
class MY_Model extends CI_Model{
    //put your code here
    public $table = "";
    public $id = "";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function selectAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function select($id_param){
        $this->db->where($this->id, $id_param);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    function create($_array) {
        $this->db->insert($this->table, $_array);
        return $this->db->insert_id();
    }

    function update($id, $_array) {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $_array);
    }

    function delete($id) {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
    
}
