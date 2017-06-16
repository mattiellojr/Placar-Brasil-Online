<html>
	<head>
		<meta charset="UTF-8">
		<title>Resultado</title>
		<link rel="stylesheet" type="text/css" href="cadastroDesign.css">
		<script type="text/javascript">
		function carregarJogo() {
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
			
			var url = "class-jogo.php?data="+document.getElementById('dataresult').innerHTML+"&local="+document.getElementById('localresult').innerHTML+"&juiz="+document.getElementById('juizresult').innerHTML+"&timeCasa="+document.getElementById('casaresult').innerHTML+"&timeFora="+document.getElementById('foraresult').innerHTML+"&golsCasa="+document.getElementById('golscasaresult').innerHTML+"&golsFora="+document.getElementById('golsforaresult').innerHTML;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<h1>Resultado da Partida</h1><br>
		<div id="result">
			Data: <label id="dataresult"><?php echo $_GET['dia']; ?></label><br>
			Local: <label id="localresult"><?php echo $_GET['local']; ?></label><br>
			Juiz: <label id="juizresult"><?php echo $_GET['juiz']; ?></label><br>
			Time da Casa: <label id="casaresult"><?php echo $_GET['casa']; ?></label>- Gols: <label id="golscasaresult"><?php echo $_GET['golscasa']; ?></label><br>
			Time de Fora: <label id="foraresult"><?php echo $_GET['fora']; ?></label>- Gols: <label id="golsforaresult"><?php echo $_GET['golsfora']; ?></label><br>
			Vencedor: <label id="vencedorresult">
				<?php 
					if($_GET['golscasa'] > $_GET['golsfora']){
						echo $_GET['casa'];
					} elseif($_GET['golsfora'] > $_GET['golscasa']){
						echo $_GET['fora'];
					} else{
						echo "Empate"; 
					}
				?>
			</label><br>
			<input type="button" id="buttonExit" class="button" value="Confirmar" onclick="carregarJogo()">
		</div>
	</body>
</html>