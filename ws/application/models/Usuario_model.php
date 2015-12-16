<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author nayosx
 */
defined('BASEPATH') OR exit('No direct script access allowed'); // return $this->db->affected_rows();

class Usuario_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = "usuario";
        $this->id = "id";
    }
    
    public function login($username){
        $this->db->where("nombre", $username);
        $query = $this->db->get($this->table);
        return $query->row();
    }
}