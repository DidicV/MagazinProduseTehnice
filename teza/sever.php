<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

function succes(){
swal({
  title: "Good job!",
  text: "Date inregistate cu succes!",
  icon: "success",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_angajat.php";
});
}

function warning(){
swal({
  title: "Eroare!",
  text: "Nu ati completat randurile!",
  icon: "warning",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_angajat.php";
});
}

function error(){
swal({
  title: "Eroare!",
  text: "Salariul trebuie sa fie numar, dar telefonul cifre intregi!",
  icon: "error",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_angajat.php";
});
}

/*==========================================================
===========================================================*/

function succes2(){
swal({
  title: "Good job!",
  text: "Date inregistate cu succes!",
  icon: "success",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_contract.php";
});
}

function warning2(){
swal({
  title: "Eroare!",
  text: "Nu ati completat randurile!",
  icon: "warning",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_contract.php";
});
}

function error2(){
swal({
  title: "Eroare!",
  text: "Nu se poate sterge, este asa firma de produs in stoc!",
  icon: "error",})
.then((value) => {
  location.href = "http://localhost/teza/afisare_firma.php";
});
}

/*==========================================================
===========================================================*/

function succes3(){
swal({
  title: "Good job!",
  text: "Date inregistate cu succes!",
  icon: "success",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_produs.php";
});
}

function warning3(){
swal({
  title: "Eroare!",
  text: "Nu ati completat randurile!",
  icon: "warning",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_produs.php";
});
}

function error3(){
swal({
  title: "Eroare!",
  text: "Pretul trebuie sa fie numar, iar numarul in stoc cifre intregi!",
  icon: "error",})
.then((value) => {
  location.href = "http://localhost/teza/adauga_produs.php";
});
}

</script>

</head>
<body style=" background-image: url(backphoto.png);background-size: cover;background-attachment:fixed;">

<?php

#datele angajaturlui
  $id='';
  $numele="";
  $telefon="";
  $salariu="";
  $ziua_nastere="";
  $id_angajat="";
  $genul='';
  $sectiunea='';
  $edit_state = false;

#datele firmei
  $nume_firma=NULL;
  $tara_producator=NULL;

#datele produsului
  $id_produs='';
  $denumirea='';
  $pretul='';
  $nr_stoc=''; 
  $id_prod=''; 
  $id_categ=''; 


#limita de pret

  $pret_minim=0;
  $pret_maxim=1000000000;  


