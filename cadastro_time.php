
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastro Time</title>
		<script src="jquary.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				 $("div#cadastroJogadores").hide();
				$("#confirmaTime").click(function (){
					carregaTime();
					$("div#cadastroJogadores").show();
				});
				$("#addJogador").click(function (){
					carregaJogador();
				});
			});
			
			function carregaTime() {
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						alert(this.responseText);
					}
				};
				var url = "class-time.php?nome="+cadastroTime.timeJogador.value+"&tecnico="+cadastroTime.tecnico.value;

				xmlhttp.open("GET",url,true);
				xmlhttp.send();
			}
		
			function setTime() {
				document.getElementById("nomeTime").innerHTML = cadastroTime.timeJogador.value;
			}
			
			function cadastraJogador(){
				Jogador = new jogador();
				
				var newRow = document.createElement('tr');
					newRow.insertCell(0).innerHTML = Jogador.numero;
					newRow.insertCell(1).innerHTML = Jogador.apelido;
					newRow.insertCell(2).innerHTML = Jogador.nomecompleto;
					newRow.insertCell(3).innerHTML = Jogador.datanasc;
					newRow.insertCell(4).innerHTML = Jogador.posicao;
					document.getElementById("tabelaCorpo").appendChild(newRow);

			}
			
			function jogador() {
				this.numero = jogadores.numero.value;
				this.apelido = jogadores.apelido.value;
				this.nomecompleto = jogadores.nomeJogador.value;
				this.datanasc = jogadores.datanasc.value;
				this.posicao = jogadores.posicao.value;
			}
			
			function carregaJogador() {
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						alert(this.responseText);
					}
				};
				var url = "class-jogador.php?numero="+jogadores.numero.value+"&apelido="+jogadores.apelido.value+"&nomeCompleto="+jogadores.nomeJogador.value+"&dataDeNascimento="+jogadores.datanasc.value+"&posicao="+jogadores.posicao.value+"&time="+cadastroTime.timeJogador.value;
				
				xmlhttp.open("GET",url,true);
				xmlhttp.send();
			}
			
		</script>
		<link rel="stylesheet" type="text/css" href="cadastroDesign.css">
	</head>
	<body>
		<h1>Cadastro de Time</h1><br>
		<div id="cadastro">
		<form id="cadastroTime" method="post">
			Nome do Time: <input type="text" id="timeJogador"> 
			Técnico: <input type="text" id="tecnico"> 
			<input type="button" id="confirmaTime" value="Confirmar Time" onclick="javascript:setTime()"><br>
		</form>
		</div><br>
		
		<div id="cadastroJogadores">
		<h3><label id="nomeTime">Time</label></h3>
		<form id="jogadores" method="post">
			Numero: <input type="number" id="numero"><br>
			Apelido: <input type="text" id="apelido"><br>
			Nome Completo: <input type="text" id="nomeJogador"><br>
			Data de Nascimento: <input type="date" id="datanasc"><br>
			Posição: <input type="text" id="posicao"><br>
			
			<input type="reset" id="addJogador" value="Adicionar Jogador" onclick="javascript:cadastraJogador()"><br>
		</form>
		
		<br>
		<table border='1' >
			<tr>
				<th>Numero</th>
				<th>Apelido</th>
				<th>Nome Completo</th>
				<th>data nascimento</th>
				<th>Posição</th>
			 </tr>
			<tbody id="tabelaCorpo"></tbody>
		</table>
		
		<br>
		<a href="index.php"><input type="button" id="finalizar" value="Concluir Time" onclick="alert('Time cadastrado com Sucesso!');"></a><br>
		</div>
	</body>
</html>