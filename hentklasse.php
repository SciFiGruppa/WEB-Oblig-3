<?php  
    require_once("top.html");
    require_once("connect.php");
?>

<h3>Hent klasseliste</h3>
<form method="post" action="hentklasse.php" id="hentKlasse" name="hentKlasse">
    Klasse <?php require_once("listeboks-klassekode.php"); ?>  <br/>
    <input type="submit"  value="Vis studenter" name="hentKlasseKnapp" id="hentKlasseKnapp"> 
</form>

<?php

@$hentKlasseKnapp=$_POST ["hentKlasseKnapp"];
    if ($hentKlasseKnapp)
	{
	$klassekode=$_POST ["klassekode"]; 
	$sqlSetning="SELECT student.brukernavn,student.fornavn,student.etternavn,student.klassekode,student.bildenr, bilde.opplastingsdato, bilde.filnavn, bilde.beskrivelse
FROM student 
LEFT JOIN bilde ON bilde.bildenr=student.bildenr
WHERE klassekode='$klassekode';";
    $sqlResultat=mysqli_query($db,$sqlSetning);
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat);     
	if ($antallRader==0)
	    {
	    	print ("Finner ikke noen studenter registrert i klassen $klassekode");
	    }
	else 
		{
			print ("<h3>Registerte studenter i klassen $klassekode</h3>");   
		    print ("<table border=1>");  
		    print ("<tr><th align=left>Fornavn</th><th align=left>Etternavn</th><th align=left>Bilde</th></tr>"); 
		    
		    for ($r=1;$r<=$antallRader;$r++)
		        {
				    
		            $rad=mysqli_fetch_array($sqlResultat);			
		            $fornavn=$rad["fornavn"];  
		            $etternavn=$rad["etternavn"];
		            $bildenr= $rad ["bildenr"];	
		            $filnavn= $rad ["filnavn"];
		            $opplastingsdato= $rad ["opplastingsdato"];
		            $beskrivelse= $rad ["beskrivelse"];	
		            print ("<tr><td>$fornavn</td><td>$etternavn</td><td> <a class='thumbnail' href='#thumb'> <img src='img/$filnavn' alt='HTML5 Icon' style='width:64px;height:64px'> <span><img src='img/$filnavn'>$beskrivelse</span></a> </td>  </tr>");			
		        }
		}
	}
    print ("</table>");  
    require_once("footer.html");
?>