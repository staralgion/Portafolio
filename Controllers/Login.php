<?php 
    class Login extends Controllers{
        public function __construct() {

            session_start();
       
            if(isset($_SESSION['loginad'])){
                header('Location: '.base_url()."/Personal");
            }
            parent::__construct();
        }
        public function Login(){

            $data['page_tag'] = "Login";
            $data['page_title']= "Login";
            $data['page_name'] = "Login";
            $data['page_functions_js'] = "functionlogin.js";
            $this->views->getview($this,"login",$data);
        }
        
        public function loginuser(){
            //dep($_POST);
            if($_POST){
                if(empty($_POST['txtemail']) || empty($_POST['txtpassword']) ){
                    $arrresponse= array('status'=>false,'msg'=>'Error de Datos');
                }else{
                    $struser= strtolower(strclean($_POST['txtemail']));
                    $strpassword= hash("SHA256",$_POST['txtpassword']);
                
                    $requestuser= $this->model->loginuser($struser,$strpassword);
                    
                    if(empty($requestuser)){
                        $arrresponse= array('status'=>false,'msg'=>'El usuario o contraseña es incorrectos');
                    }else{
                        $arrdata=$requestuser;
                        if($arrdata['estado']==1){

                            $_SESSION['iduserad']=$arrdata['idusuario'];
                            $_SESSION['loginad']=true;
                            $arrdata= $this->model->sessionlogin($_SESSION['iduserad']);

                            sessionuser($_SESSION['iduserad']);
                      
                            $arrresponse= array('status'=>true,'msg'=>'ok');

                        }else{
                            $arrresponse= array('status'=>false,'msg'=>'Usuario inactivo o suspendido');
                        }
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
    
            die();
        }

        public function forgotpassword(){

            $data['page_tag'] = "Login";
            $data['page_title']= "Login";
            $data['page_name'] = "Login";
            $data['page_functions_js'] = "functionlogin.js";
            $this->views->getview($this,"forgotpassword",$data);
        }

        public function resetpassword(){
            if($_POST){
                if(empty($_POST['txtemailreset'])){
                    $arrresponse= array('status'=>false,'msg'=>'Error en los campos');
                }else{
                    $token= token();
                    $stremail = strtolower(strclean($_POST['txtemailreset']));
                    $arrdata = $this->model->getuseremail($stremail);
                    if(empty($arrdata)){
                        $arrresponse= array('status'=>false,'msg'=>'Usuario no encontrado');
                    }else{
                        $idpersona = $arrdata['idusuario'];
                        $nombreuser= $arrdata['nombre'].' '.$arrdata['apellidos'];

                        $urlrecuperar= base_url().'/Login/confirmuser/'.$stremail.'/'.$token;
                        $requestupdate = $this->model->settokenuser($idpersona,$token);

                        $datausuario = array(
                            'nombreuser'=>$nombreuser,
                            'email'=>$stremail,
                            'asunto'=>'Recuperar cuenta - '.NOMBRE_REMITENTE,
                            'urlrecuperacion'=>$urlrecuperar
                        );

                   
                        
                        if($requestupdate){
                            $sendemail= sendEmail($datausuario,'emailcambiopassword');
                            if($sendemail){
                                $arrresponse= array('status'=>true,'msg'=>'Se envio un email a tu correo para cambiar tu contraseña');
                            }
                            else{
                                $arrresponse= array('status'=>false,'msg'=>'No es posible realizar el proceso');
                            }
                        }
                        else{
                            $arrresponse= array('status'=>false,'msg'=>'No es posible realizar el proceso');
                        }
                    }
                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }


        public function confirmuser(string $params){
            if(empty($params)){
                header('Location: '.base_url());
            }else{
                $arrdata=explode(',',$params);
                $stremail = strclean($arrdata[0]);
                $strtoken = strclean($arrdata[1]);
                $requestresponse = $this->model->getuserconfirm($stremail,$strtoken);
                if(empty($requestresponse)){
                    header('Location: '.base_url());
                }else{
                    $data['page_tag'] = "Cambiar Contraseña";
                    $data['page_title']= "Login";
                    $data['page_name'] = "cambiarcontraseña";
                    $data['page_functions_js'] = "functionlogin.js"; 
                    $data['idusuario']=$requestresponse['idusuario'];
                    $data['correo']= $stremail;
                    $data['token']= $strtoken;
                    $this->views->getview($this,"cambiopassword",$data);
                }

            }
          
        }


        public function setpassword(){
            if(empty($_POST['iduser']) || empty($_POST['txtpasswordcam']) || empty($_POST['txtpasswordconfirm']) || empty($_POST['txtemail'])  || empty($_POST['txttoken'])){
                $id=$_POST['iduser'];
                $arrresponse= array('status'=>false,'msg'=>'No es posible realizar el proceso revise sus datos'.$id);
            }else{
                $intiduser= intval( $_POST['iduser']);
                $strpassword=$_POST['txtpasswordcam'];
                $stremail=strclean( $_POST['txtemail']);
                $strtoken=strclean($_POST['txttoken']);
                $strpasswordconfirm=$_POST['txtpasswordconfirm'];

                if($strpassword != $strpasswordconfirm ){
                $arrresponse= array('status'=>false,'msg'=>'Las contraseñas no son iguales');
                }else{
                    $requestresponseuser = $this->model->getuserconfirm($stremail,$strtoken);
                    if(empty($requestresponseuser)){
                        $arrresponse= array('status'=>false,'msg'=>'Error de Datos');
                    }else{
                        $strpassword = hash("SHA256",$strpassword);
                        $requestpass=$this->model->insertpassword($intiduser,$strpassword);
                        if($requestpass){
                            $arrresponse= array('status'=>true,'msg'=>'Contraseña Actualizada Correctamente');
                        }
                        else{
                            $arrresponse= array('status'=>false,'msg'=>'No es posible realizar el proceso');
                        }
                    }
                }

            }
            echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            die();
        }



        public function setusuario()
        {
            if ($_POST) {
                if (empty($_POST['txtnombre']) || empty($_POST['txtapellido']) || empty($_POST['txtemailregister'])) {
                    $arrresponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {

                
           
                    $strnombre = ucwords(strclean($_POST['txtnombre']));
                    $strapellido = ucwords(strclean($_POST['txtapellido']));
                    $strcorreo = strtolower(strclean($_POST['txtemailregister']));
                    $intidrol = intval(2);
                   
                    $option = 1;
                     
                    $requestusuario = $this->model->insertusuario(
                        $intidrol,
                        $strnombre,
                        $strapellido,
                        $strcorreo,
                    );
                    

                    if ($requestusuario > 0) {
    
                        if ($option == 1) {
                            
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

                            if($sendemail){
                                $arrresponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente');
                            }else{
                                $this->model->deleteusuario($requestusuario);
                                $arrresponse = array('status' => false, 'msg' => 'No se almaceno los datos no se encontro email');
                            }
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

    }
?>