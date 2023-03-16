<?php
class Mail_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "mail_settings_v";
        $this->load->model("Mail_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Mail_Settings_model->get();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("m_server", "SMTP Server", "required|trim");
        $this->form_validation->set_rules("m_port", "SMTP Port", "required|trim");
        $this->form_validation->set_rules("m_adresi", "SMTP Email", "required|trim");
        $this->form_validation->set_rules("m_parola", "SMTP Email Şifre", "required|trim");
        $this->form_validation->set_rules("m_kime", "E-Posta Adresi", "required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $insert = $this->Mail_Settings_model->update(
                array("id" => 1),
                array(
                    "m_server" => $this->input->post("m_server"),
                    "m_port" => $this->input->post("m_port"),
                    "m_sertifika" => $this->input->post("m_sertifika"),
                    "m_adresi" => $this->input->post("m_adresi"),
                    "m_parola" => $this->input->post("m_parola"),
                    "m_kime" => $this->input->post("m_kime"),
                    "durum" => $isActive
                )
            );
            // TODO Alert sistemi eklenecek...
            if ($insert) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
                $viewData = new stdClass();

                /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";
                $viewData->form_error = true;

                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("mail_settings"));
        }

    }



}