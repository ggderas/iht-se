<?php
	$nombrePagina = 'Misión y Visión';
	require_once("util.php");
?>

<!DOCTYPE html>
<html>
	<head>

		<?php require_once($rootAddress . "content/header.php"); ?>

	</head>

	<body>
		<div class="container">

			<?php require_once($rootAddress . "content/menu.php"); ?>

			<div class="row">
        <div class="col-lg-4">
          <figure>
            <img src="<?php echo $rootAddress; ?>icos/icon-idea.png" alt="" />
          </figure>
        </div>
				<div class="col-lg-8">
					<h2 class="text-center">Misión</h2>
					<p class="text-justify">
							Ser una institución eficiente, Transparente, con credibilidad y reconocimiento del sector público y privado,
						  con personal técnico capacitado, honesto y comprometido con los programas y acciones encaminadas a lograr que
					 	  Honduras en el año 2021, posicione sus destinos turísticos establecidos en la Estrategia Nacional de Turismo
							Sostenible a través de la Puesta en Valor, Consolidación y Diversificación de mercados, productos, y destinos,
							así como del fomento a la competitividad de las empresas del sector de forma que brinde un servicio de calidad
							internacional.
					</p>
				</div>
			</div>



		</div>



	</body>
	<?php require_once($rootAddress . "content/footer.php"); ?>

</html>
