function musInn(element)
{
  if (element==document.getElementById("klassekode"))
    {
      document.getElementById("melding").innerHTML="Klassekode skal bestå av 3 tegn og slutte med 1 tall";
    }
  if (element==document.getElementById("klassenavn"))
    {
      document.getElementById("melding").innerHTML="Klassenavn må fylles ut";
    }
  if (element==document.getElementById("brukernavn"))
    {
      document.getElementById("melding").innerHTML="Brukernavn må fylles ut";
    }
  if (element==document.getElementById("fornavn"))
    {
      document.getElementById("melding").innerHTML="Fornavn må fylles ut";
    }
  if (element==document.getElementById("etternavn"))
    {
      document.getElementById("melding").innerHTML="Etternavn må fylles ut";
    }
}

function musUt()
{
  document.getElementById("melding").innerHTML="";
}

function fokus(element)
{
  element.style.background="yellow";
} 

function mistetFokus(element)
{
  element.style.background="white";
}