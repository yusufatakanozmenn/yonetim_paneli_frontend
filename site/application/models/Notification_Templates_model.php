<?php
class Notification_Templates_model extends CI_Model {

    public $tableName = "bildirim_sablonu";

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

    public function update($where = array(), $data = array()){

        return $this->db->where($where)->update($this->tableName, $data);
    }



}