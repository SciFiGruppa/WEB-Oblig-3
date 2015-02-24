<?php
    require_once('php/connect.php');
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 
    $antallRader=mysqli_num_rows($sqlResultat); 
    print("<select onblur='domfn.emptyList(\"student-list-ol\", \"selected-class\")' onfocus='sitefn.doAjax(this.value, \"student-list-ol\", \"selected-class\", this.value)' onchange='sitefn.doAjax(this.value, \"student-list-ol\", \"selected-class\", this.value)' name='klassekode' id='klassekode'>"); 
    for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat); 
            $klassekode=$rad["klassekode"];       
            $klassenavn=$rad["klassenavn"]; 
            if (isset($klassekodeedit) && $klassekode==$klassekodeedit)
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
  