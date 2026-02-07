<?php
class Clientes extends Controllers
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
        getpermisos(2);

        if (empty($_SESSION['permisosmod']['r'])) {
            header('Location: ' . base_url() . "/Perfil");
        }
    }

    //Visualizacion
    public function Clientes()
    {
        $data['page_tag'] = "Clientes";
        $data['page_title'] = "Administración de Clientes";
        $data['page_name'] = "Clientes";
        $data['page_js'] = "functionclientes.js";

        $this->views->getview($this, "clientes", $data);
    }
    //Visualizacion
    public function getusuarios()
    {
        $arrdata = $this->model->selectusuarios();
        $script = '';
        $crudopciones='';

        $btnview='';
        $btnedit='';
        $btndelete='';


        for ($i = 0; $i < count($arrdata); $i++) {
            if ($arrdata[$i]['estado'] == 1) {
                $arrdata[$i]['estado'] = '<span class="badge bg-primary">Activo</span>';
            } else {
                $arrdata[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
            }

     
            $btnview = '<a class="btn btn-outline-secondary btn-sm btnviewusuario" onClick="fntviewpersonal('.$arrdata[$i]['idusuario'].')" title="View"><i class="far fa-file-alt"></i></a>';
            
            if($_SESSION['permisosmod']['u']){
            $btnedit = '<a class="btn btn-outline-secondary btn-sm btneditusuario" rl="'.$arrdata[$i]['idusuario'].'" title="Edit"><i class="fas fa-pencil-alt"></i></a>';
            }
            if($_SESSION['permisosmod']['d']){
            $btndelete = '<a class="btn btn-outline-secondary btn-sm btndelusuario" rl="'.$arrdata[$i]['idusuario'].'" title="Del">    <i class="far fa-trash-alt"></i></a>';
            }
         
            $crudopciones = $btnview.' '.$btnedit.' '.$btndelete;

            $arrdata[$i]['acciones'] = '<div class="text-center">' . $crudopciones .'</div>';
        }

        echo json_encode($arrdata, JSON_UNESCAPED_UNICODE);
        die();
    }


    
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
                $intestado = intval(strclean($_POST['listestado']));
                $intidrol = intval(2);
                //Esto se basa en el id oculto que se usa en rl 
                if ($idusuario == 0) {
                    //Se incrementa mediante la respuesta del request de model
                    $option = 1;
                    $strpassword =   passgenerator();
                    $strpasswordencript = hash("SHA256", $strpassword);

                    $requestusuario = $this->model->insertusuario(
                        $intidrol,
                        //$strci,
                        $strnombre,
                        $strapellido,
                        $strcorreo,
                        $inttelefono,
                        $strpasswordencript,
                        $intestado
                    );
                } else {
                    $option = 2;
                    $requestusuario = $this->model->updateusuario(
                        $idusuario,
               
                        //$strci,
                        $strnombre,
                        $strapellido,
                        $strcorreo,
                        $inttelefono,
                        $intestado
                    );
                }
                if ($requestusuario > 0) {

                    if ($option == 1) {
                        $arrresponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente');
                        $token = token();
                        $nombreuser = $strnombre . ' ' . $strapellido;
                        $stremail = strtolower(strclean($strcorreo));

                        $urlrecuperar = base_url() . '/Login/confirmuser/' . $stremail . '/' . $token;
                        $requestupdate = $this->model->settokenuser($requestusuario, $token);

                        $datausuario = array(
                            'nombreuser' => $nombreuser,
                            'email' => $stremail,
                            'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
                            'urlrecuperacion' => $urlrecuperar
                        );
                        $sendemail = sendEmail($datausuario, 'emailcambiopassword');
                    }
                    if ($option == 2) {
                        $arrresponse = array('status' => true, 'msg' => 'Datos Actualizados Correctamente');
                    }
                } else {
                    if ($requestusuario == -1) {
                        $arrresponse = array('status' => false, 'msg' => '!Atencion! El usuario ya existe');
                    } else
                        $arrresponse = array('status' => false, 'msg' => 'No se almaceno los datos');
                }
            }
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    //Update
    public function getusuario($idusuario)
    {

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
    //Especial funciones de visualizacion

    public function getselectroles()
    {

        $htmloptions = "";
        $arrdata = $this->model->selectroles();
        if (count($arrdata) > 0) {
            for ($i = 0; $i < count($arrdata); $i++) {
                $htmloptions .= '<option value="' . $arrdata[$i]['idrol'] . '">' . $arrdata[$i]['tipo'] . '</option>';
            }
        }
        echo $htmloptions;
        die();
    }

    //Delete
    public function delusuario()
    {
        if ($_POST) {

            $intidusuario = intval($_POST['idusuario']);

            $requestdelete = $this->model->deleteusaurio($intidusuario);

            if ($requestdelete == 'ok') {
                $arrresponse = array('status' => true, 'msg' => 'Datos Eliminados Correctamente ' );
            } else {
                if ($requestdelete == 'existe') {
                    $arrresponse = array('status' => false, 'msg' => 'No es Posible Eliminar un rol asociado a un usuario' );
                } else
                    $arrresponse = array('status' => false, 'msg' => 'No se elimino los datos' );
            }
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
