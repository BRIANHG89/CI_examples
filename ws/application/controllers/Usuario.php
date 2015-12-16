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
        $this->load->helper("password");
    }
    
    public function index(){
    }
    
    public function login(){
        $username = $this->input->post("username");
        $pass = $this->input->post("pass");
         
        $usuario = $this->usuario_model->login($username);
        $islogin = array("status"  => FALSE, "msg" => "");
        if(is_object($usuario) && !empty($usuario)){
            
            $hash = $usuario->password;
            
            if(password_verify($pass, $hash)){
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
    
   public function addUser(){
//       $datauser = $this->input->post();
       $datauser = array();
       $response = array();
       $datauser["nombre"] = $this->input->post("txtnombre");
       $datauser["apellido"] = $this->input->post("txtape");
       $datauser["password"] = password_hash($this->input->post("pass"), PASSWORD_BCRYPT, array("cost" => 10));
       
       $id = $this->usuario_model->create($datauser);
       if($id > 0){
           $response["status"] = TRUE;
           $response["msg"] = "Usuario creado con exito";
       } else{
           $response["status"] = FALSE;
           $response["msg"] = "El usuario no se pudo crear el usuario";
       }
       header('Content-Type: application/json;charset=utf-8');
       echo json_encode($response);
   }
   
   public function deleteUser($id = 0){
       $response = array();
       
       if($id > 0 || is_numeric($id)){
           $delete = $this->usuario_model->delete($id);
           if($delete){
               $response["status"] = TRUE;
                $response["msg"] = "Se a eliminado correctamente";
           } else{
                $response["status"] = FALSE;
                $response["msg"] = "No se a podido eliminar el usuario";
           }
       } else{
           $response["status"] = FALSE;
           $response["msg"] = "No se puede hacer nada";
       }
       header('Content-Type: application/json;charset=utf-8');
       echo json_encode($response);
   }
}