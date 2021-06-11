<html>
    <head>
    </head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Area Personale</title>
        <link rel="stylesheet" href="{{url('css/area_personale.css')}}" /> 

        <script src="{{url('js/cabine.js')}}" defer></script>
        <script src="{{url('js/caricamento_preferito.js')}}" defer></script>
        <script src="{{url('js/procedure.js')}}" defer></script>
       
        
        <script type="text/javascript">
            const REGISTER_ROUTE = "{{route('area_personale')}}";
        </script>
        
        
        
    </head> 
    <body>
        <header>
            <strong> BENVENUTO/A {{$user_id}} ! </strong> <!-- $user_id contiene l'username passato tramite with -->
            <nav>
                <div id="collegamenti">
                <p><a class='bottone' href="{{route('tratta')}}"> Consulta Tratte </a></p> 
                <p><a class='bottone' href="{{route('home')}}"> Torna alla Home </a></p>
                <p><a class='bottone' href="{{route('traviata')}}"> La sala di attesa</a></p>
                <p><a class='bottone' href="{{route('logout')}}">  Effettua Logout </a></p>
                
                </div>
            </nav>
        </header> 
        <section>
    
            <div id="centro">
                <h2> Aiutaci a capire i tuoi gusti per costruire treni migliori. <br> <em>Vota la tua cabina preferita </em> </h2>
                <form method="post" name="nome_form" id="forms">
                     <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                     <input type="text" id="codice_carrozza" placeholder="Numero carrozza" name="codice_carrozza" required>
                     <button type="submit" id="submit" name="login"> Vota </button>
                </form>
                <div id="flexiamo">
                    <div id="riga">
                    </div>

                    <div id="tabella">
                    </div>
                </div>

               

                <div id="descrizione"> 
                </div>

              

            </div> 
            <div id="storia">
                    <p> La stazione di Milano Centrale è la principale stazione ferroviaria del capoluogo lombardo, la seconda d'Italia per flusso di passeggeri dopo Roma Termini e prima di Torino Porta 
                    Nuova, nonché una delle principali stazioni ferroviarie d'Europa. </p>
                    <img src="http://mi4345.it/wp-content/uploads/2015/02/10_stazione-di-milano-centrale.jpg" />
                    <p>Fu inaugurata nel 1931 su progetto dell'architetto Ulisse Stacchini in sostituzione della precedente stazione centrale del 1864 che sorgeva nell'attuale 
                    piazza della Repubblica e che era divenuta insufficiente ad assorbire l'aumento del traffico ferroviario.</p>
                    <img src="https://shop.fondazionefs.it/pub/media/catalog/product/cache/ced0e420ef80fb289c61f5c142b50ee5/f/s/fs020new.jpg"/>
                    <p> La gestione degli impianti è affidata a Rete Ferroviaria Italiana (RFI) 
                    società del gruppo Ferrovie dello Stato, che classifica la stazione nella categoria "Platinum", mentre quella delle aree commerciali del monumentale fabbricato viaggiatori è 
                    di competenza di Grandi Stazioni. Nel novembre 2010 lo scalo è stato intitolato a santa Francesca Saverio Cabrini (1850-1917), fondatrice della congregazione delle Missionarie 
                    del Sacro Cuore di Gesù. </p>
                </div>
        </section> 
             
        <section id="procedure">
                <h2>  Noi ascoltiamo i pareri dei nostri utenti. <br> <em> Scegli uno dei treni della nostra stazione e scopri quale carrozza monta! </em> </h2>
                <form method="post" name="nome_form2" id="forms2">
                    <label>Seleziona treno <select name="treno" id="treno"><option value="null"></option> 
                        @foreach($treni as $treno) <!--Al caricamento faccio ritornare with dei Treni, con il ciclo for li visualizzo tutti-->
                            <option value='{{$treno["ID"]}}'>{{$treno["Agenzia"]}} - {{$treno["Modello"]}}</option>
                        @endforeach
                    </select>
                    </label>
                    <button type="submit" id="cerca">Cerca </button>
                </form>
                <div id="risposta">
                </div>
            </section>

        <footer>
            <address>Città di Milano (IT), stazione della Wilford Industries con sede legale a Chicago</address>
            <p>Sito di immaginazione, ogni riferimento è puramente casuale</p>
            <p>Vincenzo Micieli O46002226</p>
        </footer>

    </body>   
</html>