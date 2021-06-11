caricaCabine();


function caricaCabine()
{
    // Richiedi lista eventi
    console.log("entrato");

    fetch(REGISTER_ROUTE+"/cabine/").then(OnResponse).then(onJSON, onError);
}

function OnResponse(response)
{
    return response.json();
}

function onError(error){
    console.log('Error:'+ error);
}

function onJSON(json)
{
    console.log(json);
    const maxi=document.querySelector('#descrizione');
    maxi.innerHTML = '';
  
    
    for(let i in json)
    {
      const container=document.createElement("div"); 
      maxi.appendChild(container); 
      container.classList.add('contenitore'); 
      const new_h1=document.createElement("h1"); 
      new_h1.textContent=json[i].Nome; 
      const new_img=document.createElement("img");
      new_img.src=json[i].Immagine;
      const new_p=document.createElement("p");
      new_p.textContent=json[i].Descrizione;
      const contenuto=document.createElement("span"); 
      contenuto.textContent='Maggiori Dettagli';
    
      container.appendChild(new_h1); /*Da mettere container[i]. */
      container.appendChild(new_img);
      container.appendChild(contenuto);
      container.appendChild(new_p);
     
  
      
      new_p.classList.add('hidden'); 
    }
    /*Implementazione dell'evento "mostra dettagli"*/
      const descrizione=document.querySelectorAll("#descrizione span");
      for(const desc of descrizione){
      desc.addEventListener('click', esegui);
    }
}

function esegui(event){

      const details = event.currentTarget.parentNode.querySelector('p');
      const text = event.currentTarget.parentNode.querySelector('span');  
      if (text.textContent === 'Maggiori Dettagli') { /*il textContent restituisce una string da text */
        details.classList.remove('hidden'); /*rimuovo la classe hidden (con display none) così si vede*/
        text.textContent = 'Nascondi Dettagli';/*cambio la scritta in Nascondi Dettagli*/
      } 
      else
      {
        details.classList.add('hidden'); /*Viceversa di prima*/
        text.textContent = 'Maggiori Dettagli';
      }
 }


 