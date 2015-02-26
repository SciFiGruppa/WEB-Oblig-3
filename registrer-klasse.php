<?php  
    require_once("top.html");
    require_once("php/connect.php");
?> 

<h3>Registrer Klasse </h3>

<form method="post" action="registrer-klasse.php" id="registrerFagSkjema" name="registrerFagSkjema">
		Klassekode <input type="text" id="klassekode" name="klassekode" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br/>
		Klassenavn <input type="text" id="klassenavn" name="klassenavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br/>
		<input type="submit" value="Registrer fag" id="registrerFagKnapp" name="registrerFagKnapp" /> 
		<input type="reset" value="Nullstill" id="nullstill2" name="nullstill2" /> <br />

<p id="melding"><p>

        
</form>

<?php 
    @$registrerFagKnapp=$_POST ["registrerFagKnapp"];
    if ($registrerFagKnapp) 
        {
            $klassekode=$_POST ["klassekode"];
            $klassenavn=$_POST ["klassenavn"];
            
            if (!$klassekode || !$klassenavn)
                {
                    print ("Alle felt må fylles ut"); 
                }
            else if(strlen($klassekode) < 3)
                {
                print ("Klassekoden kan ikke inneholde mindre enn 3 tegn");
               }
            else if(ctype_alpha(substr($klassekode, -1)))
                {
                print ("Klassekoden må ha ett siffer som siste tegn");
               }
            else if(ctype_lower(substr($klassekode, 0, -1)))
                {
                print ("Klassekoden kan ikke ha små tegn");
               }
            else if(ctype_alpha(substr($klassekode, 0, -1)))
                {
                 
                    $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
                    $antallRader=mysqli_num_rows($sqlResultat); 
                    if ($antallRader!=0) 
                        {
                            print ("Klassen er registrert fra før");
                        }
                    else
                        {
                            $sqlSetning="INSERT INTO klasse (klassekode,klassenavn) VALUES('$klassekode','$klassenavn');";
                            mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
                            print ("Følgende klasse er nå registrert: $klassekode $klassenavn");  
                        }
               }
           
           
            else
                {
                    print ("Kun siste tegnet kan være siffer");
                    
                }
        }
    require_once("footer.html");
?> 
  