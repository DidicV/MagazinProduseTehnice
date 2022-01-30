<?php include('sever.php'); ?>

<?php 

if(isset($_GET['edit3']))
{
   $id = $_GET['edit3'];
   $edit_state = true;
   $rec = mysqli_query($db, "SELECT * FROM produse WHERE id_produs=$id");
   $record=mysqli_fetch_array($rec);

   $id_produs = $record['id_produs'];
   $denumirea = $record['denumirea'];
   $pretul=$record['pretul'];
   $nr_stoc=$record['nr_stoc'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>DVV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stil.css">

<style>
    
.container-3 {
  display: grid;
  width: 40%;

  margin-left: 38%;

  grid-template-rows: 1fr;

  grid-row-gap: 4.5%;
  grid-column-gap: 5%;

}

.item-3{
  border:1px solid black;
  border-radius: 10px;
  padding: 3%;
  width: 90%;
  text-align: center;
  background-color: gray;
}

.inputuri{

width: 45%;
padding:0.5%;
height: 3%;
border:2px solid black;
border-radius: 10px;
font-size: 1.3em;
text-align: center;
}

.selectia{
width: 50%;
height: 30px;
border:2px solid black;
border-radius: 10px;
}

.input-group-2{
    margin:10px 0px 10px 0px;
    width: 400px;
    margin-left: 1%;
    margin-top: 120px;
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

<br>

<b>  <c style="margin-left: 52.5%; font-size: 1.5em;">Adauga produs</c>  </b>


<form method="post" action="sever.php">

    <input type="text" name="id_produs" value="<?php  echo $id_produs;  ?>" >

<div class="container-3">

  <div class="item-3">

    <t>Denumire</t> 

    <br>
     
          <div>
            <input style="text-align: center;" class="inputuri"  type="text" name="denumirea" value="<?php  echo $denumirea;  ?>" >
           </div>
  </div>


  <div class="item-3">

    <t>Pretul</t> <br>
   
          <div>
            
            <input class="inputuri" type="text" name="pretul" value="<?php  echo $pretul;  ?>">

           </div>

  </div>

<div class="item-3">

    <t>Numarul în stoc</t> <br>
   
          <div >
        
            <input class="inputuri" type="text" name="nr_stoc" value="<?php  echo $nr_stoc;  ?>">

           </div>
  </div>

<div class="item-3">

    <t>Categorizare</t> <br>
   
        <?php  
           $mysqli =  NEW MySQLi('localhost','root', '','ateza');
           $resultSet = $mysqli->query("SELECT * FROM categorii");  
          ?>
        <select  name="id_categorii" class="selectia">
          <option></option>
          <?php 
              while($rows= $resultSet->fetch_assoc())
              {
                $nume_categorie=$rows['nume_categorie'];
                $id_categorii=$rows['id_categorii'];
                echo "<option  value='$id_categorii'> $nume_categorie </option>";
              }
           ?>
        </select>

  </div>

<div class="item-3">

    <t>Firma</t> <br>

        <?php  
           $mysqli =  NEW MySQLi('localhost','root', '','ateza');
           $resultSet = $mysqli->query("SELECT * FROM firma");  
          ?>

        <select  name="id_producator" class="selectia">
          <option></option>
          <?php 
              while($rows= $resultSet->fetch_assoc())
              {
                $nume_firma=$rows['nume_firma'];
                $id_producator=$rows['id_producator'];
                echo "<option  value='$id_producator'> $nume_firma </option>";
              }
           ?>
        </select>

  </div>

</div>
    <div class="input-group-2">
      <?php if($edit_state == false): ?>
            
      <button type="submit" name="save3" class="btn">Creare</button>
          
      <?php else: ?>

      <button type="submit" name="update3" class="btn">Modificare</button>

      <?php endif ?>  
    </div>
    
</form>

</body>

</html>