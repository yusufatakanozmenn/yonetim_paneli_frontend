<?php
class Contact_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "contact_settings_v";
        $this->load->model("Contact_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Contact_Settings_model->get(array("id" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("firma_adi", "Firma Adı", "required|trim");
        $this->form_validation->set_rules("firma_adres", "Firma Adres", "required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) {
            $update = $this->Contact_Settings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "firma_adi" => $this->input->post("firma_adi"),
                    "firma_telefon" => $this->input->post("firma_telefon"),
                    "firma_fax" => $this->input->post("firma_fax"),
                    "firma_email" => $this->input->post("firma_email"),
                    "firma_adres" => $this->input->post("firma_adres"),
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
            redirect(base_url("contact_settings"));
        }
    }

}