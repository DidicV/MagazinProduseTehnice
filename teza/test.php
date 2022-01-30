<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $pret_maxim = $_POST['pret_maxim'];

    if($pret_maxim=='')
    {
        $pret_maxim=1000000;
    }

    $pret_minim = $_POST['pret_minim'];
    if($pret_minim=='')
    {
        $pret_minim=0;
    }

    if($valueToSearch=='')
    {
           $query = "SELECT * FROM produse WHERE pretul<='$pret_maxim' and pretul>='$pret_minim'  ";
    $search_result = filterTable($query);

    }
    else
    {

        $query = "SELECT * FROM produse WHERE id_categ='$valueToSearch' and pretul<='$pret_maxim' and pretul>='$pret_minim'  ";
    $search_result = filterTable($query);

    }
    
}
 else {
    $query = "SELECT * FROM produse";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "ateza");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
            <title>DVV</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="stil.css">

            <style type="text/css">
            
            .btn-min{
                height: 25px;
                text-align: center;
                border-radius: 10px;
                margin-left: 15%;
                border:2px solid black;
                font-size: 1em;
            }

            .btn-max
            {
                height: 25px;
                text-align: center;
                border-radius: 10px;
                margin-left: 4%;
                border:2px solid black;
                font-size: 1em;
            
            }

            .selectul
            {
                height: 30px;
                border-radius: 10px;
                margin-left: 14%;
                border:2px solid black;


            }

            .butonul
            {
                height: 40px;
                width: 10%;
                text-align: center;
                border-radius: 10px;
                padding: 5px;
                background-color: green; 
                font-size: 1.2em;
                margin-left: 6%;
            }

            </style>

    </head>
    <body >
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
        
        <form action="test.php" method="post">


                     <br><br>
<center>
            <input type="text" name="pret_minim" placeholder="Minim" class="btn-min">
            <input type="text" name="pret_maxim" placeholder="Maxim" class="btn-max"><br><br>
            <select name="valueToSearch" class="selectul">
                <option value="">Alege categoria</option>
                <option value="1">Tehnica de bucatarie</option>
                <option value="2">Climatizare</option>
                <option value="3">Ingrijire personala</option>
                <option value="4">Curatenie si uz casnic</option>
                <option value="5">Tehnica audio</option>
                <option value="6">Televizoare</option>
            </select>
            <input type="submit" name="search" value="Executa" class="butonul"><br><br>
</center>            

            <table>
                <tr>
                    <th>Denumirea</th>
                    <th>Pretul</th>
                    <th>Numar stoc</th>
                
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['denumirea'];?></td>
                    <td><?php echo $row['pretul'];?></td>
                    <td><?php echo $row['nr_stoc'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>