<?php  
    include("connect.php"); 
    $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 
    $antallRader=mysqli_num_rows($sqlResultat); 
    print("<select name='brukernavn' id='brukernavn'>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat); 
            $brukernavn=$rad["brukernavn"]; 
            $fornavn=$rad["fornavn"];  
            $etternavn=$rad["etternavn"]; 
            $klassekode=$rad["klassekode"]; 
            print("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode </option>"); 
        }
    print("</select>"); 
?>