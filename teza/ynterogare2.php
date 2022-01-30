<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "ateza");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT * FROM angajati WHERE numele LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM angajati ORDER BY numele";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Numele</th>
     <th>Telefonul</th>
     <th>Salariu</th>
     <th>Ziua de nastere</th>
     <th>Genul</th>
     <th>Sectiunea</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["numele"].'</td>
    <td>'.$row["telefon"].'</td>
    <td>'.$row["salariu"].'</td>
    <td>'.$row["ziua_nastere"].'</td>
    <td>'.$row["genul"].'</td>
    <td>'.$row["sectiunea"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Nu sa gasit asa angajat';
}
?>