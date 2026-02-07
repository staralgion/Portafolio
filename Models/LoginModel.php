<?php

class LoginModel extends Mysql
{

    public $intiduser;
    public $stremail;
    public $struser;
    public $strpassword;
    public $strtoken;
    private $intidrol;
    private $strnombre;
    private $strapellido;
    private $strcorreo;
    private $intestado;


    public function __construct()
    {

        parent::__construct();
    }


    public function loginuser(string $user, string $password)
    {
        $this->struser = $user;
        $this->strpassword = $password;
        $sql = "SELECT idusuario , estado FROM tusuarios WHERE correo='$this->struser'  AND password= '$this->strpassword' AND estado != 0";
        $request = $this->select($sql);
        return $request;
    }
    public function sessionlogin(int $iduser)
    {
        $this->intiduser = $iduser;

        $sql = "SELECT tu.idusuario , tu.idrol , tr.tipo, tu.nombre, tu.apellidos, tu.correo, tu.ci, tu.telefono, tu.estado
            FROM tusuarios tu
            INNER JOIN troles tr
            ON tu.idrol  = tr.idrol 
            WHERE tu.idusuario = $this->intiduser";
        $request = $this->select($sql);

        $_SESSION['userdataad'] = $request;
        return $request;
    }

    public function getuseremail(string $email)
    {
        $this->struser = $email;

        $sql = "SELECT idusuario , nombre, apellidos, estado FROM tusuarios WHERE correo='$this->struser' AND estado = 1";
        $request = $this->select($sql);
        return $request;
    }

    public function settokenuser(int $iduser, string $tokrn)
    {
        $this->intiduser = $iduser;
        $this->strtoken = $tokrn;
        $queryupdate = "UPDATE tusuarios SET token = ? WHERE idusuario =$this->intiduser";
        $arrdata = array($this->strtoken);
        $requestupdate = $this->update($queryupdate, $arrdata);
        return $requestupdate;
    }

    public function getuser(string $email, string $token)
    {
        $this->struser = $email;
        $this->strtoken = $token;
        $sql = "SELECT idusuario  FROM tusuarios WHERE correo='$this->struser' AND token= '$this->strtoken' AND estado = 1";
        $request = $this->select($sql);
        return $request;
    }

    public function getuserconfirm(string $email, string $token)
    {
        $this->struser = $email;
        $this->strtoken = $token;
        $sql = "SELECT idusuario  FROM tusuarios WHERE correo='$this->struser' AND token= '$this->strtoken'";
        $request = $this->select($sql);
        return $request;
    }


    public function insertpassword(int $iduser, string $password, )
    {
        $this->intiduser = $iduser;
        $this->strpassword = $password;
        $this->intestado = 1;
        
        $queryupdate = "UPDATE tusuarios SET password = ?, token = ?, estado = ? WHERE idusuario = $this->intiduser";
        $arrdata = array($this->strpassword, "",$this->intestado);
        $requestupdate = $this->update($queryupdate, $arrdata);
        return $requestupdate;
    }


    public function insertusuario(int $idrol, string $nombre, string $apellido, string $email)
    {
        $this->intidrol = $idrol;

        $this->strnombre = $nombre;
        $this->strapellido = $apellido;
        $this->strcorreo = $email;

        $this->intestado = 0;

        $return = 0;

        $sql = "SELECT * FROM tusuarios 
                    WHERE correo = '{$this->strcorreo}'";
        $request = $this->selectall($sql);

        if (empty($request)) {
            $query  = "INSERT INTO tusuarios(idrol,nombre,apellidos,correo,estado) 
								  VALUES(?,?,?,?,?)";
            $arrdata = array(
                $this->intidrol,
                $this->strnombre,
                $this->strapellido,
                $this->strcorreo,
                $this->intestado,
            );
            $request = $this->insert($query, $arrdata);
            $return = $request;
        } else {
            $return = -1;
        }

        return $return;
    }

    public function deleteusuario(int $idusuario)
    {
        $this->intiduser = $idusuario;
        $querydelete = "DELETE FROM tusuarios WHERE idusuario  = $this->intiduser";

        $requestdelete = $this->delete($querydelete);
        if ($requestdelete) {
            $return = true;
        } else {
            $return = false;
        }


        return $return;
    }
}
