<?php
class Popup_Message extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "popup_message_v";
        $this->load->model("Popup_Message_model");


    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Popup_Message_model->get(array("id" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");
        //kurallar yazılır
        $this->form_validation->set_rules("adi", "Mesaj Adı", "required|trim");
        $this->form_validation->set_rules("url", "Mesaj Url", "required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );
        $validate = $this->form_validation->run();


        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";

        $this->load->library("upload", $config);

        $upload_logo = $this->upload->do_upload("resim");

        $popup_img_name = basename($_FILES["resim"]["name"]);

        if ($validate) {
            $update = $this->Popup_Message_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "adi" => $this->input->post("adi"),
                    "url" => $this->input->post("url"),
                    "resim" => $popup_img_name,

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
            redirect(base_url("popup_message"));
        }
    }
}