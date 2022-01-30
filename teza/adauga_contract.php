<?php include('sever.php'); ?><?php 

if(isset($_GET['edit2']))
{
  $id = $_GET['edit2'];
  $edit_state = true;
  $rec = mysqli_query($db, "SELECT * FROM firma WHERE id_producator=$id");
  $record=mysqli_fetch_array($rec);


  $id_producator=$record['id_producator'];
  $nume_firma=$record['nume_firma'];
  $tara_producator=$record['tara_producator'];

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DVV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stil.css">

<style>
.inputuri{

text-align: center;
width: 35%;
padding:1%;
height: 5%;
border:2px solid black;
border-radius: 10px;
font-size: 20px

}

</style>


</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Magazin Victor</h2>
        <ul>
            <li><a href="http://localhost/teza/index.php "> Home</a></li>
            <li><a href="http://localhost/teza/adauga_angajat.php "> Adauga angajat</a></li>
            <li><a href="http://localhost/teza/afisare_angajat.php "> Lista angajatilor</a></li>
            <li><a href="http://localhost/teza/adauga_produs.php">Adauga produs</a></li>
            <li><a href="http://localhost/teza/afisare_produs.php">Lista de produse</a></li>
            <li><a href="http://localhost/teza/adauga_contract.php">Contract nou cu firma</a></li>
            <li><a href="http://localhost/teza/afisare_firma.php">Contractele cu firme</a></li>
        </ul> 

    </div>
    <div class="main_content">
        <div class="header"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Bine ați venit la magazinul nostru de produse electrocasnice</div>  

    </div>
</div>


<br><br> <h1><center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp   Creare contract</center></h1><br>

<form method="post" action="sever.php" >

    <input type="text" name="id_producator" value="<?php  echo $id_producator;  ?>" >
  
<div class="container-2">

        <div class="item-2">

          <t>  Firma</t> <br>
          
          <div>
              <input id='n1' class="inputuri" type="text" name="nume_firma" value="<?php echo $nume_firma; ?>" placeholder="Nume firma">
          </div>

        </div>


        <div class="item-2">

          <t>Tara producator</t> <br>
          
          <div>
      
      <input id='n2' class="inputuri" type="text" name="tara_producator" value="<?php echo $tara_producator; ?>" placeholder="Tara">
          </div>

        </div>
</div>

    <div class="input-group">
            <?php if($edit_state == false): ?>
            
      <button  type="submit" name="save2" class="btn">Creare</button>
          
      <?php else: ?>

      <button type="submit" name="update2" class="btn">Modificare</button>

      <?php endif ?>  
    </div>

</form>

</body>

</html>