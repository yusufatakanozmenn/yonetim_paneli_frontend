<?php
class Userop extends CI_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "users_v";

        $this->load->model("user_model");
    }

    public function login(){
        if (get_active_user()){
			redirect(base_url());
		}
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login(){
        if (get_active_user()){
			redirect(base_url());
		}
        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email");
        $this->form_validation->set_rules("sifre", "Şifre", "required|trim|min_length[8]|max_length[32]");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",
                "min_length" => "<b>{field}</b> en az 8 karakterden oluşmalıdır.",
                "max_length" => "<b>{field}</b> en fazla 32 karakterden oluşmalıdır."
            )
        );

        // Form validation calistirilir...

        if ($this->form_validation->run() == FALSE){
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }else{
            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("email"),
                    "sifre" => md5($this->input->post("sifre")),
                    "durum" => 1,
                )
            );
            if ($user){
                $this->user_model->update(
                    array(
                        "email" => $this->input->post("email"),
                        "sifre" => md5($this->input->post("sifre")),
                        "durum" => 1,
                    ),
                    array(
                        "son_giris" => date("Y-m-d H:i:s"),
                    )                    
                );
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->isim Hoşgeldiniz",
                    "type" => "success",
                    
                );
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url());

               
            }else{
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Giriş Yapılamadı",
                    "type" => "error",
                    
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }

        }
    }

    public function logout(){
        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }
}