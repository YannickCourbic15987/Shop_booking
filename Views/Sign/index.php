<?php if (!isset($_SESSION['user'])) : ?>
    <h1 class="text-center text-uppercase text-primary mt-5 ">Connexion</h1>
    <div class="container">
        <form action="#" method="post" class="form-group"> <?= $form ?> </form>
    </div>
<?php else : ?>
    <h1 class="text-center text-uppercase text-primary mt-5"> mon profil : </h1>

<?php endif; ?>