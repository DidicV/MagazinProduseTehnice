<?php include('sever.php');

$angajati_sectii=mysqli_query($db, "SELECT id_angajat, numele, nume_categorie FROM angajati join categorii where id_sectiune = sectiunea;");
?>
<!DOCTYPE html>
<html>
<head>
	<title>DVV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stil.css">

    <style type="text/css">
        
        .interogare-1
        {
            font-size: 20px; 
            border:1px solid black; 
            padding: 2%; 
            border-radius: 10px;
            margin-left: 30%;
            background-color: gray;
            color: black;
        }
        .interogare-1:hover{
            background-color: #fff1c9;
        }

        .interogare-2
        {
            font-size: 20px; 
            border:1px solid black; 
            padding: 2%; 
            border-radius: 10px;
            margin-left: 15%;
            background-color: gray;
            color: black;
        }

        .interogare-2:hover{
            background-color: #fff1c9;
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

    <br>
</div>

 <contact style='margin-left: 75%; font-style: italic;'>Pentru sprijin sau suport tehnic apelati: 060480334</contact>

<br><br>
    <div id="clock" align="right" style="font-size: 2em;"></div>
    <script type="text/javascript">
    let clock = document.getElementById("clock");
    setInterval(function() {
        let date = new Date();
        clock.innerHTML = date.toLocaleTimeString(); 
    },1000);
    </script>

<center><h1 style="margin-left: 15%;">Interogari</h1></center>

<br><br>

<a href="http://localhost/teza/ynterogare1.php" class="interogare-1">Cautare angajat dupa nume</a>
<a href="http://localhost/teza/test.php" class="interogare-2">Cautare produs dupa pret</a>

<br><br><br><br><br>

<center><h2 style="margin-left: 15%;">Angajati responsabili de sectii</h2></center>

<table border="1" style="border-radius: 15px 15px 15px 15px;">
    <thead >
        <tr class="cap">
            <th>Numele</th>
            <th>Sectia</th>

        </tr>
    </thead>
    <tbody>

      <?php  while($row = mysqli_fetch_array($angajati_sectii)) { ?>

        <tr>

          <td><?php echo $row['numele']; ?></td>
          <td><?php echo $row['nume_categorie']; ?></td>
       
        </tr>       
       <?php } ?>

    </tbody>
    
  </table>
  <br><br>

</body>
</html>