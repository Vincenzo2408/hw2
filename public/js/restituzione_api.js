const form=document.querySelector('#musica');
form.addEventListener('submit',ricercamusica);

const form2 = document.querySelector('#libri');
form2.addEventListener('submit', ricercalibri);

caricapreferiti();

function caricapreferiti(){
    fetch(REGISTER_ROUTE+"/caricapreferiti/").then(onResponse).then(onJson3);
}

function onJson3(json){
    const contenitore=document.querySelector("#preferiti");
    for(let i in json){
        if(json[i].Musica){
        const musica=document.querySelector("#music");
        musica.textContent="La tua musica preferita è: "+json[i].Musica;
        contenitore.appendChild(musica);
        contenitore.classList.remove("hidden");
        }
        if(json[i].Libro){
        const libro=document.querySelector("#libro");
        libro.textContent="Il tuo libro preferito è: " +json[i].Libro;
        contenitore.appendChild(libro);
        contenitore.classList.remove("hidden");
        }     
    }
}

function aggiungi_database_musica(event){
        let titolo=event.currentTarget.parentNode.querySelector("h6").innerHTML;
        console.log(titolo);

        fetch(REGISTER_ROUTE+"/musica_add/"+titolo).then(caricapreferiti);
}

function aggiungi_database_libro(event){
        const titolo_input=event.currentTarget.parentNode.querySelector("h5");
        console.log(titolo_input);
        const titolo_value = titolo_input.innerHTML;
	    console.log(titolo_value);
        fetch(REGISTER_ROUTE+"/libro_add/"+titolo_value).then(caricapreferiti);
}


function ricercamusica (event){
	let cerca=form.cerca.value;
	//console.log(cerca);
	
    fetch(REGISTER_ROUTE+"/spotify/"+cerca).then(onResponse).then(onJson);
	event.preventDefault();
	
}

function ricercalibri (event){
	let cerca=form2.cerca.value;
	//console.log(cerca);
	
    fetch(REGISTER_ROUTE+"/libro/"+cerca).then(onResponse).then(onJson2);
	event.preventDefault();
}

function onResponse(response){
    return response.json();
}

function onJson(json) 
{
  console.log('JSON ricevuto');
  console.log(json);
  // Svuotiamo la libreria
  const library = document.querySelector('#sezione_musica');
  library.innerHTML = '';
  // Leggi il numero di risultati
  const totali = json.albums.items;
 
  let risultati = totali.length;
  // Mostriamone al massimo 6
  if(risultati > 6){
     risultati = 6;
  }
  // Processa ciascun risultato
  for(let i=0; i<risultati; i++)
  {   
    //Creiamo i div che conterranno i dati
    const album = document.createElement('div');
    library.appendChild(album);
    //Carichiamo i dati
    const album_data = totali[i];
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    const img = document.createElement('img');
    img.src = selected_image;
    const caption = document.createElement('h6');
    caption.textContent = title;
    const bottone = document.createElement('botton');
    bottone.textContent = "Vota preferito";
    bottone.addEventListener("click", aggiungi_database_musica);
    album.appendChild(bottone);
    album.appendChild(img);
    album.appendChild(caption);
 
  } 
}


function onJson2(json){
    console.log(json); 
    const library = document.querySelector('#sezione_libri');
    library.innerHTML = '';
    let num_results = json.num_found;
    if(num_results > 5){
      num_results = 5;
    }
    for(let i=0; i<num_results; i++)
    {
      const new_div = document.createElement('div');
      library.appendChild(new_div);
      const doc = json.docs[i]
      const autore = doc.author_name;
      const titolo = doc.title;
      console.log(autore);

      const bottone = document.createElement('botton');
      bottone.textContent = "Vota preferito";
      new_div.appendChild(bottone);
      bottone.addEventListener("click", aggiungi_database_libro);
    
      const new_h6 = document.createElement('h6');
      new_h6.textContent = autore;
      new_div.appendChild(new_h6);
  
      const new_h6_2 = document.createElement('h5');
      new_h6_2.textContent=titolo;
      new_div.appendChild(new_h6_2);
    }
  }