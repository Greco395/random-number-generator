<?php
/*
###########################################################
#                                                         #
#   Random Number Gen creato da greco395.com              #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
*/
$righe = $_GET['num_righe'];
$min   = $_GET['min'];
$max   = $_GET['max'];

if(!empty($_GET['seed'])){
    $seed = $_GET['seed'];
}else{
    $seed = rand(0, 99999999);
}


class Casuale {

	// seed casuale
	private static $RSeed = 0;
	
	// imposto seed
	public static function seed($s = 0) {
		self::$RSeed = abs(intval($s)) % 9999999 + 1;
		self::num();
	}
	
	// genera numero casuale
	public static function num($min = 0, $max = 9999999) {
		if (self::$RSeed == 0) self::seed(mt_rand());
		self::$RSeed = (self::$RSeed * 125) % 2796203;
		return self::$RSeed % ($max - $min + 1) + $min;
	}

}

// set seed
Casuale::seed($seed);

?>

<?

// mostra risultato
for ($i = 0; $i < $righe; $i++) {
	echo Casuale::num($min, $max) . '<br />';
}
?>
