<?php 
//Moises
    class RolesModel extends Mysql{
        //Nivel de accesos
        private $intidrol;
        private $intiduser;
        private $strtipo;
        private $strdescripcion;
        private $intestado;


        public function __construct() {

            parent::__construct();
        }
        //Visualizacion
        public function selectroles(){
            $this->intiduser = $_SESSION['iduserad'];
            
            $sql= "SELECT idrol FROM tusuarios WHERE idusuario = $this->intiduser ";
            $idrol = $this->select($sql);
            if($idrol['idrol'] === 1){
                $sql="SELECT * FROM troles
                WHERE estado != 0";
                $request=$this->selectall($sql);

            }else{
                $sql="SELECT * FROM troles
                WHERE estado != 0 AND idrol != 1";
                $request=$this->selectall($sql);
            }

       
            return $request;
        }
   

        //Insert
        public function insertrol(string $tipo, string $descripcion,  int $estado){
            $return = 0;
            $this->strtipo=$tipo;
            $this->strdescripcion=$descripcion;
            $this->intestado=$estado;

            $sql= "SELECT * FROM troles WHERE tipo='{$this->strtipo}'";
            $requestinsert = $this->selectall($sql);
            if(empty($requestinsert)){
                $queryinsert="INSERT INTO troles(tipo,descripcion,estado) VALUES (?,?,?)";
                $arrdata = array($this->strtipo,$this->strdescripcion,$this->intestado);
                $requestinsert= $this->insert($queryinsert,$arrdata);
                $return = $requestinsert;
            }else{
                $return=-1;
            }
            return $return;
        }
        //Update
        public function updaterol(int $idrol, string $tipo, string $descripcion, int $estado){
            
            $this->intidrol=$idrol;
            $this->strtipo=$tipo;
            $this->strdescripcion=$descripcion;
            $this->intestado=$estado;

            $sql= "SELECT * FROM troles WHERE tipo='$this->strtipo' AND idrol != $this->intidrol";
            

            $requestupdate = $this->selectall($sql);
            
            if(empty($requestupdate)){
                $queryupdate="UPDATE troles SET tipo=?,estado=? ,descripcion=?WHERE idrol=$this->intidrol";
                $arrdata = array($this->strtipo,$this->intestado,$this->strdescripcion);
                $requestupdate= $this->update($queryupdate,$arrdata);
                $return=$requestupdate;
            }else{
                $return=-1;
            }
            
            return $return;

        }

   
     
        //parte del delete
        public function selectrol(int $idrol){
            $this->intidrol= $idrol;
            $sql="SELECT * FROM troles WHERE idrol = $this->intidrol";
            $request=$this->select($sql);
            return $request;
        }



   
        //Delete
        public function deleterol(int $idrol){
            
            $this->intidrol=$idrol;
    

            $sql= "SELECT * FROM tusuarios WHERE idrol=$this->intidrol";
            $requestdelete = $this->selectall($sql);
            if(empty($requestdelete)){
                $querydelete="UPDATE troles SET estado=? WHERE idrol = $this->intidrol";
                $arrdata = array(0);
                $requestdelete= $this->update($querydelete,$arrdata);
                if($requestdelete){
                    $requestdelete='ok';
                    $return=$requestdelete;
                }else{
                    $request='error';
                    $return=$request;
                }
            }else{
                $return='existe';
            }
            
            return $return;

        }


    }
