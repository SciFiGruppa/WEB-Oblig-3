<?php    
    require_once("top.html");
    require_once("php/connect.php");
?>

<h3>Søkeresultat:</h3>

<?php 
@$SearchKnapp=$_POST ["SearchKnapp"];
    if ($SearchKnapp)
        {

        	$search = $_POST['search'];

                    $klasse = mysqli_query($db,"SELECT klasse.klassekode, klasse.klassenavn
                                            FROM klasse
                                            Where klasse.klassekode LIKE '%$search%' OR klasse.klassenavn LIKE '%$search%'");
                    $student = mysqli_query($db,"SELECT student.brukernavn, student.fornavn, student.etternavn, student.klassekode, student.bildenr
                                            FROM student
                                            Where student.brukernavn LIKE '%$search%' OR student.fornavn LIKE '%$search%' OR student.etternavn LIKE '%$search%' OR student.klassekode LIKE '%$search%' OR student.bildenr LIKE '%$search%'");
                    $bilde = mysqli_query($db,"SELECT bilde.bildenr, bilde.opplastingsdato, bilde.filnavn, bilde.beskrivelse
                                            FROM bilde
                                            Where bilde.bildenr LIKE '%$search%' OR bilde.opplastingsdato LIKE '%$search%' OR bilde.filnavn LIKE '%$search%' OR bilde.beskrivelse LIKE '%$search%'");
                    
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
			                      echo "<tr class='name'>";
			                      echo "<td class='name'>" . $row['klassekode'] . "</td>";
			                      echo "<td class='name'>" . $row['klassenavn'] . "</td>";
			                      echo "</tr>";          
			                    }
                                echo "</table></p>";  
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
			                      echo "<tr class='name'>";
			                      echo "<td class='name'>" . $row['brukernavn'] . "</td>";
			                      echo "<td class='name'>" . $row['fornavn'] . "</td>";
			                      echo "<td class='name'>" . $row['etternavn'] . "</td>";
			                      echo "<td class='name'>" . $row['klassekode'] . "</td>";
			                      echo "<td class='name'>" . $row['bildenr'] . "</td>";
			                      echo "</tr>";                   
			                    }
			                    echo "</table></p>";   
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
			                      echo "<tr class='name'>";
			                      echo "<td class='name'>" . $row['bildenr'] . "</td>";
			                      echo "<td class='name'>" . $row['opplastingsdato'] . "</td>";
			                      echo "<td class='name'><a class='thumbnail' href='#thumb'>" . $row['filnavn'] . "<span><img src='img/" . $row['filnavn'] . "'>" . $row['beskrivelse'] . "</span></a></td>";
			                      echo "<td class='name'>" . $row['beskrivelse'] . "</td>";
			                      echo "</tr>";                 
			                    }
                                echo "</table></p>";  
                            }
            }


    require_once("footer.html");
?>