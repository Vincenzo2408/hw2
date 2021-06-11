<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{ url("css/login.css") }}'/> 
    </head>
    <body>
        <section>
            <form method="post" name="nome_form">
                <h1>Login</h1>
                
                    @if($errore)
                        <p class='errore'> Username e/o Password errati </p>
                    @endif
                    
                <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <input type="text" id="username" placeholder="Username" name="username" required>
                <input type="password" id="password" placeholder="Password" name="password" required>
                <button type="submit" name="login">Accedi</button>
                <a href="{{route('register')}}">Registrati!</a>
            </form>
        </section> 

        <footer>
            <address>Città di Milano (IT), stazione della Wilford Industries con sede legale a Chicago</address>
            <p>Sito di immaginazione, ogni riferimento è puramente casuale</p>
            <p>Vincenzo Micieli O46002226</p>
        </footer>

    </body>
</html>