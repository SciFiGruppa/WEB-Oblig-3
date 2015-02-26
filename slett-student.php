<?php 
    require_once("top.html");
    require_once("php/constants.php");
?> 
<h3>Slett student</h3>
<form method="post" action="slett-student.php" id="slettStudentSkjema" name="slettStudentSkjema" cleaned="return bekreft()">
    Student <?php require_once("listeboks-student.php"); ?> <br/>
    <input type="submit" value="Slett Student" name="slettStudentKnapp" id="slettStudentKnapp" onclick="return confirm('Er du sikker?')" /> 
</form>
<?php
    @$slettStudentKnapp=$_POST ["slettStudentKnapp"];
    if ($slettStudentKnapp)
        {
            $brukernavn=$_POST ["brukernavn"];   
            $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");  /* SQL-setning sendt til database-serveren */
            print ("Følgende student er nå slettet: $brukernavn $fornavn $etternavn $klassekode <br />");
            print ("<script type='text/javascript'>
                        window.setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 500);
                    </script>");
        }
    require_once("footer.html");
?> 