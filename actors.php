<?php 
require_once __DIR__.('/libraries/database.php');
$pageindex = 0;
if (isset($_GET['pageindex'])) {
    $pageindex = $_GET['pageindex'];
}
$offset = ($pageindex*20);
$pdo = getDatabase();
$sql = "SELECT
    `actor_id`,
    `first_name`,
    `last_name`
FROM
    `actor`
ORDER BY `actor_id` ASC
LIMIT :offset, 20";

// préparation de la req
$req = $pdo->prepare($sql);
$req->bindValue(':offset', $offset, PDO::PARAM_INT);
$req->execute();
$answers = $req->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__.'/inc/header.php' ?>
    <header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5"><a class="text-decoration-none text-white" href="index.php">Sakila</a></h1>
    </header>
    <div class="container mt-5 d-flex justify-content-between flex-wrap"> 
    <?php foreach($answers as $answer) { ?>
        <div class="card mt-4 overflow-hidden" style="width: 10rem;">
        <div class="card-body"><a class="text-decoration-none" href="actor.php?actor_id=<?= $answer['actor_id'] ?>">
            <h5 class="card-title"><?= $answer['first_name'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $answer['last_name']?></h6>   
            <p class="card-text display-4"><i class="text-danger fas fa-user-tie"></i></p>
        </a></div>
        </div>
    <?php }; ?> 
    </div>
    <div class="container-fluid d-flex my-3 justify-content-end">
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="actors.php?<?= 'pageindex='.($pageindex-1) ?>">Page précédente</a></button>
        <button type="button" class="btn btn-primary ml-2"><a class="text-decoration-none text-white" href="actors.php?<?= 'pageindex='.($pageindex+1) ?>">Page suivante</a></button>
    </div>
<?php  require_once __DIR__.'/inc/footer.php';