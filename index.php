<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculos INSS</title>
    <style>
    body{
     
        font-family: tahoma;
        
    }

.container{
	padding: 10px;
	
}

    span{
    
    	width:  80px;  background-image: linear-gradient(#4CAF50, green);  
    	color: white; display: inline-block; 
    	margin-bottom: 5px; padding: 5px 0 5px 5px }
    	
    .fa-donate{
        color: green; margin:0  5px
    }
    
    .fa-wallet{
    	color: green;
    }

    input[type=text]{
        font-size: 22px; 
        font-family: Tahoma;
        margin-bottom: 12px
    }

    button{
        background-color: crimson; color: white;
        font-size: 16px; padding: 12px;
        border: 0;
    }

    label{
        font-size: 22px;
        display: block;
        margin-bottom: 12px;
        font-family: Tahoma;
    }
    .porcent{width: 150px !important; margin-right: 5px }

    #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;}
  
  @media(max-width:640px){
  	input[type=text]{
  		width:100%;
  		max-width:90% !important;
  		display:block
  	}
  }
  
  
    </style>
</head>
<body>
<div class="container">
    <form action="" method="POST">
        <label for=""><i class="fas fa-wallet"></i> Salário</label>
        <input type="text" name="txt_salario" placeholder="R$ Não use ponto ." required="required">
        <br>
        <button type="submit">CALCULAR DESCONTO</button>
        <br>
        <br>
        <br>
        <?php
            require_once 'inss.php';
            $faixaDesconto = new Inss();
            if(isset($_POST['txt_salario'])){
                $numFaixa = $faixaDesconto->FaixaDesconto($_POST['txt_salario']);
                $faixaDesconto->CalcularInss($numFaixa);
            }
                

        ?>
    
    </form>



    <br>
    <br>
    <br>
    <br>
    <table id="customers">
  <tr>
    <th>FAIXA</th>
    <th>SALÁRIO</th>
    <th>AlÍQUOTA PROGRESSIVA</th>
  </tr>
  <tr>
    <td>1</td>
    <td>até R$ 1.045,00</td>
    <td>7,5%</td>
  </tr>

  <tr>
    <td>2</td>
    <td>até R$ 1.045,01 e R$2,089,60</td>
    <td>9%</td>
  </tr>

  <tr>
    <td>3</td>
    <td>entre R$2.089,61  e R$3.134,40</td>
    <td>12%</td>
  </tr>

  <tr>
    <td>4</td>
    <td>entre  R$3.134,41  e R$6.101,06</td>
    <td>14%</td>
  </tr>

  <tr>
    <td>5</td>
    <td>Acima de R$6.101,06</td>
    <td>TETO -> R$713,10</td>
  </tr>

 
</table>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>
</html>
