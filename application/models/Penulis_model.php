<?php
class Penulis_model extends CI_Model
{

    private $PENULIS_USER = 'penulis';

    public function get_user_data($email)
    {
        // buat id penulis
        return $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();
    }

    public function check_user($email)
    {
        $user = $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();
        if($user) {
            return $user;
        } else {
            return false;
        }
    }

}
?>