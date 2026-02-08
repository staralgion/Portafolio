<?php
class Galeria extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        // Aquí puedes agregar lógica de sesión si lo necesitas
    }

    // Visualización principal
    public function Galeria()
    {
        $data['page_tag'] = "Galería";
        $data['page_title'] = "Galería de Imágenes";
        $data['page_name'] = "galeria";
        $data['page_version'] = "3";
        // $data['page_js'] = "functiongaleria.js";

        $this->views->getview($this, "galeria", $data);
    }
}
