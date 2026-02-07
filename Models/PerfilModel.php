<?php
//Moises
class PerfilModel extends Mysql
{
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
    private $strdireccion;

    private $strpassword;
    private $intsuscripcion;
    private $strtoken;

    public function __construct()
    {

        parent::__construct();
    }


    public function selectusuario(int $iduser)
    {
        $this->intidusuario = $iduser;
        $sql = "SELECT tu.idusuario, tu.nombre, tu.apellidos, tu.telefono, tu.correo, tu.direccion, tu.direccion
            FROM tusuarios tu
            JOIN troles tr ON tu.idrol = tr.idrol
            WHERE tu.idusuario = $this->intidusuario";
        $request = $this->select($sql);
        return $request;
    }

    public function updateusuario(int $idusuario, string $nombre, string $apellido, string $correo, int $telefono,  string $direccion)
    {

        $this->intidusuario = $idusuario;

    
        $this->strnombre = $nombre;
        $this->strapellido = $apellido;
        $this->strcorreo = $correo;
        $this->inttelefono = $telefono;
        $this->strdireccion = $direccion;


        $sql = "SELECT * FROM tusuarios WHERE nombre='{$this->strnombre}' AND apellidos='{$this->strapellido}' AND idusuario != $this->intidusuario";
        $requestupdate = $this->selectall($sql);

        if (empty($requestupdate)) {

            $queryupdate = "UPDATE tusuarios SET   nombre=?, apellidos=?, correo=? ,telefono=? ,direccion=? WHERE idusuario=$this->intidusuario";
            $arrdata = array(
         
                $this->strnombre,
                $this->strapellido,
                $this->strcorreo,
                $this->inttelefono,
                $this->strdireccion
            );
            $requestupdate = $this->update($queryupdate, $arrdata);
            $return = $requestupdate;
        } else {
            $return = -1;
        }

        return $return;
    }



    public function settokenuser(int $iduser, string $token)
    {
        $this->intidusuario = $iduser;
        $this->strtoken = $token;
        $queryupdate = "UPDATE tusuarios SET token = ? WHERE idusuario =$this->intidusuario";
        $arrdata = array($this->strtoken);
        $requestupdate = $this->update($queryupdate, $arrdata);
        return $requestupdate;
    }
}
