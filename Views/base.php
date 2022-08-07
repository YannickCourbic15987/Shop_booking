<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2bb89bf154.js" crossorigin="anonymous"></script>
    <title>ShopBooking -- Home</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">ShopBooking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['email'])) : ?>
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="book">Livres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="users">
                                <i class="fa-solid fa-circle text-success"></i>
                                Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="logout">Déconnexion</a>
                        </li>

                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="register" class="nav-link active">Inscription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="book">Livres</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="sign">
                                <i class="fa-solid fa-circle text-danger mr-2"></i>
                                Se Connecter</a>
                        </li>

                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>
    <div class="container">
        <?= $contains ?>
    </div>
    <footer class="py-2 bg-dark fixed-bottom">
        <div class="container">
            <p class="m-0 text-center text-white">YannickIndustry &copy;</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>