//conectarea la baza de date
  $db = mysqli_connect('localhost', 'root', '', 'ateza');

  //################################################################################################
  //CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE CREATE
  ###################################################################################################

  #adauga angajat
  if(isset($_POST['save']))
  {
    $numele = $_POST['numele'];
    $telefon = $_POST['telefon'];
    $salariu = $_POST['salariu'];
    $ziua_nastere = $_POST['ziua_nastere'];
    $genul = $_POST['genul'];
    $sectiunea = $_POST['sectiunea'];

    if($numele=="" ||  $telefon=="" || $salariu=="" || $ziua_nastere=="" || $genul=="" || $sectiunea=="")
    {
      echo '<script type="text/javascript"> warning(); </script>';
    }

    else if(is_numeric($salariu)==1 && ctype_digit($telefon))
    {

    $query = "INSERT INTO angajati(numele,telefon,salariu,ziua_nastere,genul,sectiunea) VALUES ('$numele',
    '$telefon', '$salariu', '$ziua_nastere', '$genul','$sectiunea')";
    mysqli_query($db, $query);
    echo '<script type="text/javascript"> succes(); </script>';

    }
    else
    {
    echo '<script type="text/javascript"> error(); </script>'; 
    }

  }

  #adauga firma
  if(isset($_POST['save2']))
  {
    $nume_firma = $_POST['nume_firma'];
    $tara_producator = $_POST['tara_producator'];

    if($nume_firma=="" ||  $tara_producator=='')
    {
      echo '<script type="text/javascript"> warning2(); </script>';
    }

    else
    {
        $query = "INSERT INTO firma(nume_firma, tara_producator) VALUES ('$nume_firma','$tara_producator')";
        if($query)
        {
           echo '<script type="text/javascript"> succes2(); </script>';
           mysqli_query($db, $query); 
        }
    }
  }

    #adauga produs
    if(isset($_POST['save3'])){
    $denumirea = $_POST['denumirea'];
    $pretul = $_POST['pretul'];
    $nr_stoc = $_POST['nr_stoc'];
    $id_prod = $_POST['id_producator'];
    $id_categ = $_POST['id_categorii'];


    if($denumirea=="" ||  $pretul=="" || $nr_stoc=="" || $id_prod=="" || $id_categ=="")
    {
      echo '<script type="text/javascript"> warning3(); </script>';
    }

    else if(is_numeric($pretul)==1 && ctype_digit($nr_stoc))
    {

    $query = "INSERT INTO produse(denumirea,pretul,nr_stoc,id_prod,id_categ) VALUES('$denumirea',
        '$pretul', '$nr_stoc', '$id_prod', '$id_categ')";
    mysqli_query($db, $query);
    echo '<script type="text/javascript"> succes3(); </script>';

    }
    else
    {
    echo '<script type="text/javascript"> error3(); </script>'; 
    } 
  }

  // ################################################################################################
  //UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE UPDATE 
  ###################################################################################################

  if(isset($_POST['update'])){

    $numele = mysqli_real_escape_string($db, $_POST['numele']);
    $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
    $salariu = mysqli_real_escape_string($db, $_POST['salariu']);
    $ziua_nastere = mysqli_real_escape_string($db, $_POST['ziua_nastere']);
    $genul = mysqli_real_escape_string($db, $_POST['genul']);
    $sectiunea = mysqli_real_escape_string($db, $_POST['sectiunea']);

    $id= mysqli_real_escape_string($db, $_POST['id_angajat']);

    if($numele=="" ||  $telefon=="" || $salariu=="" || $ziua_nastere=="" || $genul=="" || $sectiunea=="")
    {
      echo '<script type="text/javascript"> warning(); </script>';
    }
    else if(is_numeric($salariu)==1 && ctype_digit($telefon))
    {

    mysqli_query($db, "UPDATE angajati SET numele='$numele', telefon='$telefon', salariu = '$salariu', ziua_nastere='$ziua_nastere', genul = '$genul', sectiunea = '$sectiunea'  WHERE id_angajat=$id ");
    echo '<script type="text/javascript"> succes(); </script>';

    }
    else
    {

    echo '<script type="text/javascript"> error(); </script>'; 

    }
  }


    if(isset($_POST['update2'])){
    $nume_firma = mysqli_real_escape_string($db, $_POST['nume_firma']);
    $tara_producator = mysqli_real_escape_string($db, $_POST['tara_producator']);
    $id= mysqli_real_escape_string($db, $_POST['id_producator']);

    if($nume_firma=="" ||  $tara_producator=='')
    {
      echo '<script type="text/javascript"> warning2(); </script>';
    }
    else
    {
      mysqli_query($db, "UPDATE firma SET nume_firma='$nume_firma', tara_producator='$tara_producator' WHERE id_producator=$id ");
      echo '<script type="text/javascript"> succes2(); </script>';
    }
  }

    if(isset($_POST['update3']))
    {

    $denumirea = mysqli_real_escape_string($db, $_POST['denumirea']);
    $pretul = mysqli_real_escape_string($db, $_POST['pretul']);
    $nr_stoc = mysqli_real_escape_string($db, $_POST['nr_stoc']);
    $id_prod = $_POST['id_producator'];
    $id_categ = $_POST['id_categorii'];

    if($denumirea=="" ||  $pretul=="" || $nr_stoc=="" || $id_prod=="" || $id_categ=="")
    {
      echo '<script type="text/javascript"> warning3(); </script>';
    }

    else if(is_numeric($pretul)==1 && ctype_digit($nr_stoc))
    {

    $id= mysqli_real_escape_string($db, $_POST['id_produs']);

    mysqli_query($db, "UPDATE produse SET denumirea='$denumirea', pretul='$pretul', nr_stoc='$nr_stoc',  
        id_prod='$id_prod', id_categ='$id_categ' WHERE id_produs=$id");

    echo '<script type="text/javascript"> succes3(); </script>';
    }
    else
    {
    echo '<script type="text/javascript"> error3(); </script>'; 
    }

  }

  //#################################################################################################
  //DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE
  ###################################################################################################

  if(isset($_GET['del']))
  {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM angajati WHERE id_angajat=$id");
    header('location: afisare_angajat.php');
  }

  if(isset($_GET['del2']))
  {
    $id = $_GET['del2'];
    if ($result = mysqli_query($db, "SELECT * FROM produse WHERE id_prod=$id"))
    {
      $row_cnt = mysqli_num_rows($result);
    }

    if($row_cnt==0)
    {
    mysqli_query($db, "DELETE FROM firma WHERE id_producator=$id");
    header('location: afisare_firma.php');
    }
    else
    {
      echo '<script type="text/javascript"> error2(); </script>'; 
    }

  }

  if(isset($_GET['del3']))
  {
    $id= $_GET['del3'];
    mysqli_query($db, "DELETE FROM produse WHERE id_produs=$id");
    header('location: afisare_produs.php');
  }
?>
</body>
</html>
