<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Placar Brasil Online</title>
		<script src="jquary.js"></script>
		<script>
			var IN = 0;
			var OUT = 0;
			var diaDeJogo = new Date();
			$(document).ready(function() {
				$("#dia").text( diaDeJogo.getDate()+"/"+diaDeJogo.getMonth()+"/"+diaDeJogo.getFullYear());
				$("#golsCasa").text(IN);
				$("#golsFora").text(OUT);
				
				$("#local").prop("disabled",true);
				$("#juiz").prop("disabled",true);
				$("#timeCasa").prop("disabled",true);
				$("#timeFora").prop("disabled",true);
				$("#buttonStart").show();
				$("#buttonGolCasa").prop("disabled",true);
				$("#buttonGolFora").prop("disabled",true);
				$("#buttonFin").prop("disabled",true);
				
				$("#buttonStart").click(function() {
					$("#buttonGolCasa").prop("disabled",false);
					$("#buttonGolFora").prop("disabled",false);
					$("#buttonFin").prop("disabled",false);
					
					$("#buttonStart").hide();
				});
				
				$("#buttonGolCasa").click(function() {
					IN++;
					$("#golsCasa").text(IN);
				});
				$("#buttonGolFora").click(function() {
					OUT++;
					$("#golsFora").text(OUT);
				});
				
				$("#buttonFin").click(function() {
					resultadosFinais();
					
				});
			});
			
			function resultadosFinais(){
				var URL = "resultadoJogo.php?";
				URL += "dia=" + document.getElementById("dia").innerHTML;
				URL += "&local=" + document.getElementById("local").value;
				URL += "&juiz=" + document.getElementById("juiz").value;
				URL += "&local=" + document.getElementById("local").value;
				URL += "&casa=" + document.getElementById("timeCasa").value;
				URL += "&golscasa=" + document.getElementById("golsCasa").innerHTML;
				URL += "&fora=" + document.getElementById("timeFora").value;
				URL += "&golsfora=" + document.getElementById("golsFora").innerHTML;

				window.location.href = URL;
			}
		</script>
		
		<style type="text/css">
			body{ color:darkgreen; font-family:Arial; background-image:url("campo_futebol_placar.jpg"); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; }
			div#info{ font-size:10pt; color:white; position:absolute; top:20%; left:37%}
			div#placar{ background-color:limegreen; position:absolute; top:25%; left:6%; border-style:solid; padding:100px;}
			label.x{  font-size:20pt;}
			.button{ font-size:20pt;}
			.timeNome{ font-size:20pt;}
			#buttonFin{ top:80%; left:46%; position:absolute;}
			#buttonExit{ top:80%; left:46%; position:absolute;}
			#buttonStart{ width:250px; height:100px; top:40%; left:40%; position:absolute;}
			.golsCount{ font-size:70pt; border-style:solid; padding:10px;}
		</style>
	</head>
	<body>
	<div id="info">
		<label id="dia"></label> Local: <input type="text" id="local" value="<?php echo $_GET["estadio"];?>"> Juiz: <input type="text" id="juiz" value="<?php echo $_GET["juiz"];?>"><br>
	</div>
	<div id="placar">
		<input type="button" id="buttonStart" class="button" value="Começar Jogo" >
	
		<label class="x">Casa</label>
		<input type="text" id="timeCasa" class="timeNome" value="<?php echo $_GET["timeCasa"];?>">
		<label id="golsCasa" class="golsCount"></label>
		<input type="button" id="buttonGolCasa" class="button" value="GOL">
		<label class="x">X</label>
		<input type="button" id="buttonGolFora" class="button" value="GOL">
		<label id="golsFora" class="golsCount"></label>
		<input type="text" id="timeFora" class="timeNome" value="<?php echo $_GET["timeFora"];?>">
		<label class="x">Fora</label>
	</div>
	
	<input type="button" id="buttonFin" class="button" value="Finalizar">
	
	
		
	</body>
</html>