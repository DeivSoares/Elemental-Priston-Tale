<?php
	/*
	
	Configure as Linhas abaixo 
	
	*/
	  $cnf['clan'] = "http://74.63.232.113/ClanContent/"; // Link da pasta de ClanContent do seu server
	  
	  $cnf['clDB'] = "DRIVER={SQL Server};".		// N�o MECHA NESSA LINHA
	  				 "SERVER=PT\SQLEXPRESS;".		// Mude o NOME DO SEU SERVIDOR
					 "DATABASE=ClanDb"; 			// N�o MECHA NESSA LINHA
					 
      $cnf['user'] = "sa"; 				    // Usuario para a Base de Dados
      $cnf['pass'] = "1211196"; 		    // Senha para Base de Dados
	  
	  $conectar = odbc_connect($cnf['clDB'],$cnf['user'],$cnf['pass']);	// N�o MECHA NESSA LINHA
?>