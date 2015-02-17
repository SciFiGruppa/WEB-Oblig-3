<?php
require_once("top.html");
?> 
<h1>WEB1000 - OBLIGATORISK OPPGAVE 3</h1>
<p>Vedlikeholdsapplikasjonen inneholder brukerfunksjoner for følgende operasjoner:</p>
Registrering av data i hver av tabellene<br>
Visning av alle data fra hver av tabellene<br>
Endring av data i hver av tabellene (alle felt som ikke er en del av primærnøkkelen skal kunne endres)<br>
Sletting av data i hver av tabellene<br>
Det skal benyttes radioknapper / listebokser / sjekkbokser der dette er hensiktsmessig.<br>
<br>
Ved registrering og endring av data skal det sjekkes at alle felt er fylt ut. Dette skal gjøres både med html5-validering og php-validering. <br>
I tillegg skal det ved registrering av klassekode sjekkes at klassekode består av minst 3 tegn, der det siste tegnet må være et siffer og de øvrige tegnene må være store bokstaver.<br>
<br>
Vedlikeholdsapplikasjonen skal inneholde følgende nye brukerfunksjoner (i tillegg til de brukerfunksjoner som ble laget i obligatorisk oppgave 2 listet over):<br>
<br>
Registrere et bilde i bildetabellen og laste opp et bilde til serveren (opplastingsdato skal ikke angis av bruker, men lages automatisk av php-programmet)<br>
Vis alle bilder (skriver ut en oversikt over alle registrerte bilder med bildenr, opplastingsdato, filnavn og beskrivelse)<br>
Endre beskrivelsen av et bilde<br>
Slette et bilde i bildetabellen og slette bildet fra serveren<br>
Vis klasseliste med bilde (skriver ut en klasseliste med fornavn, etternavn og bilde for alle studenter i en angitt klasse)<br>
Søkefelt / Søkefunksjon for å søke i de ulike tabellene i databasen.<br>
I tillegg må brukerfunksjonen for å registrere student endres slik at bildenr også registeres og brukerfunksjonen for å endre student endres slik at det også er mulig å endre bildenr. Brukerefunksjonene for å registrere bilde og for å registrere student skal være helt separete brukerfunksjoner (ikke integreres i én brukerfunksjon).<br>
<br>
Ved registrering og endring av data skal det sjekkes at alle felt er fylt ut. Dette skal gjøres både med html5-validering, php-validering og js-validering.<br>
<br>
Følgende hendelser skal realiseres i vedlikeholdsapplikasjonen:<br>
<br>
når et felt får fokus skal bakgrunnsfargen til feltet endres<br>
når et felt mister fokus skal bakgrunnsfargen til feltet endres tilbake til utgangspunktet<br>
ved mus inn i et felt skal det komme en melding som sier noe om hvordan feltet skal fylles ut / hvilke krav som gjelder for feltverdien<br>
ved mus ut et felt skal meldingen forsvinne<br>
Følgende asynkron kommunikasjon (ajax) skal realiseres i vedlikeholdsapplikasjonen for brukerfunksjonen registrer student:<br>
<br>
når en klassekode velges/endres i listeboksen skal det vises en oversikt over alle registrerte studenter i denne klassen<br>
når et annet felt (brukernavn, fornavn, etternavn, bildenr) får fokus skal oversikten over alle registrerte studenter i klassen forsvinne<br>
Besvarelsen av oppgaven skal ligge i følgende mappe på studentserveren: https://home.hbv.no/BRUKERNAVN/web1000/innlevering3<br>

<?php
require_once("footer.html");
?>