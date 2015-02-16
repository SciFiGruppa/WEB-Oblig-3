<?php  
    include("top.html");
    include("connect.php");  
?>

<h3>Hent klasseliste</h3>
<form method="post" action="hentKlasse.php" id="hentKlasse" name="hentKlasse">
    Klasse <?php include("listeboks-klassekode.php"); ?>  <br/>
    <input type="submit"  value="Vis studenter" name="hentKlasseKnapp" id="hentKlasseKnapp"> 
</form>

<?php

@$hentKlasseKnapp=$_POST ["hentKlasseKnapp"];
    if ($hentKlasseKnapp)
	{
	$klassekode=$_POST ["klassekode"]; 
	$sqlSetning="SELECT student.brukernavn,student.fornavn,student.etternavn,student.klassekode,student.bildenr, bilde.bildefilnavn 
FROM student 
INNER JOIN bilde ON bilde.bildenr=student.bildenr
WHERE klassekode='$klassekode';";
    $sqlResultat=mysqli_query($db,$sqlSetning);
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat);     
	print ("<table>");
    for ($r=1;$r<=$antallRader;$r++)
        {
		    
            $rad=mysqli_fetch_array($sqlResultat);			
            $fornavn=$rad["fornavn"];  
            $etternavn=$rad["etternavn"];
            $bildenr= $rad ["bildenr"];	
            $bildefilnavn= $rad ["bildefilnavn"];			
            print ("<tr><th>$fornavn</th><th>$etternavn</th><th>$bildefilnavn</th> </tr>");			
        }
	}
    print ("</table>");  
    include("footer.html");
?>