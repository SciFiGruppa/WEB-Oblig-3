<?php
    include("top.html");
?> 
<h3>Endre Klasse</h3>
<form method="post" action="endre-klasse.php" id="finnKlasseSkjema" name="finnKlasseSkjema">
    Klasse <?php include("listeboks-klassekode.php"); ?>  <br/>
    <input type="submit"  value="Finn klasse" name="finnKlasseKnapp" id="finnKlasseKnapp"> 
</form>
<?php
    @$finnKlasseKnapp=$_POST ["finnKlasseKnapp"];
    if ($finnKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];  
            $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat);  
            if ($antallRader==0)
                {
                    print ("Angitt klasse er ikke registrert <br />");		
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $klassekode=$rad["klassekode"];      
                    $klassenavn=$rad["klassenavn"];    
                    print ("<form method='post' action='endre-klasse.php' id='endreKlasseSkjema' name='endreKlasseSkjema'>");
                    print ("Klassekode <input type='text' value='$klassekode' name='klassekode' id='klassekode' readonly /> <br />");
                    print ("Klassenavn <input type='text' value='$klassenavn' name='klassenavn' id='klassenavn' required /> <br />");
                    print ("<input type='submit' value='Endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'>");
                    print ("</form>");
                }
        }
    @$endreKlasseKnapp=$_POST ["endreKlasseKnapp"];
    if ($endreKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $klassenavn=$_POST ["klassenavn"];   
            if (!$klassekode || !$klassenavn)
                {
                    print ("Alle felt må fylles ut");    /* melding skrevet */
                }
            else
                {
                    $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
                    mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
                    print ("Klassen med klassekode $klassekode er nå endret<br />");
                }
    	}
    include("footer.html");
?> 
  