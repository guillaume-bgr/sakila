<?php
include_once __DIR__.('/libraries/database.php');
$pdo = getDatabase();
$sql = "SELECT
    SUM(amount) AS `chiffreaffaires`,
    `store_id`
FROM
    `staff`
INNER JOIN `payment` ON `staff`.`staff_id`=`payment`.`staff_id`
GROUP BY store_id";

$sql = "SELECT
    COUNT(inventory_id) as stock,
    inventory.store_id
FROM
    `inventory`
INNER JOIN `store` ON `store`.`store_id`=`inventory`.`store_id`
GROUP BY store_id";
// préparation de la req
$req = $pdo->query($sql);
$answers = $req->fetchAll(PDO::FETCH_ASSOC);


require_once __DIR__.('/inc/header.php'); ?>
<header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5"><a class="text-decoration-none text-white" href="index.php">Sakila</a></h1>
    </header>
    <div class="container mt-5 d-flex justify-content-between flex-wrap"> 
    <?php foreach($answers as $answer) { ?>
        <div class="card mt-4 overflow-hidden" style="width: 15rem; height: 14rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $answer['store_id']?></h5>
            <h6 class="card-subtitle mb-2"><?= $answer['stock']?> Films disponibles à la location</h6>    
        </div>
        </div>
    <?php }; ?> 
    </div>
    <div class="container-fluid d-flex my-3 justify-content-end">
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex-1) ?>">Page précédente</a></button>
        <button type="button" class="btn btn-primary ml-2"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex+1) ?>">Page suivante</a></button>
    </div>
<?php require_once __DIR__.('/inc/footer.php');