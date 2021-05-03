<?php 
require_once __DIR__.('/libraries/database.php');
$pageindex = 0;
if (isset($_GET['pageindex'])) {
    $pageindex = $_GET['pageindex'];
}
$offset = ($pageindex*20);
$pdo = getDatabase();
$sql = "SELECT
    `release_year`,
    `title` AS film,
    `description`
FROM
    `film`
ORDER BY `release_year` ASC
LIMIT :offset, 20";
// préparation de la req
$req = $pdo->prepare($sql);
$req->bindValue(':offset', $offset, PDO::PARAM_INT);
$req->execute();
$answers = $req->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__.'/inc/header.php'; ?>
    <header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5"><a class="text-decoration-none text-white" href="index.php">Sakila</a></h1>
    </header>
    <div class="container mt-5 d-flex justify-content-between flex-wrap"> 
    <?php foreach($answers as $answer) { ?>
        <div class="card mt-4 overflow-hidden" style="width: 15rem; height: 14rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $answer['film']?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $answer['release_year']?></h6>
            <p class="card-text"><?= $answer['description']?></p>    
        </div>
        </div>
    <?php }; ?> 
    </div>
    <div class="container-fluid d-flex my-3 justify-content-end">
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex-1) ?>">Page précédente</a></button>
        <button type="button" class="btn btn-primary ml-2"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex+1) ?>">Page suivante</a></button>
    </div>
<?php require_once __DIR__.'/inc/header.php'; ?>