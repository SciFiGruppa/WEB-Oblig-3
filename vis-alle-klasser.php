<?php  
    require_once("top.html");
    require_once("php/connect.php");
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");  
    $antallRader=mysqli_num_rows($sqlResultat); 
    print ("<h3>Registrerte klasser </h3>");   
    print ("<table border=1>");  
    print ("<tr><th align=left>fagkode</th> <th align=left>fagnavn</th></tr>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);  
            $klassekode=$rad["klassekode"];        
            $klassenavn=$rad["klassenavn"];       
            print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> </tr>"); 
        }
    print ("</table>");  
?>

<h3>Hent klasseliste</h3>
<form method="post" action="hentklasse.php" id="hentKlasse" name="hentKlasse">
    Klasse <?php include("listeboks-klassekode.php"); ?>  <br/>
    <input type="submit"  value="Vis studenter" name="hentKlasseKnapp" id="hentKlasseKnapp"> 
</form>


<?php 
    require_once("footer.html");
?>

  