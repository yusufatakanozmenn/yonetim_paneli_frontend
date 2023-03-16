<?php
class Persistent_Links extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "persistent_links_v";
        $this->load->model("Persistent_Links_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Persistent_Links_model->get(array("id" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $update = $this->Persistent_Links_model->update(
            array(
                "id" => $id
            ),
            array(
                "anaurl" => $this->input->post("anaurl"),
                "urunkategoriurl" => $this->input->post("urunkategoriurl"),
                "urunlerurl" => $this->input->post("urunlerurl"),
                "projekategoriurl" => $this->input->post("projekategoriurl"),
                "projelerurl" => $this->input->post("projelerurl"),
                "projedetayurl" => $this->input->post("projedetayurl"),
                "refurl" => $this->input->post("refurl"),
                "refdetayurl" => $this->input->post("refdetayurl"),
                "musteriurl" => $this->input->post("musteriurl"),
                "belgeurl" => $this->input->post("belgeurl"),
                "subeurl" => $this->input->post("subeurl"),
                "iletisimurl" => $this->input->post("iletisimurl"),
                "ekiburl" => $this->input->post("ekiburl"),
                "ekibdetayurl" => $this->input->post("ekibdetayurl"),
                "katalogurl" => $this->input->post("katalogurl"),
                "fotourl" => $this->input->post("fotourl"),
                "fotodetayurl" => $this->input->post("fotodetayurl"),
                "videourl" => $this->input->post("videourl"),
                "videodetayurl" => $this->input->post("videodetayurl"),
                "hizmeturl" => $this->input->post("hizmeturl"),
                "hizmetdetayurl" => $this->input->post("hizmetdetayurl"),
                "haberurl" => $this->input->post("haberurl"),
                "haberdetayurl" => $this->input->post("haberdetayurl"),
                "sayfaurl" => $this->input->post("sayfaurl"),
                "ikurl" => $this->input->post("ikurl"),
                "sssurl" => $this->input->post("sssurl"),
                "bankahesapurl" => $this->input->post("bankahesapurl"),
            )
        );
        if ($update) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarıyla güncellendi",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt güncellenemedi",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("persistent_links"));

    }




}