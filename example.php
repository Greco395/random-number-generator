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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GENERATORE DI NUMERI CASUALI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta author="greco395.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--
###########################################################
#                                                         #
#   Random Number Gen creato da greco395.com              #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
-->
<div class="jumbotron text-center">
  <h1>RANDOM NUMBER GENERATOR</h1>
  <p>Con questo form si puossono generare numeri casuali</p> 
</div>
  

<div class="bootstrap-iso col-md-12 col-md-offset-3">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form action="" method="get">
     <div class="form-group ">
      <label class="control-label requiredField" for="name">
       Quanti numeri vuoi generare?
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" name="num_righe" placeholder="es: 10" type="text" value="<?=$_GET['num_righe'];?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="seed">
       Seed
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="seed" name="seed" placeholder="es: 342" type="text" value="<?=$_GET['seed'];?>"/>
      <span class="help-block" id="hint_seed">
       Questo campo è opzionale, se si inserisce un numero sarà possibile generale gli stessi numeri
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="min">
       Numero minimo
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="min" name="min" placeholder="es: 1" type="text" value="<?=$_GET['min'];?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="max">
       Numero massimo
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="max" name="max" placeholder="es: 99" type="text" value="<?=$_GET['max'];?>"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-success btn-lg btn-block" type="submit">
        GENERA
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">RISULTATO</h4>
      </div>
      <div class="modal-body">
        <p><strong><center><font size="4">
<?
// mostra risultato
for ($i = 0; $i < $righe; $i++) {
	echo Casuale::num($min, $max) . '<br />';
}
?>
</font></center></strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">CHIUDI</button>
      </div>
    </div>

  </div>
</div>

<?
if(!empty($_GET['num_righe'])){ ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<? } ?>
<br><br>
<br><br><center><a href="http://greco395.com/projects.html">tutti i progetti e il codice sorgente</a></center>

</body>
</html>
