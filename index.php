<?php
include("top.html");
?> 
<h1>WEB1000 - OBLIGATORISK OPPGAVE 2</h1>
<p>Vedlikeholdsapplikasjonen skal inneholde brukerfunksjoner for følgende operasjoner:</p>
Registrering av data i hver av tabellene<br>
Visning av alle data fra hver av tabellene<br>
Endring av data i hver av tabellene (alle felt som ikke er en del av primærnøkkelen skal kunne endres)<br>
Sletting av data i hver av tabellene<br>
Det skal benyttes radioknapper / listebokser / sjekkbokser der dette er hensiktsmessig.<br>
<br>
Ved registrering og endring av data skal det sjekkes at alle felt er fylt ut. Dette skal gjøres både med html5-validering og php-validering. <br>
I tillegg skal det ved registrering av klassekode sjekkes at klassekode består av minst 3 tegn, der det siste tegnet må være et siffer og de øvrige tegnene må være store bokstaver.<br>
<?php
include("footer.html");
?>