<?php
//Moises
class DashboardModel extends Mysql
{
    //Nivel de accesos
    private $intidmarca;
    private $strmarca;
    private $intestado;


    public function __construct()
    {

        parent::__construct();
    }
    //Visualizacion



    //parte del delete
    public function selectclientes()
    {

        $sql = "SELECT COUNT(*) AS total_usuarios FROM tusuarios WHERE idrol = 2;";
        $request = $this->select($sql);
        return $request;
    }


    public function selectpersonal()
    {

        $sql = "SELECT COUNT(*) AS total_usuarios FROM tusuarios WHERE idrol != 2 AND idrol != 1;";
        $request = $this->select($sql);
        return $request;
    }
    public function selectproductos()
    {
        $sql = "SELECT COUNT(*) AS total_productos FROM tproducto";
        $request = $this->select($sql);
        return $request;
    }
    public function selectmarcas()
    {
        $sql = "SELECT COUNT(*) AS total_marcas FROM tmarcas";
        $request = $this->select($sql);
        return $request;
    }
    public function selectaprendisaje()
    {
        $sql = "SELECT COUNT(*) AS total_modelo FROM tsolicitudes WhERE estado = 3";
        $request = $this->select($sql);
        return $request;
    }

    public function selectsolicitudes()
    {
        $sql = "SELECT COUNT(*) AS total_modelo FROM tsolicitudes WhERE estado = 1";
        $request = $this->select($sql);
        return $request;
    }
}
