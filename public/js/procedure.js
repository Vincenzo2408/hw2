document.querySelector("#forms2").addEventListener("submit", aggiungiEvento);

function aggiungiEvento(event){
    const form = document.querySelector("#treno");
    const form_data=form.value;
    console.log(form_data);
    
    fetch(REGISTER_ROUTE+"/procedura/"+form_data).then(OnResponse).then(onJson);
    // Impedisci submit
    event.preventDefault();
}

function OnResponse(response)
{
    return response.json();
}

function onJson(json){
    console.log(json);
 
    const risposta = document.querySelector("#risposta");
    risposta.innerHTML = '';
    for(let i in json){
        const p = document.createElement("p");
        p.textContent=json[i].Nome
        risposta.appendChild(p);
    }
}