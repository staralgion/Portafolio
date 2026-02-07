<?php
class Roles extends Controllers
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
        
        getpermisos(3);
        
        if(empty($_SESSION['permisosmod']['r'])){
            header('Location: '.base_url()."/Perfil");
        }
    }

    //Visualizacion
    public function Roles()
    {
        $data['page_tag'] = "Roles";
        $data['page_title'] = "Pagina Principal";
        $data['page_name'] = "roles";
        $data['page_js'] = "functionroles.js";

        $this->views->getview($this, "roles", $data);
    }
    //Visualizacion
    public function getroles()
    {
        $arrdata = $this->model->selectroles();
 
        $crudopciones = 'Sin acciones';
        $btnview='';
        $btnedit='';
        $btndelete='';

        for ($i = 0; $i < count($arrdata); $i++) {
            
            if ($arrdata[$i]['estado'] == 1) {
                $arrdata[$i]['estado'] = '<span class="badge bg-primary">Activo</span>';
            } else {
                $arrdata[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
            }

            $cipherid = openssl_encrypt($arrdata[$i]['idrol'], 'aes-256-cbc', ENCRYPTION, 0, ENCRYPTION . IV);

    
            if($_SESSION['permisosmod']['u']){
            $btnview = '<a class="btn btn-outline-secondary btn-sm btnpermisorol" rl="'.$cipherid.'" title="Perm"><i class="far fa-file-alt"></i></a>';
            $btnedit = '<a class="btn btn-outline-secondary btn-sm btneditroles" rl="'.$cipherid.'" title="Edit"><i class="fas fa-pencil-alt"></i></a>';
            }
            if($_SESSION['permisosmod']['d']){
            $btndelete = '<a class="btn btn-outline-secondary btn-sm btndelroles" rl="'.$cipherid.'" title="Del">    <i class="far fa-trash-alt"></i></a>';
            }
            

            $crudopciones = $btnview . ' ' . $btnedit . ' ' . $btndelete;

            $arrdata[$i]['acciones'] = '<div class="text-center">' . $crudopciones . '</div>';
        }

        echo json_encode($arrdata, JSON_UNESCAPED_UNICODE);
        die();
    }


    //Insert 
    //Logica update como
    public function setroles()
    {
        $requestrol = 0;
        if ($_POST) {
            if (empty($_POST['txttipo']) || empty($_POST['txtdescripcion']) || empty($_POST['listestado'])) {
                $arrresponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {

                $intidrol = intval($_POST['idrol']);
                $strtipo = strclean($_POST['txttipo']);
                $strdescripcion = strclean($_POST['txtdescripcion']);
                $intstatus = intval($_POST['listestado']);


                if ($intidrol == 0 && $_SESSION['permisosmod']['w']) {
                    $requestrol = $this->model->insertrol($strtipo, $strdescripcion, $intstatus);
                    $option = 1;
                }
                if ($intidrol != 0 && $_SESSION['permisosmod']['u']) {
                    $requestrol = $this->model->updaterol($intidrol, $strtipo, $strdescripcion, $intstatus);
                    $option = 2;
                }

                if ($requestrol > 0) {

                    if ($option == 1) {
                        $arrresponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente');
                    }
                    if ($option == 2) {
                        $arrresponse = array('status' => true, 'msg' => 'Datos Actualizados Correctamente');
                    }
                } else {
                    if ($requestrol == -1) {
                        $arrresponse = array('status' => false, 'msg' => '!Atencion! El rol ya existe');
                    } else
                        $arrresponse = array('status' => false, 'msg' => 'No se almaceno los datos');
                }
            }
        }



        echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Update
    public function getrol(string $idrol)
    {
        
        $idrol = $_POST['idrol'];
        //dep($_POST);
        $intidrol = openssl_decrypt($idrol, 'aes-256-cbc', ENCRYPTION, 0, ENCRYPTION . IV);
        


        if ($intidrol > 0) {
            if($_SESSION['permisosmod']['u']){
            $arrdata = $this->model->selectrol($intidrol);}
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

    // public function getselectroles()
    // {

    //     $htmloptions = "";
    //     $arrdata = $this->model->selectroles();
    //     if (count($arrdata) > 0) {
    //         for ($i = 0; $i < count($arrdata); $i++) {
    //             $htmloptions .= '<option value="' . $arrdata[$i]['idrol'] . '">' . $arrdata[$i]['tipo'] . '</option>';
    //         }
    //     }
    //     echo $htmloptions;
    //     die();
    // }

    //Delete
    public function delrol()
    {
        if ($_POST) {
            $requestdelete = 0;
            $idrol = $_POST['idrol'];
            $intidrol = openssl_decrypt($idrol, 'aes-256-cbc', ENCRYPTION, 0, ENCRYPTION . IV);
            if($_SESSION['permisosmod']['d']){
            $requestdelete = $this->model->deleterol($intidrol);}
            
            if ($requestdelete == 'ok') {
                $arrresponse = array('status' => true, 'msg' => 'Datos Eliminados Correctamente');
            } else {
                if ($requestdelete == 'existe') {
                    $arrresponse = array('status' => false, 'msg' => 'No es Posible Eliminar un rol asociado a un usuario');
                } else
                    $arrresponse = array('status' => false, 'msg' => 'No se elimino los datos');
            }
            echo json_encode($arrresponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
