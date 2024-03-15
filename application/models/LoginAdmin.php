<?php

class LoginAdmin extends CI_Model
{
    public function cekLogin($email, $password)
    {
        $this->db->select('id_login, email, password');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $this->db->limit(1);
        $result = $this->db->get('data_login');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return null;
        }
    }
}


// class LoginAdmin extends CI_Model
// {
//     public function cekLogin()
//     {
//         $email  = set_value('email');
//         $password  = set_value('password');

//         $this->db->select('id_login, email, password');
//         $this->db->where('email', $email);
//         $this->db->where('password', $password);

//         $this->db->limit(1);
//         $result = $this->db->get('data_login');

//         return $result->row();
//         if ($result->num_rows() > 0) {
//             return $result->row();
//         } else {
//             return false;
//         }
//     }
// }
