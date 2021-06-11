<html>
    <head>
        <title>Registrazione</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('css/login.css')}}" /> 
        <script src="{{url('js/signup.js')}}" defer></script>
        <script type="text/javascript">
            const REGISTER_ROUTE = "{{route('register')}}";
        </script>
    </head>
    <body>
        <form method="post">
            <h1>Registrazione</h1>
         
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
            
            <input type="text" id="username" placeholder="Username" name="username" maxlength="20" required>
            <p id='segnalazione' class='errore hidden'>"Username già in uso"</p>
           

            <input type="text" id="nome" placeholder="Nome" name="nome" maxlength="20" required>
            <input type="text" id="cognome" placeholder="Cognome" name="cognome" maxlength="20" required>
            <input type="text" id="email" placeholder="Email" name="email" maxlength="40" required>
            <p id='segnemail' class='errore hidden'>Email già esistente</p>
            <input type="password" id="password" placeholder="Password" name="password" maxlength="15" required>
            <p id='segnpass' class='errore hidden'>Password non conforme (min:6 caratteri, max:15 caratteri)</p>
          
            <input type="password" id="conferma" placeholder="Conferma Password" name="conferma" maxlenght="15" required>
            <p id="segnconf" class='errore hidden'>Password non coincidente </p>
            
            <button id="bottone" type="submit" name="register">Registrati</button>
            
                 @if($error)
                    <p class='errore'> Registrazione non effettuata! Errori di compilazione </p>
                @endif
            
        </form>
    </body>
</html>