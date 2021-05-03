<?php require_once __DIR__.'/inc/header.php'; ?>
    <header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5">Sakila</h1>
    </header>
    <div class="container mt-5">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="card mb-4" style="width: 18rem;"><a href="films.php" class="card-link">
                <div class="card-body films-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-white h1 font-weight-bold">Films</h5>
                </div>
            </a></div>
            <div class="card mb-4" style="width: 18rem;"><a href="actors.php" class="card-link">
                <div class="card-body actors-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-white h1 font-weight-bold">Acteurs</h5>
                </div>
            </a></div>
            <div class="card mb-4" style="width: 18rem;"><a href="shops.php" class="card-link">
                <div class="card-body shops-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-white h1 font-weight-bold">Magasins</h5>
                </div>
            </a></div>
            <div class="card mb-4" style="width: 18rem;"><a href="#" class="card-link">
                <div class="card-body categories-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-white h1 font-weight-bold">Catégories</h5>
                </div>
            </a></div>
            <div class="card mb-4" style="width: 18rem;"><a href="#" class="card-link">
                <div class="card-body searchbyact-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-center text-white h1 font-weight-bold">Recherche par acteur</h5>
                </div>
            </a></div>
            <div class="card mb-4" style="width: 18rem;"><a href="business.php" class="card-link">
                <div class="card-body sales-card bg-image d-flex align-items-center justify-content-center">
                    <h5 class="card-title text-center text-white h1 font-weight-bold">Chiffre d'affaires</h5>
                </div>
            </a></div>
        </div>
    </div>
<?php require_once __DIR__.'/inc/footer.php';