<?php
    include("top.html");
?> 
<h3>Endre bilde</h3>
<form method="post" action="endre-bilde.php" id="finnBildeSkjema" name="finnBildeSkjema">
    Student <?php include("listeboks-bilde.php"); ?>  <br/>
    <input type="submit"  value="Finn bilde" name="finnBildeKnapp" id="finnBildeKnapp"> 
</form>
<?php
    @$finnBildeKnapp=$_POST ["finnBildeKnapp"];
    if ($finnBildeKnapp)
        {
            $bildenr=$_POST ["bildenr"]; 
            $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat); 
            if ($antallRader==0)
                {
                    print ("Finner ikke bilde du referer til <br />");      
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $bildenr=$rad["bildenr"];      
                    $opplastingsdato=$rad["opplastingsdato"];  
                    $filnavn=$rad["filnavn"];  
                    $beskrivelse=$rad["beskrivelse"]; 
                    print ("<form method='post' action='endre-bilde.php' id='endreBildeSkjema' name='endreBildeSkjema'>");
                    print ("Bildenr <input type='text' value='$bildenr' name='bildenr' id='bildenr' readonly /> <br />");
                    print ("Opplastingsdato <input type='text' value='$opplastingsdato' name='opplastingsdato' id='opplastingsdato' readonly /> <br />");
                    print ("Filnavn <input type='text' value='$filnavn' name='filnavn' id='filnavn' readonly /> <br />");
                    print ("Beskrivelse <input type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse'  /> <br />");
                    print ("<input type='submit' value='Endre beskrivelse' name='endreBildeKnapp' id='endreBildeKnapp'>");
                    print ("</form>");
                }
        }
    @$endreBildeKnapp=$_POST ["endreBildeKnapp"];
    if ($endreBildeKnapp)
        {
            $bildenr=$_POST ["bildenr"];
            $beskrivelse=$_POST ["beskrivelse"];
            if (!$beskrivelse)
                {
                    print ("Du burde ha en beskrivelse"); 
                }
            else
                {
                    $sqlSetning="UPDATE bilde SET beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
                    mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
                    print ("Beskrivelsen på bildet er nå endret<br />");
                }
        }
    include("footer.html");
?> 
  