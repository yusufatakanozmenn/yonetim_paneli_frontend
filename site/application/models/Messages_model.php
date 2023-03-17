<?php

class Messages_model extends CI_Model {

    public $tableName = "mesajlar";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array()){

        return $this->db->where($where)->get($this->tableName)->result();

    }

    public function delete($where = array()){

        return $this->db->where($where)->delete($this->tableName);
    }

}
