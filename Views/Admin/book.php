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
                    <th scope="col">title</th>
                    <th scope="col">description</th>
                    <th scope="col">picture</th>
                    <th scope="col">price</th>
                    <th scope="col">release_date</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td>
                            <?= $book->id_book ?>
                        </td>
                        <td>
                            <?= $book->title ?>
                        </td>
                        <td>
                            <?= $book->description ?>
                        </td>
                        <td>
                            <?= $book->picture ?>
                        </td>

                        <td>
                            <?= $book->price ?> €
                        </td>
                        <td>
                            <?= $book->release_date ?>
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

                            <button class="btn btn-none">

                                <a href="adminAddBook"> <i class="fa-solid fa-plus text-success"></i></a>
                            </button>

                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>