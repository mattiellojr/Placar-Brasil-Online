<?php 
	class Organizador{
		private $nomeCompleto;
		private $Email;
		private $dataDeNascimento;
		private $funcao; 
		
		function Organizador($nomeCompleto="", $Email="", $dataDeNascimento="", $funcao=""){
			$this->nomeCompleto = $nomeCompleto;
			$this->Email = $Email;
			$this->dataDeNascimento = $dataDeNascimento;
			$this->funcao = $funcao;
			
			$this->guardarDB();
		}
		
		function guardarDB(){
			$con = mysqli_connect("localhost", "root", "victor", "placarBrasilBD");
	
			if(mysqli_connect_errno()){
				echo "Erro ao conectar no MySQL: " . mysqli_connect_error;
			}

			$quary = "INSERT INTO organizador VALUES('{$this->nomeCompleto}','{$this->Email}','{$this->dataDeNascimento}','{$this->funcao}');";
			if(!mysqli_query($con,$quary)){
				echo "Erro ao cadastrar organizador: " . mysqli_error($con);
			}
			else{
				echo " Organizador cadastrado com sucesso!";
			}
			
			
			mysqli_close($con);
		}
	}
	
	$organizador = new Organizador($_GET['nomeOrganizador'],$_GET['email'],$_GET['datanasc'],$_GET['funcao']);
	
?>