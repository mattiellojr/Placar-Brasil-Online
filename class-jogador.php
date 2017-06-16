<?php 
	class Jogador{
		private $numero;
		private $apelido;
		private $nomeCompleto;
		private $dataDeNascimento;
		private $posicao; 
		private $time;
		
		function Jogador($numero, $apelido, $nomeCompleto, $dataDeNascimento, $posicao="", $time){
			$this->numero = $numero;
			$this->apelido = $apelido;
			$this->nomeCompleto = $nomeCompleto;
			$this->dataDeNascimento = $dataDeNascimento;
			$this->posicao = $posicao;
			$this->time = $time;
			
			$this->guardarDB();
		}
		
		function guardarDB(){
			$con = mysqli_connect("localhost", "root", "victor", "placarBrasilBD");
	
			if(mysqli_connect_errno()){
				echo "Erro ao conectar no MySQL: " . mysqli_connect_error;
			}

			$quary = "INSERT INTO jogador(numero,apelido,nomecompleto,datanascimento,posicao,time) VALUES('{$this->numero}','{$this->apelido}','{$this->nomeCompleto}','{$this->dataDeNascimento}','{$this->posicao}','{$this->time}');";
			if(!mysqli_query($con,$quary)){
				echo "Erro ao cadastrar jogador: " . mysqli_error($con);
			}
			else{
				echo " Jogador cadastrado com sucesso!";
			}
			
			
			mysqli_close($con);
		}
	}
	
	$jogador = new Jogador($_GET['numero'],$_GET['apelido'],$_GET['nomeCompleto'],$_GET['dataDeNascimento'],$_GET['posicao'],$_GET['time']);
?>