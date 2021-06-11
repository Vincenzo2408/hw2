function onResponse(response){
    return response.text();
}

function onText(text){
    const controllo=document.querySelector('#segnalazione');

    if(text=="1"){
        controllo.classList.remove("hidden");
      
    }
    else
    {
        controllo.classList.add("hidden");
       
    }
}

function controllo(){
    const username=document.querySelector('#username').value;
    fetch(REGISTER_ROUTE+"/username/"+username).then(onResponse).then(onText);
}

function conpass(){
    const password=document.querySelector('#password').value;
    const frasepass=document.querySelector('#segnpass');
    console.log(password);
    if((password.length<6) || (password.length>15)){
        frasepass.classList.remove("hidden");
    }
    else{
        frasepass.classList.add("hidden");
    }
}

function conema(){
    const email=document.querySelector('#email').value;
    console.log(email);
    fetch(REGISTER_ROUTE+"/email/"+email).then(onResponse).then(onText2);
}

function onText2(text){
    console.log(text);
    const controllo=document.querySelector('#segnemail');

    if(text=="1"){
        controllo.classList.remove("hidden");
      
    }
    else
    {
        controllo.classList.add("hidden");
    }
}

function confermapass(){
    const password=document.querySelector('#password').value;
    const passconf=document.querySelector('#conferma').value; 
    const segnconf=document.querySelector('#segnconf');
    if(password===passconf){
        segnconf.classList.add("hidden");
    }else{
        segnconf.classList.remove("hidden");
    }
}

const user=document.querySelector('#username');
user.addEventListener('blur', controllo);

const pass=document.querySelector('#password');
pass.addEventListener('blur', conpass);

const email=document.querySelector('#email');
email.addEventListener('blur', conema );

const conferma=document.querySelector('#conferma');
conferma.addEventListener('blur', confermapass);

