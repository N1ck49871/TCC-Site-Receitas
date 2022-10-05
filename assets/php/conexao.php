<?php 

    class Conexao {

        private $usuario = 'root';
	    private $senha = '';

        public function conexao(){
	    	return new PDO('mysql:host=localhost;dbname=tcc_receitas; charset=utf8', $this->usuario, $this->senha);
		}



    }        
?>