<?php
class Inss
{
    public $salario;
  
    static $faixa = array(
        "1" => 1045,
        "2" => 2089.6,
        "3" => 3134.4,
        "4" => 6101.06,
        "5" => 'teto'
    );

    static $inssTeto = array(
        "1" => 78.38,
        "2" => 94.01,
        "3" => 125.38,
        "4" => 415.33
    );

    static $aliquota = array(
        "1" => 0.075,
        "2" => 0.09,
        "3" => 0.12,
        "4" => 0.14,
    );


    function FaixaDesconto($salario)
    {

        $this->salario = $salario;

        if ($salario >= 0 && $salario <= inss::$faixa['1']) {
            return 1;
        } else if ($salario >= inss::$faixa['1'] && $salario <inss::$faixa['2']) {
            return 2;
        } else if ($salario >= inss::$faixa['2'] && $salario < inss::$faixa['3']) {
            return 3;
        } else if ($salario >= inss::$faixa['3'] && $salario < inss::$faixa['4']){
            return 4;
        }
        else{
            return 5;
        }
        
    }


    function CalcularInss($faixaDesconto)
    {
       $salario = $this->salario;
       echo "<span>FAIXA</span> <i class=\"fas fa-donate\"></i> "   . ($faixaDesconto == 5 ? 'Teto' : $faixaDesconto)  . '<br>';
       echo "<span>SALARIO</span> <i class=\"fas fa-donate\"></i> R$" . number_format($salario,2,",",".")  . '<br>';
        

        if ($faixaDesconto == 1) {
            $desconto = $salario * inss::$aliquota[$faixaDesconto];
            
        } else if ($faixaDesconto == 2) {

            $desconto = ($salario - (inss::$faixa[$faixaDesconto-1]+0.01)) * inss::$aliquota[$faixaDesconto];
            $desconto = $desconto + inss::$inssTeto[$faixaDesconto-1];
            
        }else if($faixaDesconto == 3){
            $desconto = ($salario - (inss::$faixa[$faixaDesconto-1]+0.01)) * inss::$aliquota[$faixaDesconto];
            $desconto = $desconto + inss::$inssTeto[$faixaDesconto-1] + inss::$inssTeto[$faixaDesconto-2];
            
        }
        else if($faixaDesconto == 4){
            $desconto = ($salario - (inss::$faixa[$faixaDesconto-1]+0.01)) * inss::$aliquota[$faixaDesconto];
            $desconto = $desconto + inss::$inssTeto[$faixaDesconto-1] + inss::$inssTeto[$faixaDesconto-2] + inss::$inssTeto[$faixaDesconto-3];
            
        }
        else{

        
            $desconto =  inss::$inssTeto[$faixaDesconto-1] + inss::$inssTeto[$faixaDesconto-2] + inss::$inssTeto[$faixaDesconto-3] + inss::$inssTeto[$faixaDesconto-4] ;
        }
        
       
        
       
        echo "<span>INSS</span> <i class=\"fas fa-donate\"></i> R$".number_format($desconto,2,",",".") . '<br>';
        echo "<span class=\"porcent\">ALIQ. EFETIVA</span> <i class=\"fas fa-donate\"></i> " . ($salario > (inss::$faixa[4]) ? 'Teto '  : (number_format(($desconto / $salario)*100). '% <br>')) ;
        
        	$cont = $faixaDesconto+1;
          echo "<style>
        	tr:nth-child(${cont}) {
 		background: yellow !important;
		}
		</style>
	        ";    
      
    }
}
