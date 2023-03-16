<?php
class Background_Images_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "background_images_settings_v";
        $this->load->model("Background_Images_Settings_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Background_Images_Settings_model->get();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $config["allowed_types"] = "jpg|jpeg|png|svg|webp";
        $config["upload_path"] = "uploads/$this->viewFolder/";

        $this->load->library("upload", $config);

        $upload_bizesorun = $this->upload->do_upload("bizesorun");
        $upload_anateklif = $this->upload->do_upload("anateklif");
        $upload_sayfalar = $this->upload->do_upload("sayfalar");
        $upload_belgelerimiz = $this->upload->do_upload("belgelerimiz");
        $upload_referanslar = $this->upload->do_upload("referanslar");
        $upload_insan_kaynaklari = $this->upload->do_upload("ik");
        $upload_sikca_sorulan_sorular = $this->upload->do_upload("sss");
        $upload_musterigorus = $this->upload->do_upload("musterigorus");

        $bizesorun_name = basename($_FILES["bizesorun"]["name"]);
        $anateklif_name = basename($_FILES["anateklif"]["name"]);
        $sayfalar_name = basename($_FILES["sayfalar"]["name"]);
        $belgelerimiz_name = basename($_FILES["belgelerimiz"]["name"]);
        $referanslar_name = basename($_FILES["referanslar"]["name"]);
        $insan_kaynaklari_name = basename($_FILES["ik"]["name"]);
        $sikca_sorulan_sorular_name = basename($_FILES["sss"]["name"]);
        $musterigorus_name = basename($_FILES["musterigorus"]["name"]);

        if ($upload_bizesorun) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "bizesorun" => $bizesorun_name,
                )
            );
        }
        if ($upload_anateklif) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "anateklif" => $anateklif_name,
                )
            );
        }
        if ($upload_sayfalar) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "sayfalar" => $sayfalar_name,
                )
            );
        }

        if ($upload_belgelerimiz) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "belgelerimiz" => $belgelerimiz_name,
                )
            );
        }
        if ($upload_referanslar) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "referanslar" => $referanslar_name,
                )
            );
        }
        if ($upload_insan_kaynaklari) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "ik" => $insan_kaynaklari_name,
                )
            );
        }
        if ($upload_sikca_sorulan_sorular) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "sss" => $sikca_sorulan_sorular_name,
                )
            );
        }
        if ($upload_musterigorus) {
            $this->Background_Images_Settings_model->update(
                array("id" => 1),
                array(
                    "musterigorus" => $musterigorus_name,
                )
            );
        }

        redirect(base_url("background_images_settings"));

    }





}