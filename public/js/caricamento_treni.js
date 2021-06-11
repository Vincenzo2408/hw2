caricaTratte();


function caricaTratte()
{
    // Richiedi lista eventi
    console.log("entrato");

    fetch(REGISTER_ROUTE+"/caricamento_tratte/").then(OnResponse).then(onJSON, onError);
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
      new_h1.textContent=json[i].CittàArrivo; 
      const new_img=document.createElement("img");
      new_img.src=json[i].Immagine;
      const new_p=document.createElement("p");
      new_p.textContent="Partenza: "+json[i].Orario;
      const new_p2=document.createElement("p"); 
      new_p2.textContent="Offerto da: "+json[i].Agenz[0].Agenzia;
    
      container.appendChild(new_h1); 
      container.appendChild(new_img);
      container.appendChild(new_p);
      container.appendChild(new_p2);
    }
}

document.getElementById("fnome").addEventListener("keyup", ricerca);

function ricerca(event){
    const input = document.getElementById("fnome");
    const filtro = input.value.toUpperCase();
    const lista = document.querySelectorAll("#descrizione h1");
    for (let i=0; i<lista.length; i++) {
        const testo = lista[i].textContent;
        if (testo.toUpperCase().indexOf(filtro) > -1) {
          lista[i].parentNode.classList.remove('hidden');
        } else {
          lista[i].parentNode.classList.add('hidden');
        }
    }
  }   
  