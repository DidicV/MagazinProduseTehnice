<?php 
include('sever.php'); 
$res = mysqli_query($db, "SELECT id_angajat, numele, telefon, salariu, ziua_nastere, genul, nume_categorie FROM angajati JOIN categorii WHERE sectiunea = id_sectiune");
?>

<!DOCTYPE html>
<html>
<head>
	<title>DVV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stil.css">
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

  <h2><center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Lista angajatilor</center></h2>

  <table border="1" style="border-radius: 15px 15px 15px 15px;">
    <thead >
        <tr class="cap">
            <th>Nume</th>
            <th>Telefon</th>
            <th>Salariu</th>
            <th>Ziua de nastere</th>
            <th>Genul</th>
            <th>Sectia</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>

      <?php  while($row = mysqli_fetch_array($res)) { ?>

          <tr>
          <td><?php echo $row['numele']; ?></td>
          <td><?php echo $row['telefon']; ?></td>
          <td><?php echo $row['salariu']; ?></td>
          <td><?php echo $row['ziua_nastere']; ?></td>
          <td><?php echo $row['genul']; ?></td>
          <td><?php echo $row['nume_categorie']; ?></td>

          <td>
          <a class="buton1" href="adauga_angajat.php?edit=<?php echo $row['id_angajat']; ?>">Modifica</a>
          </td>

          <td>
                <a class="buton2" href="sever.php?del=<?php echo $row['id_angajat']; ?> ">Sterge</a>
          </td>
        </tr>       
       <?php } ?>

    </tbody>
    
  </table>

  <br> <br>

 </body>

</html>