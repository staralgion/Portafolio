<?php
class Perfil extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['loginad'])) {
            header('Location: ' . base_url() . "/login");
        }else{
            sessionuser($_SESSION['iduserad']);
        }

        getpermisos(-1);
    }

    //Visualizacion
    public function Perfil()
    {
        $data['page_tag'] = "Perfil";
        $data['page_title'] = "Perfil";
        $data['page_name'] = "Perfil";
        $data['page_js'] = "functionperfil.js";

        $this->views->getview($this, "perfil", $data);
    }
    //Visualizacion
  


    
    public function setusuarios()
    {
        if ($_POST) {
            if (empty($_POST['txtnombre']) || empty($_POST['txtapellido']) || empty($_POST['txtcorreo'])) {
                $arrresponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {
                // No importa el orden de las variables
                $idusuario = intval($_POST['idusuario']);
                //$strci = strclean($_POST['txtci']);
                $strnombre = ucwords(strclean($_POST['txtnombre']));
                $strapellido = ucwords(strclean($_POST['txtapellido']));
                $strcorreo = strtolower(strclean($_POST['txtcorreo']));
                $inttelefono = intval(strclean($_POST['txttelefono']));
                $direccion = strclean($_POST['txtdireccion']);
      
          
                    $requestusuario = $this->model->updateusuario(
                        $idusuario,
                        $strnombre,
                        $strapellido,
                        $strcorreo,
                        $inttelefono,
                        $direccion
                    );
                }
                if ($requestusuario > 0) {

                        $arrresponse = array('status' => true, 'msg' => 'Datos Actualizados Correctamente');
                    
                } else {
                    if ($requestusuario == -1) {
                        $arrresponse = array('status' => false, 'msg' => '!Atencion! El usuario ya existe');
                    } else
                        $arrresponse = array('status' => false, 'msg' => 'No se almaceno los datos');
                }
            
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    //Update
    public function getusuario()
    {
        $idusuario= $_SESSION['iduserad'];
        $intkey = intval(strclean($idusuario));
        if ($intkey > 0) {
            $arrdata = $this->model->selectusuario($intkey);
            if (empty($arrdata)) {
                $arrresponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrresponse = array('status' => true, 'data' => $arrdata);
            }
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }


}
