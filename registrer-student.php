<!DOCTYPE html>
<?php 
  include("top.html");
  require_once("php/config.php");
  include("php/connect.php");
?> 
<script type="text/javascript" src="js/ajax_studentsByClass.js"></script>
<div class="float-left" id="reg-student">
    <h3>Registrer student</h3>
    <form method="post" action="registrer-student.php" id="registrerStudentSkjema" name="registrerStudentSkjema">
            Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
            Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
            Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
    		Klassekode <?php include("listeboks-klassekode.php"); ?>  <br/>
            Bildenr <?php include("listeboks-bilde.php"); ?>  <br/>
    		<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" /> 
    		<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>
</div>
<div class="float-left" id="student-list">
    <h3 id="selected-class"></h3>
    <ol id="student-list-ol">
        
    </ol>
</div>
<div class="clear"></div>

<?php 
    @$registrerStudentKnapp=$_POST ["registrerStudentKnapp"];
    if ($registrerStudentKnapp)    
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
                    $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
                    $antallRader=mysqli_num_rows($sqlResultat); 
                    if ($antallRader!=0)  
                        {
                            print ("Studenten er registrert fra før");
                        }
                    else
                        {
                           $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode, bildenr) VALUES('$brukernavn','$fornavn','$etternavn','$klassekode', '$bildenr');";
                           mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                           print ("Følgende student er nå registrert: $brukernavn $fornavn $etternavn $klassekode"); 
                        }
                }
        }
    include("footer.html");
?> 
  