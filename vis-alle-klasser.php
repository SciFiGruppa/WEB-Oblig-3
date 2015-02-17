<?php  
    include("top.html");
    include("php/connect.php");  
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
    include("footer.html");
?>
  