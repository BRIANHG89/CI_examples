<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author nayosx
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    
    public function index(){
    }
    
    public function login(){
        $username = $this->input->post("username");
        $pass = $this->input->post("pass");
         
        $usuario = $this->usuario_model->login($username);
        $islogin = array("status"  => FALSE, "msg" => "");
        if(is_object($usuario) && !empty($usuario)){
            if($usuario->password == $pass){
                $islogin = array("status"  => TRUE, "msg" => "parametros validos");
            } else{
                $islogin = array("status"  => FALSE, "msg" => "La contraseña no es correcta");
            }  
        } else{
            $islogin = array("status"  => FALSE, "msg" => "El usuario no es valido");
        }
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($islogin);
    }

}