<?php    
    include("top.html");
    include("connect.php");  
?>

<h3>Søk i databasen</h3>

<form action="search.php" method="post" id="SearchKnapp" name="SearchKnapp">
        <td class="search">Søk: </td><td><input id="search" type="text" name="search"></td>
        <td class="search"><input type="submit" value="Search" id="SearchKnapp" name="SearchKnapp"></td>
</form>

<?php
       @$SearchKnapp=$_POST ["SearchKnapp"];
    if ($SearchKnapp)
        {

        	$search = $_POST['search'];

                    $klasse = mysqli_query($db,"SELECT klasse.klassekode, klasse.klassenavn
                                            FROM klasse
                                            Where (klasse.klassekode='$search' OR klasse.klassenavn='$search')");
                    $student = mysqli_query($db,"SELECT student.brukernavn, student.fornavn, student.etternavn, student.klassekode, student.bildenr
                                            FROM student
                                            Where (student.brukernavn='$search' OR student.fornavn='$search' OR student.etternavn='$search' OR student.klassekode='$search' OR student.bildenr='$search')");
                    $bilde = mysqli_query($db,"SELECT bilde.bildenr, bilde.opplastingsdato, bilde.filnavn, bilde.beskrivelse
                                            FROM bilde
                                            Where (bilde.bildenr='$search' OR bilde.opplastingsdato='$search' OR bilde.filnavn='$search' OR bilde.beskrivelse='$search' )");
                    
                    $antallRaderklasse=mysqli_num_rows($klasse);
                    $antallRaderstudent=mysqli_num_rows($student);
                    $antallRaderbilde=mysqli_num_rows($bilde);

                    if ($antallRaderklasse>0)  
                            {
                              echo "<p class='list'><table class='output' border='1'>
                                <tr class='name' style='outline: thin solid'>
                                <th class='name'><a>klasse</a></th>
                                <th class='name'><a>klassekode</a></th>
                                </tr>";
                                while($row = mysqli_fetch_array($klasse)) 
			                    {
			                      echo "<tr class='name' style='outline: thin solid'>";
			                      echo "<td class='name'>" . $row['klassekode'] . "</td>";
			                      echo "<td class='name'>" . $row['klassenavn'] . "</td>";
			                      echo "</tr>";  
			                       echo "</table></p>";                    
			                    }
                                
                            }
                    if ($antallRaderstudent>0)  
                            {
                              echo "<p class='list'><table class='output' border='1'>
                                <tr class='name' style='outline: thin solid'>
                                <th class='name'><a>brukernavn</a></th>
                                <th class='name'><a>fornavn</a></th>
                                <th class='name'><a>etternavn</a></th>
                                <th class='name'><a>klassekode</a></th>
                                <th class='name'><a>bildenr</a></th>
                                </tr>";
                                while($row = mysqli_fetch_array($student)) 
			                    {
			                      echo "<tr class='name' style='outline: thin solid'>";
			                      echo "<td class='name'>" . $row['brukernavn'] . "</td>";
			                      echo "<td class='name'>" . $row['fornavn'] . "</td>";
			                      echo "<td class='name'>" . $row['etternavn'] . "</td>";
			                      echo "<td class='name'>" . $row['klassekode'] . "</td>";
			                      echo "<td class='name'>" . $row['bildenr'] . "</td>";
			                      echo "</tr>";    
			                       echo "</table></p>";                  
			                    }
                                
                            }
                    if ($antallRaderbilde>0)  
                            {
                              echo "<p class='list'><table class='output' border='1'>
                                <tr class='name' style='outline: thin solid'>
                                <th class='name'><a>bildenr</a></th>
                                <th class='name'><a>opplastingsdato</a></th>
                                <th class='name'><a>filnavn</a></th>
                                <th class='name'><a>beskrivelse</a></th>
                                </tr>";
                                while($row = mysqli_fetch_array($bilde)) 
			                    {
			                      echo "<tr class='name' style='outline: thin solid'>";
			                      echo "<td class='name'>" . $row['bildenr'] . "</td>";
			                      echo "<td class='name'>" . $row['opplastingsdato'] . "</td>";
			                      echo "<td class='name'>" . $row['filnavn'] . "</td>";
			                      echo "<td class='name'>" . $row['beskrivelse'] . "</td>";
			                      echo "</tr>"; 
			                       echo "</table></p>";                     
			                    }
                                
                            }
                            
                    
                    
           

            }
        






    
    include("footer.html");
?>