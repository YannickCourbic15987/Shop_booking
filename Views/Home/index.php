<?php if (!empty($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger mt-5" role="alert">
        <?php echo $_SESSION['erreur'];
        unset($_SESSION['erreur']); ?>
    </div>
<?php endif; ?>

<h1> Page d'acceuil </h1>