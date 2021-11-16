<?php 
class Usuario{
 
    public $nombre;
    public $apellido;
    public $email;
    public $tipo;
    public $provincia;
    public $nombre_distrito;
    public $telefono;

    function __construct($n,$a,$e,$t,$p,$nd,$te) {
        $this->nombre =$n;
        $this->apellido =$a;
        $this->email =$e;
        $this->tipo =$t;
        $this->provincia =$p;
        $this->nombre_distrito =$nd;
        $this->telefono =$te;
        
    }

}
?>