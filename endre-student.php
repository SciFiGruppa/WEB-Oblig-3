<?php
    require_once("top.html");
    require_once("php/constants.php");
?> 
<h3>Endre Student</h3>
<form method="post" action="endre-student.php" id="finnStudentSkjema" name="finnStudentSkjema">
    Student <?php require_once("listeboks-student.php"); ?>  <br/>
    <input type="submit"  value="Finn student" name="finnStudentKnapp" id="finnStudentKnapp"> 
</form>
<?php
    @$finnStudentKnapp=$_POST ["finnStudentKnapp"];
    if ($finnStudentKnapp)
        {
            $brukernavn=$_POST ["brukernavn"]; 
            $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat); 
            if ($antallRader==0)
                {
                    print ("Angitt student er ikke registrert <br />");      
                }
            else
                {
                    $rad=mysqli_fetch_array($sqlResultat);  
                    $brukernavn=$rad["brukernavn"];      
                    $fornavn=$rad["fornavn"];  
                    $etternavn=$rad["etternavn"];  
                    $klassekodeedit=$rad["klassekode"]; 
                    $bildenredit=$rad["bildenr"]; 
                    print ("<form method='post' action='endre-student.php' id='endreStudentSkjema' name='endreStudentSkjema'>");
                    print ("Brukernavn <input type='text' value='$brukernavn' name='brukernavn' id='brukernavn' readonly /> <br />");
                    print ("Fornavn <input type='text' value='$fornavn' name='fornavn' id='fornavn' required onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this)' onMouseOut='musUt()' /> <br />");
                    print ("Etternavn <input type='text' value='$etternavn' name='etternavn' id='etternavn' reguired onFocus='fokus(this)' onBlur='mistetFokus(this)' onMouseOver='musInn(this)' onMouseOut='musUt()' /> <br />");
                    print ("Klassekode "); 
                    require_once('listeboks-klassekode.php');
                    print ("<br/>");
                    print ("Bildenr ");
                    require_once('listeboks-bilde.php');
                    print ("<br/>");
                    print ("<input type='submit' value='Endre student' name='endreStudentKnapp' id='endreStudentKnapp'>");
                    print ("</form>");
                }
        }
    @$endreStudentKnapp=$_POST ["endreStudentKnapp"];
    if ($endreStudentKnapp)
        {
            $brukernavn=$_POST ["brukernavn"];
            $fornavn=$_POST ["fornavn"];
            $etternavn=$_POST ["etternavn"];
            $klassekode=$_POST ["klassekode"];
            $bildenr=$_POST ["bildenr"];
            if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
                {
                    print ("Alle felt må fylles ut"); 
                }
            else
                {
                    $sqlSetning="UPDATE student SET fornavn='$fornavn', etternavn='$etternavn', klassekode='$klassekode', bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
                    mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
                    print ("Studenten med brukernavn $brukernavn er nå endret<br />");
                }
        }
    require_once("footer.html");
?> 
  