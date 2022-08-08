<?php if (!isset($_SESSION['user'])) : ?>
    <?php if (!empty($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['erreur'];
            unset($_SESSION['erreur']); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-center text-uppercase text-primary mt-5 ">Connexion</h1>
    <div class="container">
        <form action="#" method="post" class="form-group"> <?= $form ?> </form>
    </div>
<?php else : ?>

    <h1 class="text-center text-uppercase text-primary mt-5"> mon profil : </h1>
    <div class="alert alert-success text-center " role="alert">
        Vous êtes connectée avec succès <?= $_SESSION['user']['firstname'] . '  ' .  $_SESSION['user']['lastname'] ?>
    </div>

<?php endif; ?>