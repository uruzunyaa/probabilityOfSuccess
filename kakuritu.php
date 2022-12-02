<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>成功回数の確率の計算</title>
  </head>
  <body>
    <h1>成功回数が足りる確率を計算するよ！</h1>
    <h2>1回あたりの成功確率、試行回数、必要成功回数を入力してね！</h2>
	<?php
		$probability = $_GET["probability"];
		$try = $_GET["try"];
		$quota = $_GET["quota"];
	?>
    <form action="" method="get">
	  成功確率(0~1)
      <input type="text" name="probability" value="<?echo $probability?>"><br>
	  試行回数
      <input type="text" name="try" value="<?echo $try?>"><br>
	  ノルマ回数
      <input type="text" name="quota" value="<?echo $quota?>"><br>
      <input type="submit" value="送信">
    </form>
    <?php
    
    $result = 0;
	for($i = $quota; $i <= $try; $i++){
		//i回丁度成功する確率を求める
		$a = (int)gmp_fact($try);
		$b = (int)gmp_fact($i);
		$c = (int)gmp_fact($try - $i);
		$d = pow($probability,$i);
		$e = pow(1 - $probability,$try - $i);
		$nowResult = $a*$d*$e/$b/$c;
		//計算した確率を合計していく
		$result = $result + $nowResult;
	}
	echo $result;
  ?>
  </body>
</html>