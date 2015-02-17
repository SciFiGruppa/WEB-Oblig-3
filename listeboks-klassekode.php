<?php 
    require_once("php/connect.php");
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 
    $antallRader=mysqli_num_rows($sqlResultat); 
    print("<select name='klassekode' id='klassekode'>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat); 
            $klassekode=$rad["klassekode"];       
            $klassenavn=$rad["klassenavn"]; 
            if ($klassekode==$klassekodeedit)
                {
                    print("<option value='$klassekode' selected>$klassekode $klassenavn</option>");
                }   
            else 
                {
                    print("<option value='$klassekode'>$klassekode $klassenavn</option>"); 
                }
        }

    print("</select>");
?>
  