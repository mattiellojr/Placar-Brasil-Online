<?php 
	class Jogo{
		private $data;
		private $local;
		private $juiz;
		private $timeCasa;
		private $timeFora;
		private $golsCasa;
		private $golsFora;
		
		function Jogo( $data,$local,$juiz,$timeCasa,$timeFora,$golsCasa, $golsFora){
			$this->data = $data;
			$this->local = $local;
			$this->juiz = $juiz;
			$this->timeCasa = $timeCasa;
			$this->timeFora = $timeFora;
			$this->golsCasa = $golsCasa;
			$this->golsFora = $golsFora;
			
			$this->guardarDB();
		}
		
		function guardarDB(){
			$con = mysqli_connect("localhost", "root", "victor", "placarBrasilBD");
	
			if(mysqli_connect_errno()){
				echo "Erro ao conectar no MySQL: " . mysqli_connect_error;
			}

			$quary = "INSERT INTO jogo(data,local,juiz,timeCasa,timeFora,golsCasa,golsFora) VALUES('{$this->data}','{$this->local}','{$this->juiz}','{$this->timeCasa}','{$this->timeFora}','{$this->golsCasa}','{$this->golsFora}');";
			
			if(!mysqli_query($con,$quary)){
				echo "Erro ao cadastrar jogo: " . mysqli_error($con);
			}
			else{
				echo " Jogo cadastrado com sucesso!";
			}
			
			
			mysqli_close($con);
		}
		
		
	}
	
	$jogo = new Jogo($_GET['data'],$_GET['local'],$_GET['juiz'],$_GET['timeCasa'],$_GET['timeFora'],$_GET['golsCasa'],$_GET['golsFora']);
?>