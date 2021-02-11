<?php 

session_start();



	function checkMoney($cost){
		$totalCoinCount = 0;
		$tempCost = floatval($cost)*100;
		echo 'Toplam Para Üstü : '.floatval($cost)." TL";
		    if($tempCost >= 100){
		    	
		    	$adet_100kurus = floor($tempCost/100);
		    	$tempCost = $tempCost-($adet_100kurus*100);
		    	$totalCoinCount = $totalCoinCount + $adet_100kurus;
		    	echo "<br>1 tl adet : ".$adet_100kurus;
		    	
		    }
		    if ($tempCost >= 50) {
		    	$adet_50kurus = floor($tempCost/50);
		    	$tempCost = $tempCost-($adet_50kurus*50);
		    	$totalCoinCount = $totalCoinCount + $adet_50kurus;
		    	echo "<br>50 Kuruş adet : ".$adet_50kurus;
		    	
		    } 
			if ($tempCost >= 25) {
		    	$adet_25kurus = floor($tempCost/25);
		    	$tempCost = $tempCost-($adet_25kurus*25);
		    	$totalCoinCount = $totalCoinCount + $adet_25kurus;
		    	echo "<br>25 Kuruş adet : ".$adet_25kurus;
		    	
		    } 
		    if ($tempCost >= 10) {
		    	$adet_10kurus = floor($tempCost/10);
		    	$tempCost = $tempCost-($adet_10kurus*10);
		    	$totalCoinCount = $totalCoinCount + $adet_10kurus;
		    	echo "<br>10 Kuruş adet : ".$adet_10kurus;
		    	
		    } 
		    if ($tempCost >= 5) {
		    	$adet_5kurus = floor($tempCost/5);
		    	$tempCost = $tempCost-($adet_5kurus*5);
		    	$totalCoinCount = $totalCoinCount + $adet_5kurus;
		    	echo "<br>5 Kuruş adet : ".$adet_5kurus;
		    	
		    } 
		    if ($tempCost >= 1) {
		    	$adet_1kurus = floor($tempCost/1);
		    	$tempCost = $tempCost-($adet_1kurus*1);
		    	$totalCoinCount = $totalCoinCount + $adet_1kurus;
		    	echo "<br>1 Kuruş adet : ".$adet_1kurus;
		    	
		    } 

		    echo '<br>Toplam Verilen Bozuk Para Adedi : '.$totalCoinCount;
		
	}


 ?>

<?php 



if (isset($_POST["calculate"])) {
	
	checkMoney($_POST["valueInput"]);
} else {
	 ?>

 
 <html>
 <head>
 	<title>TL Hesabı</title>
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
     </style>
 </head>
 <body>
 
 	<form action="?" method="post">
 		<input type="text" name="valueInput" autocomplete="off" placeholder="Bir sayi giriniz(Ör: 1,2.53)" class="input">
 		<button type="submit" name="calculate" class="button">Check Money</button>
 	</form>
<?php } ?>

 </body>
 </html>