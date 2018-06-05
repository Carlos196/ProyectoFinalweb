<?php 
require_once 'matriz.php';
require_once 'crear_ficha.php';

class Tablero
{
	private $cuadricula;
	
	
	function __construct($dimencion)
	{
		$this->cuadricula = new Cmatriz($dimencion,$dimencion);
	}

	public function get_cuadricula()
	{
		return $this->cuadricula;
	}
	public function llenar()
	{
		$col = $this->cuadricula->get_Columna();
		$fil = $this->cuadricula->get_Fila();
		for ($x=0; $x < $col; $x++) { 
			for ($y=0; $y < $fil; $y++) { 
				$this->get_Cuadricula()->set_Dato($y, $x, rand(1,6));
			}
		}
	}

	public function pintar()
	{
		require_once 'crear_ficha.php';

		$col = $this->cuadricula->get_Columna();
		$fil = $this->cuadricula->get_Fila();

		$table = "<table>";

		for ($x=0; $x < $col; $x++) {
			$table.= "<tr>";
			for ($y=0; $y < $fil; $y++) {
				$table.="<td id='".$y."-".$x."' >";
				switch ($this->get_Cuadricula()->get_Dato($y,$x)) {
					case 0:
						$data= $_SESSION["fichas"]->buscar("get_id",0);
						break;
					case 1:
						$data= $_SESSION["fichas"]->buscar("get_id",1);
						break;
					case 2:
						$data= $_SESSION["fichas"]->buscar("get_id",2);
						break;
					case 3:
						$data= $_SESSION["fichas"]->buscar("get_id",3);
						break;
					case 4:
						$data= $_SESSION["fichas"]->buscar("get_id",4);
						break;
					case 5:
						$data= $_SESSION["fichas"]->buscar("get_id",5);
						break;
					case 6:
						$data= $_SESSION["fichas"]->buscar("get_id",6);
						break;
				}
				$table.= "<img src='".$data->get_img()."'>";
				$table.="</td>";
			}
			$table.= "</tr>";
		}
		$table.= "</table>";

		return $table;
	}

	public function valid_move($p1,$p2)
	{
		//$p1[0]=>columna, $p1[2]=>fila
		$p_1 = $this->get_Cuadricula()->get_Dato($p1[0], $p1[2]);
		$p_2 = $this->get_Cuadricula()->get_Dato($p2[0], $p2[2]);

		//mover los elementos
		$this->get_Cuadricula()->set_Dato($p1[0], $p1[2], $p_2);
		$this->get_Cuadricula()->set_Dato($p2[0], $p2[2], $p_1);

		//si esta en el medio
		$p_2_r = $this->get_Cuadricula()->get_Dato($p2[0]-1, $p2[2]);//right
		$p_2_l = $this->get_Cuadricula()->get_Dato($p2[0]+1, $p2[2]);//left
		$p_2_u = $this->get_Cuadricula()->get_Dato($p2[0], $p2[2]-1);//up
		$p_2_d = $this->get_Cuadricula()->get_Dato($p2[0], $p2[2]+1);//down
		//si esta al lateral
		$p_2_r2 = $this->get_Cuadricula()->get_Dato($p2[0]-2, $p2[2]);//right+2
		$p_2_l2 = $this->get_Cuadricula()->get_Dato($p2[0]+2, $p2[2]);//left+2
		$p_2_u2 = $this->get_Cuadricula()->get_Dato($p2[0], $p2[2]-2);//up+2
		$p_2_d2 = $this->get_Cuadricula()->get_Dato($p2[0], $p2[2]+2);//down+2

		if (($p1[0] == $p2[0]) or ($p1[2] == $p2[2])) {
			if (($p_1==$p_2_r and $p_1==$p_2_l) or ($p_1==$p_2_u and $p_1==$p_2_d) or ($p_1==$p_2_r and $p_1==$p_2_r2) or ($p_1==$p_2_l and $p_1==$p_2_l2) or ($p_1==$p_2_u and $p_1==$p_2_u2) or ($p_1==$p_2_d and $p_1==$p_2_d2)) {

				return 1;//movimiento valido
			
			} else {
				$this->get_Cuadricula()->set_Dato($p1[0], $p1[2], $p_1);
				$this->get_Cuadricula()->set_Dato($p2[0], $p2[2], $p_2);

				return 0;
			}
		} else {
			$this->get_Cuadricula()->set_Dato($p1[0], $p1[2], $p_1);
			$this->get_Cuadricula()->set_Dato($p2[0], $p2[2], $p_2);

			return 0;
		}
	}

	public function linea()
	{
		for ($i=0; $i < $this->cuadricula->get_Columna(); $i++) {
			for ($j=0; $j < $this->cuadricula->get_Fila(); $j++) {

				if ( ($this->cuadricula->get_Dato($i,$j) == $this->cuadricula->get_Dato($i-1,$j)) and ($this->cuadricula->get_Dato($i,$j) == $this->cuadricula->get_Dato($i+1,$j)) ) {

					

					$this->get_Cuadricula()->set_Dato($i, $j, rand(1,6));
					$this->get_Cuadricula()->set_Dato($i-1, $j, rand(1,6));
					$this->get_Cuadricula()->set_Dato($i+1, $j, rand(1,6));
					return "&&a=".$i."-".$j."&&b=".($i-1)."-".$j."&&c=".($i+1)."-".$j;

				}
				if ( ($this->cuadricula->get_Dato($i,$j) == $this->cuadricula->get_Dato($i,$j-1)) and ($this->cuadricula->get_Dato($i,$j) == $this->cuadricula->get_Dato($i,$j+1)) ) {

					$this->get_Cuadricula()->set_Dato($i, $j, rand(1,6));
					$this->get_Cuadricula()->set_Dato($i, $j-1, rand(1,6));
					$this->get_Cuadricula()->set_Dato($i, $j+1, rand(1,6));
					return "&&a=".$i."-".$j."&&b=".$i."-".($j-1)."&&c=".$i."-".($j+1);
				}
			}
		}
	}
	
}

 ?>