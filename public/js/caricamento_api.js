/*Per la Covid Zone*/
function onJson(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la lista
    console.log(json);
    const lista = document.querySelector('#sezione_covid');
    lista.innerHTML = '';
    const doc=json.All;
    console.log(doc);
  
   
    if(doc){
     // Creiamo il div che conterrà i dati
      const elenco = document.createElement('div');
      lista.appendChild(elenco);
      const confermati = doc.confirmed;
      const ricoverati = doc.recovered;
      const morti=doc.deaths;
      // Creiamo i dati
      const new_h1 = document.createElement('p');
      new_h1.textContent = 'Numero di positivi: ' + confermati;
      elenco.appendChild(new_h1);

      const new_h1_1 = document.createElement('p');
      new_h1_1.textContent = 'Numero di ricoveri: ' + ricoverati;
      elenco.appendChild(new_h1_1);
     
      const new_h1_2=document.createElement('p'); 
      new_h1_2.textContent='Numero di morti: ' + morti;
      elenco.appendChild(new_h1_2);}
    else
    {
        const new_p=document.createElement('p');
        new_p.textContent='Paese non esistente o scritto in altra lingua'; 
        lista.appendChild(new_p);    
    }
}
  
function ricercacovid(event)
{
    // Impedisci il submit del form
    event.preventDefault();
    // Leggi valore del campo di testo
    const paese_input = document.querySelector('#paese');
    const paese_value = encodeURIComponent(paese_input.value);
    console.log(paese_value);

    //Esecuzione
    fetch(REGISTER_ROUTE+"/covid/"+paese_value).then(onResponse).then(onJson, onError);
}



//Funzioni per tutti
function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}

function onError(error){
    console.log('Error:'+ error);
}





  // Aggiungi event listener al form
  const form = document.querySelector('#malati');
  form.addEventListener('submit', ricercacovid)

