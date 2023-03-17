<?php

class Photo_Gallery_model extends CI_Model
{

    public $tableName = "foto_galeri";
    public $tableName1 = "fotograflar";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array())
    {

        return $this->db->where($where)->get($this->tableName)->result();

    }

    public function add($data = array())
    {

        return $this->db->insert($this->tableName, $data);

    }

    public function update($where = array(), $data = array())
    {

        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {

        return $this->db->where($where)->delete($this->tableName);
    }

    //foto galeriye ait fotoğrafları getirme
    public function get_($where = array())
    {
        return $this->db->where($where)->get($this->tableName1)->row();
    }
    public function get_photos($where = array())
    {
        return $this->db->where($where)->get($this->tableName1)->result();
    }

    //foto galeriye ait fotoğraflara yeni fotoğraf ekleme
    public function add_photo($data = array())
    {
        return $this->db->insert($this->tableName1, $data);
    }

    //foto galeriye ait fotoğrafları güncelleme
    public function update_photo($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName1, $data);
    }

    //foto galeriye ait fotoğrafları silme
    public function delete_photo($where = array())
    {
        return $this->db->where($where)->delete($this->tableName1);
    }
}