<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Auth_model extends CI_Model
{
    public $hash_key = 'HHZASm9pZ7h!pDpDB3_X$a_4Ash+dNbVnuYy5S%-HUPdNUA2x?';
    public $status_active = '1';
    public $status_pending = '0';

    public function __construct()
    {
        parent::__construct();

    }

    function login($login)
    {
        $pass_h = $this->generate_hash($login['password']);

        // select the user
        $this->db->select('users.*')->from('users');
        $this->db->where('email', $login['email']);

        $query = $this->db->get();
        $res = $query->result_array();

        if (sizeof($res) > 0) {
            $result = $res[0];
            // select the saved password hash key
            $db_hash = $result['password'];
            $auth = $db_hash == $pass_h ? true : false;

            // check if authentication was successful
            if ($auth) {
                // successful, log then continue

                return json_encode(['status' => '1', "message" => 'login successful', 'userdata' => $result]);
            } else {
                return json_encode(['status' => "0", 'message' => 'Authentication failed!']);
            }

        } else {
            return json_encode(['status' => "0", 'message' => 'User does not exist!']);
        }

    }

    function generate_hash($password)
    {
        return md5($this->hash_key . $password);
    }

    function updatepass($pass)
    {
        $data = ['password' => $this->generate_hash($pass)];
        $this->db->where('id', $this->session->userdata('user_aob')->id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }


}
