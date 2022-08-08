<h1 class="text-center text-uppercase text-primary mt-5 ">Inscription</h1>
<div class="container">

    <?php if (isset($_SESSION['register'])) : ?>
        <div class="alert alert-success" role="alert">
            Vous avez enregistré votre inscription avec succès , veuillez vous <a href="sign">connectez </a>
        </div>
    <?php endif; ?>
    <form action="#" method="post" class="form-group"> <?= $form ?> </form>

    <a href="sign"> Déjà inscrit ? Connectez-vous</a>

</div>