<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastro Organizador</title>
		<link rel="stylesheet" type="text/css" href="cadastroDesign.css">
		<script type="text/javascript">
		function carregarOrganizador() {
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					alert(this.responseText);
					window.location.href = "index.php";
				}
			};
			var url = "class-organizador.php?nomeOrganizador="+dados.nomeOrganizador.value+"&email="+dados.email.value+"&datanasc="+dados.datanasc.value+"&funcao="+dados.funcao.value;
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<h1>Cadastro de Organizador</h1><br>
		<div id="cadastro">
		<form id="dados" method="get">
			Nome Completo: <input type="text" name="nomeOrganizador"><br>
			Email: <input type="email" name="email"><br>
			Data de Nascimento: <input type="text" name="datanasc"><br>
			Função: 
			<input type="radio" name="funcao" value="Juiz"> Juiz
			<input type="radio" name="funcao" value="Bandeirinha"> Bandeirinha
			<input type="radio" name="funcao" value="Placar"> Placar<br>
			
			<input type="button" id="enviar" value="Confirmar" onclick="javascript:carregarOrganizador()"><br>
			
		</form>
		
		</div>

	</body>
</html>