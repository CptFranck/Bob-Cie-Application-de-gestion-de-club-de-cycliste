<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projet</title>

        <!-- Meta tags -->
        
        <meta name="author" content="François CAILLET">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS Styles -->       

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
            integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/ajax.js" defer></script>
        <script src="js/requete.js" defer></script>

        <style>
            html {height: 100%;}
            body {
            min-height: 100%;
            margin: 0;
            padding: 0;}
            body {position: relative;}
            footer {position: absolute; bottom: 0;}
            body {position: relative;}
            footer {position: absolute; bottom: 0; left: 0; right: 0}
        </style>

    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" ><strong>Bob & Cie</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Coureurs.html">Coureurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Courses.html">Courses</a>
                        </li>
                    </ul>
                    <div style="display : none">
                        <i class="fa fa-fw fa-user"></i>
                        <div id="user">
                        </div>
                    </div>
                </div>
                
            </nav>
        </header>

        <?php 
        
        /*include_once(database.php);

        $nom_utilisateur = filter_var($_POST["nom_utilisateur"],FILTER_SANITIZE_STRING);
        $prenom_utilisateur = filter_var($_POST["prenom_utilisateur"],FILTER_SANITIZE_STRING);
        $password_utilisateur = filter_var($_POST["password_utilisateur"],FILTER_SANITIZE_STRING);
        
        $data = dbRequestUser($db);

        for($i = 0; $i < $data; $i++){
            if($data[$i]['nom'] ==  $nom_utilisateur){
                if($data[$i]['prenom'] == $prenom_utilisateur){
                    if($data[$i]['password'] == $password_utilisateur){
                        $mot_de_pass_confrome = true;
                }
            }
        }

        if ($mot_de_pass_confrome == true){

        }
        */
        ?>

        <div class="py-5 text-center">
        </div>

        <footer class="page-footer font-small bg-light">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="mention_legal.html"> Bob&Cie.com</a>
            </div>
            <!-- Copyright -->

        </footer>
    </body>
</html>