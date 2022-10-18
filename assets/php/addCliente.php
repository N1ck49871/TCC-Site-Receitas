	<?php

		include_once 'conexao.php';
		include_once 'usuarioController.php';

		function addCliente($dados){
			$usuario = new usuarioController();
			$result = $usuario->cadastrar($dados);

			if ($result){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../template_store/login.php'>
					<script type=\"text/javascript\">
						alert(\"Cadastro realizado com sucesso!\");
					</script>
					";
			}else{
	    		echo "Erro ao cadastrar";
	    		$result->errorInfo();
			}
		}
	?>