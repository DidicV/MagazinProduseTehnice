<html>

 <head>

    <title>DVV</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="stil.css">

    <style type="text/css">
      .cautare
      {
        width: 30%; 
        height: 5%; 
        border-radius: 10px;
        text-align: center;
        font-size: 1.5em;
        margin-left: 43%;
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


 <h2 style="margin-left: 51%;">Cautare angajat</h2>

<br>

   <input type="text" name="search_text" id="search_text" placeholder="Introdu numele angajatului" class="cautare"/>


   <br><br>
  
   <div id="result"></div>

 </body>

 <br><br>

</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"ynterogare2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>