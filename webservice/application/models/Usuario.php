<?php
/**
 * Description of Usuario
 *
 * @author nayosx
 */
class Usuario extends CI_Model{
    
    public function getUsers(){
        $query = $this->db->get('Employees');
        return $query->result();
    }
    
    public function getUser($id){
        $this->db->where('EmployeeID', $id);
        $query = $this->db->get('Employees');
        return $query->row();
    }
}
