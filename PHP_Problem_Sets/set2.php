<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="set2.php" method="post">
    <label>Lütfen sayı Giriniz =</label>
    <input type="input" name="input" type="number">
    <button>Giriş</button>
</form>
    
</body>
</html>


<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['input']))
    {
        checkTheExcellentNumber($_POST['input']);
    }

function checkTheExcellentNumber($num){
		$result = 0;
for ($i = 1; $i < $num ; $i++) {
	if($num%$i == 0){
		$result += $i;
		echo "Divison of the number : ".$i.'<br>';
	}
}
if($result == $num){
	echo $num.' is an excellent number!!!';
}else {
	echo $num.' is not an excellent number!!!';
}
}


 ?>
