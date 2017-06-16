<html>
	<head>
		<meta charset="UTF-8">
		<title>Placar Brasil Online</title>
		<style type="text/css">
			body{ color:darkgreen; font-family:Arial; background-image:url("esporte-campo-de-futebol.jpg"); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; }
			#banner{ position:absolute; left:15%;}
			#painel{ position:absolute; top:20%; bottom:0%; left:12%; right:15%;}
			#linkcadatratime{ position:absolute; top:49%;}
			#linkcadatraorg{ position:absolute; top:65%; left:42%;}
			div#info{ background-color:limegreen; position:absolute; top:0%; left:42%; height:335px; width:637px;}
		</style>
		<script src="jquary.js"></script>
		<script>
			$(document).ready(function() {
				$(".link").hover(function() {
					$(this).css("border","5px solid green");
				}, function(){
					$(this).css("border", "");
				});
					
			});
		</script>
	</head>
	<body>
		<img id="banner" src="banner.jpg" >
		<div id="painel">
			<a href="novo_jogo.php"><img class="link" src="novojogo.jpg"></a>
			<div id="info" class="link">
				<h2><center>Benvindo ao Placar Brasil Online</center></h2>
				<br>
				<center>
				<table border='1' >
					<tr>
						<th>Nro</th>
						<th>Data</th>
						<th>Local</th>
						<th>Juiz</th>
						<th>TimeCasa</th>
						<th>GolsCasa</th>
						<th>GolsFora</th>
						<th>TimeFora</th>
					 </tr>
					<tbody id="tabelaCorpo">
						<?php
							$con = mysqli_connect("localhost", "root", "victor", "placarBrasilBD");
							if(mysqli_connect_errno()){
								echo "Erro ao conectar no MySQL: " . mysqli_connect_error;
							}
							$execItems = $con->query("SELECT * FROM jogo;");
							while($infoItems = $execItems->fetch_array()){
							echo    "
                            <tr>
                                <td>".$infoItems['numero']."</td>
                                <td>".$infoItems['data']."</td>
                                <td>".$infoItems['local']."</td>
                                <td>".$infoItems['juiz']."</td>
                                <td>".$infoItems['timeCasa']."</td>
								<td>".$infoItems['golsCasa']."</td>
								<td>".$infoItems['golsFora']."</td>
								<td>".$infoItems['timeFora']."</td>
                            </tr>
							";

						}
						?>
					</tbody>
				</table>
				</center>
				<br>
			</div>
			<br>
			<a href="cadastro_time.php"><img id="linkcadatratime" class="link" src="campofutebol.jpg"></a>
			<a href="cadastro_organizador.php"><img src="players.jpg" id="linkcadatraorg" class="link"></a>
		</div>
	</body>
</html>