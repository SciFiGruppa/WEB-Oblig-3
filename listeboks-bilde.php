<?php
    require_once("php/connect.php");
    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 
    $antallRader=mysqli_num_rows($sqlResultat); 
    print("<select name='bildenr' id='bildenr'>");
    print("<option value='-1'>-----------------------------------</option>");
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat); 
            $bildenr=$rad["bildenr"]; 
            $opplastingsdato=$rad["opplastingsdato"];  
            $filnavn=$rad["filnavn"]; 
            $beskrivelse=$rad["beskrivelse"]; 
            
            if ($bildenr==$bildenredit)
                {
                    print("<option value='$bildenr' selected>$bildenr $beskrivelse </option>"); 
                } 
            else
                {
                   print("<option value='$bildenr'>$bildenr $beskrivelse </option>");
                }   
        }
       print("</select>"); 
?>