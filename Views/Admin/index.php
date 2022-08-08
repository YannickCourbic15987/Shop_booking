<div class="row">




    <div class="col-2 bg-primary vh-100">
        <div class="mw-100 h-auto ">
            <div class="profil">

                <h3 class="text-center text-uppercase text-white pt-2"> <i class="fa-solid fa-user-lock "></i>
                    <?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?>
                    <hr>
                </h3>
                <h5 class="text-center text-uppercase text-white ">
                    <i class="fa-solid fa-book"></i>
                    <a href="adminBook" class="text-white text-decoration-none">Livres</a>
                    <hr>
                </h5>
                <h5 class="text-center text-uppercase text-white ">
                    <i class="fa-solid fa-users"></i>
                    <a href="admin" class="text-white text-decoration-none">Users</a>
                    <hr>
                </h5>
                <h5 class="text-center text-uppercase text-white ">
                    <i class="fa-solid fa-tag"></i>
                    <a href="categorie" class="text-white text-decoration-none">Categories</a>
                    <hr>
                </h5>


            </div>

        </div>

    </div>

    <div class="col-10 vh-100 ">

        <table class="table">
            <thead class="table table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">created_at</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td>
                            <?= $user->id_user ?>
                        </td>
                        <td>
                            <?= $user->firstname ?>
                        </td>
                        <td>
                            <?= $user->lastname ?>
                        </td>
                        <td>
                            <?= $user->email ?>
                        </td>

                        <td>
                            <?= $user->role ?>
                        </td>
                        <td>
                            <?= $user->created_at ?>
                        </td>
                        <td>
                            <form action="#" method="post">
                                <button class="btn btn-white" type="submit" name="remove">
                                    <i class="fa-solid fa-xmark text-danger"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="#" method="post">
                                <button class="btn btn-white" type="submit" name="edit">
                                    <i class="fa-solid fa-pen-to-square text-warning"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="#" method="post">
                                <button class="btn btn-none" type="submit" name="plus">
                                    <i class="fa-solid fa-plus text-success"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>