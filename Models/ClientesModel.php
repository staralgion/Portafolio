<?php 
//Moises
    class ClientesModel extends Mysql{
        //Nivel de accesos
        private $intidusuario;
        private $intidrol;
        private $strci;
        private $strnombre;
        private $strapellido;
        private $strcorreo;
        private $intestado;
        private $inttelefono;
        private $intci;

        private $strpassword;
        private $intsuscripcion;
        private $strtoken;

        public function __construct() {

            parent::__construct();
        }
        //YO
        public function selectusuarios(){
            $sql= "SELECT tu.idusuario , tu.nombre, tu.apellidos, tu.correo, tu.telefono, tu.estado, tr.tipo 
            FROM tusuarios tu 
            JOIN troles tr ON tu.idrol = tr.idrol
            WHERE tu.estado != 0 AND tr.estado = 1 AND tu.idrol = 2";
            $request=$this->selectall($sql);
            return $request;
        }

        public function selectusuario(int $iduser){
            $this->intidusuario= $iduser;
            $sql= "SELECT tu.idusuario, tu.idrol, tu.ci, tu.nombre, tu.apellidos, tu.telefono, tu.correo, tu.direccion, tu.estado, tr.tipo
            FROM tusuarios tu
            JOIN troles tr ON tu.idrol = tr.idrol
            WHERE tu.idusuario = $this->intidusuario";
            $request=$this->select($sql);
            return $request;
        }


        public function insertusuario(int $idrol, string $nombre, string $apellido, string $email, int $telefono, string $password, int $estado){
            $this->intidrol = $idrol;
			//$this->intci = $ci;
			$this->strnombre = $nombre;
			$this->strapellido = $apellido;
			$this->strcorreo = $email;
			$this->inttelefono = $telefono;
            $this->strpassword = $password;
 
			$this->intestado = $estado;
            
			$return = 0;

			$sql = "SELECT * FROM tusuarios 
                    WHERE correo = '{$this->strcorreo}'";
			$request = $this->selectall($sql);

			if(empty($request))
			{
				$query  = "INSERT INTO tusuarios(idrol,nombre,apellidos,telefono,correo,password,estado) 
								  VALUES(?,?,?,?,?,?,?)";
	        	$arrdata = array($this->intidrol,
        						//$this->intci,
        						$this->strnombre,
                                $this->strapellido,
        						$this->inttelefono,
        						$this->strcorreo,
                                $this->strpassword,
                                $this->intestado,
                            );
	        	$request = $this->insert($query,$arrdata);
	        	$return = $request;
			}else{
                $return=-1; 
            }
            
            return $return;
        }
        //Update
        public function updateusuario(int $idusuario,string $nombre, string $apellido, string $correo,int $telefono,  int $estado){
			
            $this->intidusuario = $idusuario;
 
			//$this->strci        = $ci;
			$this->strnombre    = $nombre;
			$this->strapellido  = $apellido;
			$this->strcorreo    = $correo;
			$this->inttelefono  = $telefono;
            $this->intestado     = $estado;
            

            $sql= "SELECT * FROM tusuarios WHERE nombre='{$this->strnombre}' AND apellidos='{$this->strapellido}' AND idusuario != $this->intidusuario";
            $requestupdate = $this->selectall($sql);
            
            if(empty($requestupdate)){

                    $queryupdate="UPDATE tusuarios SET   nombre=?, apellidos=?, correo=? ,telefono=? ,estado=? WHERE idusuario=$this->intidusuario";
                    $arrdata = array(
        						//$this->strci,
        						$this->strnombre,
                                $this->strapellido,
        						$this->strcorreo,
        						$this->inttelefono,
                                $this->intestado
                    );
                $requestupdate= $this->update($queryupdate,$arrdata);
                $return=$requestupdate;
                
            }else{
                $return=-1;
            }
            
            return $return;

        }
       


        public function settokenuser(int $iduser, string $token){
            $this->intidusuario = $iduser;
            $this->strtoken= $token;
            $queryupdate="UPDATE tusuarios SET token = ? WHERE idusuario =$this->intidusuario";
            $arrdata = array($this->strtoken);
            $requestupdate= $this->update($queryupdate,$arrdata);
            return $requestupdate;
                
        }
        //Delete
      
        public function deleteusaurio(int $idusuario){
    
            $this->intidusuario=$idusuario;
            $querydelete="UPDATE tusuarios SET estado=? WHERE idusuario = $this->intidusuario";
            $arrdata = array(0);
            $requestdelete= $this->update($querydelete,$arrdata);

                //$querydelete="DELETE FROM rol  WHERE idrol = $this->intidrol";
                //$arrdata = array(0);
                //$requestdelete= $this->delete($querydelete,$arrdata);

                if($requestdelete){
                    $requestdelete='ok';
                    $return=$requestdelete;
                }else{
                    $request='error';
                    $return=$request;
                }
                /*
            }else{
                $return='existe';
            }
            */
            return $return;

        }

    }

?>