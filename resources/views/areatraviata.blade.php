<html>
    <head>
    </head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Area Personale</title>
        <link rel="stylesheet" href="{{url('css/area_traviata.css')}}" /> 

        <script src="{{url('js/restituzione_api.js')}}" defer></script>
            <script type="text/javascript">
                const REGISTER_ROUTE = "{{route('traviata')}}";
            </script>
        
        
        
    </head> 
    <body>
        <header>
            <strong> LA SALA DI ATTESA </strong>
            <nav>
                <div id="collegamenti">
                <p><a class='bottone' href="{{route('tratta')}}"> Consulta Tratte </a></p> 
                <p><a class='bottone' href="{{route('home')}}"> Torna alla Home </a></p>
                <p><a class='bottone' href="{{route('area_personale')}}">   Area personale! </a></p>
                <p><a class='bottone' href="{{route('logout')}}">  Effettua Logout </a></p>
                
                </div>
            </nav>
        </header> 

        <section id="area_conservatorio">
            <div id="immagini">
            <img src="https://tophat.blog/wp-content/uploads/2018/07/conservatorio-di-Milano-logo.png">
            <img src="data:image/png;base64,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">
            </div>
            <div>
            <h1>LA TRAVIATA</h1>
            <p>La stazione di Milano, insieme al Conservatorio <em>"Giuseppe Verdi"</em>, è lieta di presentare la sala d'attesa esclusiva ai membri registrati <em>"La Traviata"</em>. Qui le persone registrate avranno modo di ascoltare 
                esclusivi album di musica classica grazie alle casse stereo montate nella stanza e leggere numerosi libri di carattere musicale.
            </p>
            <form id='musica'>
                <!--Credenziali recapitabili dal sito:<a href="https://developer.spotify.com/dashboard/applications/3682fe4c8799452baa29f5a5e0fdc871">Qui</a><br>-->
                Elenco Album musicali ascoltabili in sala con protagonista:
                <select name = 'tipo' id='cerca'>
                    <option value='Beethoven'>Beethoven</option>
                    <option value='Mozart'>Mozart</option>
                    <option value='Chopin'>Chopin</option>
                    <option value='Rachmaninov'>Rachmaninov</option>
                    <option value='J.S.Bach'>J.S.Bach</option>
                    <option value='Vivaldi'>Vivaldi</option>
                </select>
                <input type='submit' id='submit' value='Cerca'>
            </form>
            <div id="sezione_musica">
            </div>
            <form id='libri'>
                Elenco dei Libri consultabili in sala con tema:
                <select name = 'tipo' id='cerca'>
                    <option value='Solfeggio'>Solfeggio</option>
                    <option value='Sanremo'>Sanremo</option>
                    <option value='Percussioni'>Percussioni</option>
                    <option value='Acustica'>Acustica</option>
                    <option value='Psicoacustica'>Psicoacustica</option>
                    <option value='Conservatorio'>Conservatorio</option>
                </select>
                <input type='submit' id='submit' value='Cerca'> 
            </form>
            <div id="sezione_libri">
            </div>
            <div id="preferiti" class="hidden">
                <p id="music"></p>
                <p id="libro"></p>
            </div>
        </section>

        <footer>
            <address>Città di Milano (IT), stazione della Wilford Industries con sede legale a Chicago</address>
            <p>Sito di immaginazione, ogni riferimento è puramente casuale</p>
            <p>Vincenzo Micieli O46002226</p>
        </footer>

    </body>   
</html>