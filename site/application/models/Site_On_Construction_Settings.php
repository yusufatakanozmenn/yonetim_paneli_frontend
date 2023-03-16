<?php
class Site_On_Construction_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "site_on_construction_settings_v";
        $this->load->model("Site_On_Construction_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Site_On_Construction_Settings_model->get();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("baslik", "Başlık", "required|trim");
        $this->form_validation->set_rules("acilis_tarihi", "Açılış Tarihi", "required|trim");
        $this->form_validation->set_rules("acilis_zaman", "Açılış Zamanı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();

        if ($validate) {
            $update = $this->Site_On_Construction_Settings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "acilis_tarih" => $this->input->post("acilis_tarihi"),
                    "acilis_zaman" => $this->input->post("acilis_zaman"),
                    "baslik" => $this->input->post("baslik"),
                    "aciklama" => $this->input->post("aciklama"),
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
            redirect(base_url("site_on_construction_settings"));
        }

    }

}