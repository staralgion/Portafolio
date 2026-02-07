<?php
class Dashboard extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['loginad'])) {
            header('Location: ' . base_url() . "/login");
        } else {
            sessionuser($_SESSION['iduserad']);
        }
        getpermisos(0);

        if (empty($_SESSION['permisosmod']['r'])) {
            header('Location: ' . base_url() . "/Perfil");
        }
    }
    public function Dashboard()
    {

        //$data['page_id'] = 1;
        $data['page_tag'] = "Dashboard";
        $data['page_title'] = "Dashboard";
        $data['page_name'] = "Dashboard";
        $data['page_js'] = "functiondashboard.js";
        $this->views->getview($this, "dashboard", $data);
    }

    public function getclientes()
    {

        $arrdata = $this->model->selectclientes();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function getpersonal()
    {

        $arrdata = $this->model->selectclientes();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function getproductos()
    {

        $arrdata = $this->model->selectproductos();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function getmarcas()
    {

        $arrdata = $this->model->selectmarcas();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }


    public function getaprendisaje()
    {

        $arrdata = $this->model->selectaprendisaje();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function getsolicitudes()
    {

        $arrdata = $this->model->selectsolicitudes();
        if (empty($arrdata)) {
            $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
        } else {
            $arrresponse = array('status' => true, 'data' => $arrdata);
        }
        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);

        die();
    }
}
