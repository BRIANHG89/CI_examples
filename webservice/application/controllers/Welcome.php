<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct() {
        parent::__construct();
        /**
         * Se carga el modelo en el constructor para que este disponible en 
         * toda la clase
         */
        $this->load->model('Usuario');
    }
    public function index()
    {
            $this->load->view('welcome_message');
    }
    
    public function usuarios(){
        
        $data = $this->Usuario->getUsers();
        
        //header('Content-Type: application/json');
        
        /*
         * practicamente es lo mismo que la cabecera de arriba que esta 
         * comentada, pero es mas util y apegada a la documentacion de CI
         */
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
    
    public function usuario($id){
        $user = $this->Usuario->getUser($id);
        //header('Content-Type: application/json');
        $this->output->set_content_type('application/json');
        echo json_encode($user);
    }
}
