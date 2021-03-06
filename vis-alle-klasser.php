<?php  
    require_once("top.html");
    require_once("php/connect.php");
    require_once("php/constants.php");
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");  
    $antallRader=mysqli_num_rows($sqlResultat); 
    print ("<h3>Registrerte klasser </h3>");   
    print ("<table border=1>");  
    print ("<tr><th align=left>fagkode</th> <th align=left>fagnavn</th></tr>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);  
            $klassekode=$rad["klassekode"];        
            $klassenavn=$rad["klassenavn"];       
            print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> </tr>"); 
        }
    print ("</table>");  
?>

<h3>Hent klasseliste</h3>
<form method="post" action="" id="hentKlasse" name="hentKlasse">
    Klasse <?php include("listeboks-klassekode.php"); ?>  <br/>
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
                    $httpPath = "https://home.hbv.no/phptemp/" . Config::$UPLOAD_IMAGE_PREFIX . "/" . $filnavn;
                    print ("<tr><td>$fornavn</td><td>$etternavn</td><td> <a class='thumbnail' href='#thumb'> <img src='$httpPath' alt='HTML5 Icon' style='width:64px;height:64px'> <span><img src='$httpPath'>$beskrivelse</span></a> </td>  </tr>");
                }
        }
    }
    print ("</table>");  
    require_once("footer.html");
?>
