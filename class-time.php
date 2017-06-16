<?php 
	class Time{
		private $nome;
		private $tecnico;
		
		function Time($nome, $tecnico=""){
			$this->nome = $nome;
			$this->tecnico = $tecnico;
			
			$this->guardarDB();
		}
		
		function guardarDB(){
			$con = mysqli_connect("localhost", "root", "victor", "placarBrasilBD");
	
			if(mysqli_connect_errno()){
				echo "Erro ao conectar no MySQL: " . mysqli_connect_error;
			}

			$quary = "INSERT INTO time(nome,tecnico) VALUES('{$this->nome}','{$this->tecnico}');";
			
			if(!mysqli_query($con,$quary)){
				echo "Erro ao cadastrar time: " . mysqli_error($con);
			}
			else{
				echo " Time cadastrado com sucesso!";
			}
			
			
			mysqli_close($con);
		}
	}
	
	$time = new Time($_GET['nome'],$_GET['tecnico']);
?>