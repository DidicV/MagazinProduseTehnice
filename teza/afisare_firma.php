<?php include('sever.php'); 
$res2 = mysqli_query($db, "SELECT * FROM firma");
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

 <h2><center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Contrare cu firme</center></h2>

<table border="1" style="border-radius: 15px 15px 15px 15px;">
    <thead >
        <tr class="cap">
            <th>Firma</th>
            <th>Tara</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>

          <?php  while($row = mysqli_fetch_array($res2)) { ?>
          <tr>

            <td><?php echo $row['nume_firma']; ?></td>
            <td><?php echo $row['tara_producator']; ?></td>

            <td>
                  <a class="buton1" href="adauga_contract.php?edit2=<?php echo $row['id_producator']; ?>">Modifica</a>
            </td>

            <td>
                  <a class="buton2" href="sever.php?del2=<?php echo $row['id_producator']; ?> ">Sterge</a>
            </td>
        </tr>       
       <?php } ?>

    </tbody>
  </table>
  <br><br><br>
</body>
</html>