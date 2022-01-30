<?php 
include('sever.php');
$categorie_4=mysqli_query($db, "SELECT id_produs, denumirea, pretul, nr_stoc, nume_firma FROM produse JOIN firma WHERE id_prod=id_producator and id_categ=4;");
?>
<!DOCTYPE html>
<html>
<head>
  <title>DVV</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stil.css">

<style>
    
.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
  font-size: 1.03em;
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
            

            <li>Sortati dupa categorii</li>
            <li><a href="http://localhost/teza/categ-1.php">Tehnica de bucatarie</a></li>
            <li><a href="http://localhost/teza/categ-2.php">Climatizare</a></li>
            <li><a href="http://localhost/teza/categ-3.php">Ingrijire personala</a></li>
            <li><a href="http://localhost/teza/categ-4.php">Curatenie si uz casnic</a></li>
            <li><a href="http://localhost/teza/categ-5.php">Tehnica audio</a></li>
            <li><a href="http://localhost/teza/categ-6.php">Televizoare</a></li>


        </ul> 

    </div>
    <div class="main_content">
        <div class="header"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Bine ați venit la magazinul nostru de produse electrocasnice</div>  

    </div>
</div>

 <h2><center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Curatenie si uz casnic</center></h2>

<table border="1" style="border-radius: 15px 15px 15px 15px;">
    <thead >
        <tr class="cap">
            <th>Denumire</th>
            <th>Pretul</th>
            <th>In stoc</th>
            <th>Producator</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>

      <?php  while($row = mysqli_fetch_array($categorie_4)) { ?>

          <tr>
          <td><?php echo $row['denumirea']; ?></td>
          <td><?php echo $row['pretul']; ?></td>
          <td><?php echo $row['nr_stoc']; ?></td>
          <td><?php echo $row['nume_firma']; ?></td>
          <td>
          <a class="buton1" href="adauga_produs.php?edit3=<?php echo $row['id_produs']; ?>">Modifica</a>
          </td>

          <td>
                <a class="buton2" href="sever.php?del3=<?php echo $row['id_produs']; ?> ">Sterge</a>
          </td>

        </tr>       
       <?php } ?>

    </tbody>
    
  </table>

</body>

</html>