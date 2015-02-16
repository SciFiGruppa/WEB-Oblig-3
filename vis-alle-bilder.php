<?php  
    include("top.html");
    include("php/connect.php");

    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");  
    $antallRader=mysqli_num_rows($sqlResultat); 
    print ("<h3>Registerte bilder</h3>");   
    print ("<table border=1>");  
    print ("<tr><th align=left>Bildenr</th> <th align=left>opplastingsdato</th> <th align=left>filnavn</th> <th align=left>beskrivelse</th></tr>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);  
            $bildenr=$rad["bildenr"];        
            $opplastingsdato=$rad["opplastingsdato"];    
            $filnavn=$rad["filnavn"];  
            $beskrivelse=$rad["beskrivelse"]; 
            print ("<tr> <td> $bildenr </td> <td> $opplastingsdato </td> <td> <a class='thumbnail' href='#thumb'> $filnavn <span><img src='img/$filnavn'>$beskrivelse</span></a> </td> <td> $beskrivelse </td> </tr>"); 
        }
    print ("</table>");  
    include("footer.html");
?>