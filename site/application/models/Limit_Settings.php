<?php
class Limit_Settings extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "limit_settings_v";
        $this->load->model("limit_settings_model");
	}
    public function index(){
        $viewData = new stdClass();
        $item = $this->limit_settings_model->get(array("id"=>1));
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update($id){
        $insert = $this->limit_settings_model->update(
            array(
                "id" => $id
            ),
            array(
                "limit_belge" => $this->input->post("limit_belge"),
                "limit_ekip" => $this->input->post("limit_ekip"),
                "limit_referanslar" => $this->input->post("limit_referanslar"),
                "limit_urun" => $this->input->post("limit_urun"),
                "limit_urunler" => $this->input->post("limit_urunler"),
                "limit_projeler" => $this->input->post("limit_projeler"),
                "limit_proje" => $this->input->post("limit_proje"),
                "limit_foto" => $this->input->post("limit_foto"),
                "limit_video" => $this->input->post("limit_video"),
                "limit_haber" => $this->input->post("limit_haber"),
                "limit_yorum" => $this->input->post("limit_yorum"),
                "limit_katalog" => $this->input->post("limit_katalog"),
                "limit_hizmetler" => $this->input->post("limit_hizmetler"),
                "limit_bhesaplari" => $this->input->post("limit_bhesaplari"),
                "limit_bayiler" => $this->input->post("limit_bayiler"),
                "limit_sayfabelgeler" => $this->input->post("limit_sayfabelgeler"),
                "limit_sayfaekibimiz" => $this->input->post("limit_sayfaekibimiz"),
                "limit_sayfareferans" => $this->input->post("limit_sayfareferans"),
                "limit_sayfaurun" => $this->input->post("limit_sayfaurun"),
                "limit_sayfaurunler" => $this->input->post("limit_sayfaurunler"),
                "limit_sayfaproje" => $this->input->post("limit_sayfaproje"),
                "limit_sayfaprojeler" => $this->input->post("limit_sayfaprojeler"),
                "limit_sayfafoto" => $this->input->post("limit_sayfafoto"),
                "limit_sayfavideo" => $this->input->post("limit_sayfavideo"),
                "limit_sayfahaber" => $this->input->post("limit_sayfahaber"),
                "limit_sayfayorumlar" => $this->input->post("limit_sayfayorumlar"),
                "limit_sayfakatalog" => $this->input->post("limit_sayfakatalog"),
                "limit_sayfahizmetler" => $this->input->post("limit_sayfahizmetler"),
                "limit_sayfabhesaplari" => $this->input->post("limit_sayfabhesaplari"),               
            )
            );

        if ($insert){
            redirect(base_url("limit_settings"));
        }
        else{
            echo "Kayit eklenemedi";
        }
    }
}
