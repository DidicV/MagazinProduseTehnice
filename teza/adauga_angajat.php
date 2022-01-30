 <?php include('sever.php');?>

<?php 

if(isset($_GET['edit']))
{
   $id = $_GET['edit'];
   $edit_state = true;
   $rec = mysqli_query($db, "SELECT * FROM angajati WHERE id_angajat=$id");
   $record=mysqli_fetch_array($rec);
   $id_angajat = $record['id_angajat'];
   $numele = $record['numele'];
   $telefon=$record['telefon'];
   $salariu=$record['salariu'];
   $ziua_nastere=$record['ziua_nastere'];
   $genul=$record['genul'];
   $sectiunea=$record['sectiunea'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>DVV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stil.css">

<style type="text/css">
  
.inputuri{
text-align: center;
width: 70%;
padding: 2%;
border:2px solid black;
border-radius: 10px;
font-size: 20px;
}

.selectia{
width: 50%;
height: 30px;
border:2px solid black;
border-radius: 10px;

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
 <h2><center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Adaugare angajat</center></h2>

<form method="post" action="sever.php">
<input type="text" name="id_angajat" value="<?php  echo $id_angajat;  ?>" >

<div class="container">

  <div class="item">

    <t>Numele</t> 

    <br>
     
          <div>
                   
            <input class="inputuri"  type="text" name="numele" value="<?php  echo $numele;  ?>" placeholder="Name" >

           </div>

  </div>

  <div class="item">

    <t>Telefon</t> <br>
   
          <div>

            <input class="inputuri" type="text" name="telefon" value="<?php  echo $telefon;  ?>" placeholder="Telefon">

           </div>
  </div>

<div class="item">


    <t>Salariu</t> <br>
   
          <div >
        
          <input class="inputuri" type="text" name="salariu" value="<?php  echo $salariu;  ?>" placeholder="Salary">

           </div>

  </div>

<div class="item">

    <t>Ziua de nastere</t> <br>
   
          <div>
        
            <input class="inputuri" type="text" name="ziua_nastere" value="<?php  echo $ziua_nastere;  ?>" placeholder="dd.mm.yyyy">

           </div>
  </div>


<div class="item">

    <t>Sectia</t> <br>
    <select name="sectiunea" class="selectia" >
      <option > </option>
      <option value="1">Sectia Nr.1 Tehnica de bucatarie</option>
      <option value="2">Sectia Nr.2 Climatizare</option>
      <option value="3">Sectia Nr.3 Ingrijire personala</option>
      <option value="4">Sectia Nr.4 Curatenie si uz casnic</option>
      <option value="5">Sectia Nr.5 Tehnica audio</option>
      <option value="6">Sectia Nr.6 Televizoare</option>
    </select>

  </div>

<div class="item">

    <t>Genul</t> <br>

    <select name="genul" class="selectia">
      <option></option>
      <option value="M">Masculin</option>
      <option value="F">Feminin</option>
    </select>

</div>

</div>
    <div class="input-group">
      <?php if($edit_state == false): ?>
            
      <button type="submit" name="save" class="btn">Creare</button>
          
      <?php else: ?>

      <button type="submit" name="update" class="btn">Modificare</button>

      <?php endif ?>  
    </div>
</form>

<br><br><br>

</body>

</html>