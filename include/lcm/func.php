<?php
	function CharOnline($conexao, $char){
		$procura_char="SELECT * FROM [ClanDB].[dbo].[CT] WHERE ChName='".$char."'";
		$resultado = odbc_exec($conexao,$procura_char);
		
		$contador_total=0;
		while($temp = odbc_fetch_into($resultado, &$counter)){
			$contador_total++;
		}
		
		 if($contador_total=="0"){
			$imagem="<img src='imagens/Coffline.gif'>";
		  }else{
			$imagem="<img src='imagens/Conline.gif'>";
		  }
		  
		return $imagem;
	}
	
    function char2Name($classNum)
    {
        switch ($classNum)
        {
            case "1":
                $charClassName="Fighter";
            break;

            case "2":
                $charClassName="Mechanician";
            break;

            case "3":
                $charClassName="Archer";
            break;

            case "4":
                $charClassName="Pikeman";
            break;

            case "5":
                $charClassName="Atalanta";
            break;

            case "6":
                $charClassName="Knight";
            break;

            case "7":
                $charClassName="Magician";
            break;

            case "8":
                $charClassName="Priestess";
            break;

            default:
                return false;

        }

        return $charClassName;
    }

?>
