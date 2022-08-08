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

        <form action="adminAddBook" method="post" enctype="multipart/form-data">
            <label for="title" class="form-label">
                Titre du livre
            </label>
            <input type="text" name="title" id="title" class="form-control">
            <label for="description" class="form-label">
                Description
            </label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            <label for="picture" class="form-label">
                Illustration
            </label>
            <input type="file" name="picture" id="picture" class="form-control">
            <label for="price" class="form-label">
                Prix
            </label>
            <input type="number" name="price" id="price" class="form-control">
            <label for="date" class="form-label">
                Release Date
            </label>
            <input type="text" name="date" id="date" class="form-control">
            <button type="submit" class="btn btn-primary mt-3">
                valider
            </button>

        </form>
    </div>
</div>