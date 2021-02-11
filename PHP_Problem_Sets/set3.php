<?php 

session_start();

function checkNum($number){
	$counter = 0;
	for ($i = 1; $i <= $number ; $i++) {
		if($number%$i == 0){
				$counter ++;
		}
	}
	if ($counter >2) {
		echo 'Asal Sayı değil';
	}else{
		echo 'Asal sayı';
	}
}


 ?>

<html>
<head>
	<title>Asal Sayı Kontrol</title>
	<meta charset="utf-8">
	<style>
        
            .input{
                margin-left: 40%;
                width: 300px;
                height: 50px;
                border: 2px solid grey;
                
            }

            .button{
                margin-left: 40%;
                margin-top: 10px;
                width: 300px;
                height: 50px;
                border: 2px solid grey; 
            }
            div{
                text-align: center;
            }
            button{
                font-weight: bolder;
                background-color: burlywood;
            }
    </style>
</head>
<body>


<?php 
if (isset($_POST["check"])) {
	
	checkNum($_POST["sayi_input"]);

} else {
	
 ?>
<form action="?" method="post">
	<input type="number"  class="input" name="sayi_input" id="sayi" autocomplete="off" placeholder="Sayi Giriniz...">
	<button type="submit" name="check" class="button">Check</button>	
</form>
	<?php 
		}
	 ?>	
<div id="block">
	
</div>


</body>
</html>