<?php 
require_once __DIR__.('/libraries/database.php');
$pdo = getDatabase();
$sql = "SELECT `actor`.`actor_id`, `first_name`, `last_name`, `title`, `description`, `release_year`
        FROM `actor` 
        INNER JOIN `film_actor` ON `actor`.`actor_id` = `film_actor`.`actor_id`
        INNER JOIN `film` ON `film_actor`.`film_id` = `film`.`film_id`
        WHERE `actor`.`actor_id` = :id ";

// préparation de la req
$req = $pdo->prepare($sql);
$req->bindValue(':id', $_GET['actor_id'], PDO::PARAM_INT);
$req->execute();
$answers = $req->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__.'/inc/header.php'; ?>
    <header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5"><a class="text-decoration-none text-white" href="index.php">Sakila</a></h1>
    </header>
    <div class="container mt-5 d-flex justify-content-between flex-wrap"> 
        <div class="card mt-4 overflow-hidden" style="width: 70%">
        <div class="card-body">
            <h5 class="card-title"><?= $answers[0]['first_name'] ?><i class="ml-3 fas fa-user-tie"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $answers[0]['last_name']?></h6>   
            <div>
                <p class="card-text h2">Films</p> 
            </div>
            
        </div> 
        <?php foreach($answers as $answer) { ?>
        <div class="ml-3">
            <p class="h4"><?= $answer['title'] ?></p>
            <p class="h5 text-muted"><?= $answer['release_year'] ?></p>
            <p class="h5"><?= $answer['description']?></p>
        </div>
        <?php }; ?>
        </div>
    <div class="container-fluid d-flex my-3 justify-content-end">
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="actors.php?<?= 'pageindex='.($pageindex-1) ?>">Page précédente</a></button>
        <button type="button" class="btn btn-primary ml-2"><a class="text-decoration-none text-white" href="actors.php?<?= 'pageindex='.($pageindex+1) ?>">Page suivante</a></button>
    </div>
<?php require_once __DIR__.'/inc/footer.php';