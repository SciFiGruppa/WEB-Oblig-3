<?php 
    include("top.html");
    require_once("php/config.php");
?> 
<h3>Slett klasse</h3>
<form method="post" action="slett-klasse.php" id="slettKlasseSkjema" name="slettKlasseSkjema" cleaned="return bekreft()">
    Klasse <?php include("listeboks-klassekode.php"); ?> <br/>
    <input type="submit" value="Slett Klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" onclick="return confirm('Er du sikker?')" /> 
</form>
<?php
    @$slettKlasseKnapp=$_POST ["slettKlasseKnapp"];
    if ($slettKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode'";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");  /* SQL-setning sendt til database-serveren */
            print ("Følgende Klasse er nå slettet: $klassekode <br />");
        }
    include("footer.html");
?> 