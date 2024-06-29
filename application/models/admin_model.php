<?php
class Admin_model extends CI_Model
{
    private $STAFF_USER = 'staff_perpustakaan';

    public function get_user_data($email)
    {
        return $this->db->get_where($this->STAFF_USER, ['email'=> $email])->row_array();
    }

    public function check_user($email)
    {
        $user = $this->db->get_where($this->STAFF_USER, ['email' => $email])->row_array();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }
}
