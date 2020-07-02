<?php if($match){ ?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Mon site' ?> </title>
    <link rel="stylesheet" href="/bootstrap-v4/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custumise.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/profil.css">
</head>
<body class="d-flex flex-column h-100">
    <div class="container-bg">
        <div class="container-mask maskor">
            <header class="maskor-sup">
                <nav class="navor">
                    <ul>
                        <li>
                            <a href="<?php if(isset($match) && $match['name'] == 'Home'){echo "#";}else{echo $router->urlPut('Home');} ?> " class="hover <?php if(isset($match) && $match['name'] == 'Home'){ echo "active";}?> " class="active">Home</a>
                        </li>
                        <li>
                            <a href="<?php if(isset($match) && $match['name'] == 'Main'){echo "#";}else{echo $router->urlPut('Main');}  ?>" class="hover <?php if(isset($match) && ($match['name'] == 'Main' || preg_match('/\publicMenu/', $match['target']) > 0 )){ echo "active";}?> " class="hover">Menu</a>
                        </li>
                        <li>
                            <a href="#" class="hover">Forum</a>
                        </li>
                        <li>
                            <a href="<?php if(isset($match) && $match['name'] == 'Admin'){echo "#";}else{echo $router->urlPut('Admin');}  ?>" class="hover <?php if(isset($match) && ($match['name'] == 'Admin' || preg_match('/\/admin/', $match['target']) > 0 || preg_match('/\/ecole/', $match['target']) > 0) ){ echo "active";}?> ">Admin</a>
                        </li>
                        <li>
                            <a href="#" class="hover">Contacts</a>
                        </li>
                    </ul>
                </nav>
                <div class="premiumer">
                    <a href="#" class="hover">Devenir Premium</a>
                </div>
                <div class="login">
                    <a href="#">Login/Register</a>
                </div>
            </header>
            <div class="container">
                <div class="container-contents">
                    <h2>
                        <?php if(isset($namePage)) {echo $namePage;}else{echo '';} ?>
                    </h2>
                    <?php 
                        echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-auto p-0">
    <div id="footer-maskor" class="px-3 py-2 m-0">
        <div class="d-flex m-0 p-0 w-100">
            <div class="footer-left w-50 px-3 py-0">
                <div class="m-0 p-0">
                    <h5>Complexe Scolaire Bilingue</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aspernatur, perferendis adipisci eligendi ea voluptatem dolores distinctio, earum officiis ab, excepturi enim necessitatibus alias amet natus iusto ipsum illo quasi!
                    </p>
                </div>
                <div class="mt-2 p-0">
                    <h5>Faites nous connaitre vos remarques concernant le site</h5>
                    <form action="" class="form-group w-75">
                        <label for="email" class="mb-0">Votre E-mail</label>
                        <input type="email" placeholder="Votre adresse mail" id="email" name="email" class="p-1 form-control">

                        <label for="comment" class="mb-0 mt-1">Votre Remarque</label>
                        <textarea name="comment" id="comment" cols="10" class="form-control p-1 d-inline-block"></textarea>
                        <button type="submit" class="btn btn-secondary d-inline-block float-right mt-1 w-25">Envoyez</button>
                    </form>
                </div>
            </div>
            <div class="footer-center w-33 px-3">
                <div class="c-header m-0 p-0 h-75">
                    <h5>Mes derniers tweets</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos recusandae, officia sunt itaque molestias id eius modi quod iusto eaque, ducimus obcaecati suscipit facilis totam, minus asperiores voluptatum! Doloribus, error.
                    </p>
                </div>
                <div class="c-footer m-0 p-0">
                    <h5>Me suivre</h5>
                    <nav class="m-0 p-0 w-100">
                        <a href="#" class="facebook"></a>
                        <a href="#" class="twitter"></a>
                        <a href="#" class="instagram"></a>
                        <a href="#" class="youtube"></a>
                        <a href="#" class="gmail"></a>
                    </nav>
                </div>
            </div>
            <div class="footer-right">
                <h5>Nous contacter Par</h5>
                <ul>
                    <li>
                        <a href="#">
                            <img src="/media/icons/mail2.png" alt="" width="18" class="mr-2">
                            E-mail
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/media/icons/group.png" alt="" width="18" class="mr-2">
                            Tchat
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/media/icons/whatsApp.png" alt="" width="18" class="mr-2">
                            Whats'App
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/media/icons/messenger.png" alt="" width="18" class="mr-2">
                            Messenger
                        </a>
                    </li>
                     
                </ul>
                <div class="other">
                    <h5 class="mt-4">Divers</h5>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="/media/icons/calendar-clock.png" alt="" width="18" class="mr-2">
                                Obtenir un entretien
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/about1.png" alt="" width="18" class="mr-2">
                                A propos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/security.png" alt="" width="18" class="mr-2">
                                Politique de confidentialités
                            </a>
                        </li>
                    </ul>
                    <span class="m-0 p-0 logo d-inline-block float-right">
                        <img src="/media/logo/logoBlack2Sans.png" alt="" width="150" class="float-right">
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

<script type="text/javascript" src="/js/query.js"></script> 
<script>
    var input = document.querySelector('#Themark')
    var annuler = document.querySelector('.annuler')
    var overlay = document.getElementById('overlay')
    var marks = document.querySelectorAll('tbody td')
    var btn = document.querySelector('.btn-send')

    for (var i = 2; i < 10; i++) {  
        mark = marks[i]
        mark.addEventListener('dblclick', function(){
            var note = this
            overlay.style.display = 'block'
            document.getElementById('edited').addEventListener('submit', function(e){

                e.preventDefault()

                var data = new FormData(this)
                var xhr = new XMLHttpRequest()

                xhr.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200) {
                    }
                }
                 xhr.open("POST", "/editor.php", true)
                 xhr.responseType = "json"
                 xhr.send()
                return false
                
            })
        })
    }
    annuler.addEventListener('click', function(){
        overlay.style.display = 'none'
    })
    
        
</script>

<?php }elseif($match == null){ require_once "default_404.php";} // On inclure ici la page par defaut 404?>
</html>
