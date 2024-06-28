<?php
class admin_model extends CI_Model
{
    private $STAFF_USER = 'staff_perpustakaan';

    public function check_user($email)
    {
        $user = $this->db->get_where($this->STAFF_USER, ['email' => $email])->row_array();

        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
