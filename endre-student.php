<?php
    include("top.html");
    require_once("php/config.php");
?> 
<h3>Endre Student</h3>
<form method="post" action="endre-student.php" id="finnStudentSkjema" name="finnStudentSkjema">
    Student <?php include("listeboks-student.php"); ?>  <br/>
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
                    print ("Fornavn <input type='text' value='$fornavn' name='fornavn' id='fornavn' required /> <br />");
                    print ("Etternavn <input type='text' value='$etternavn' name='etternavn' id='etternavn' reguired /> <br />");
                    print ("Klassekode "); 
                    include('listeboks-klassekode.php'); 
                    print ("<br/>");
                    print ("Bildenr ");
                    include('listeboks-bilde.php');
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
    include("footer.html");
?> 
  