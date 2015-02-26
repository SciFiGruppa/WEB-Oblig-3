<?php 
    require_once("top.html");
    require_once("php/constants.php");
?> 
<h3>Slett klasse</h3>
<form method="post" action="slett-klasse.php" id="slettKlasseSkjema" name="slettKlasseSkjema" cleaned="return bekreft()">
    Klasse <?php require_once("listeboks-klassekode.php"); ?> <br/>
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
            print ("<script type='text/javascript'>
                        window.setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 500);
                    </script>");
        }
    require_once("footer.html");
?> 