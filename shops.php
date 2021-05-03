<?php 
require_once __DIR__.('/libraries/database.php');
$pageindex = 0;
if (isset($_GET['pageindex'])) {
    $pageindex = $_GET['pageindex'];
}
$offset = ($pageindex*20);
$pdo = getDatabase();
$sql = "SELECT
    `manager_staff_id`,
    `address`,
    `first_name`,
    `last_name`,
    `email`
FROM
    `store`
INNER JOIN `address` ON `store`.`address_id` = `address`.`address_id`
INNER JOIN `staff` ON `store`.`store_id` = `staff`.`store_id`";
// préparation de la req
$req = $pdo->query($sql);
$answers = $req->fetchAll(PDO::FETCH_ASSOC);
require_once __DIR__.'/inc/header.php'; 
?>

    <header class="bg-image header d-flex align-items-center">
        <h1 class="display-3 text-white ml-5"><a class="text-decoration-none text-white" href="index.php">Sakila</a></h1>
    </header>
    <div class="container mt-5 d-flex justify-content-between flex-wrap"> 
    <?php foreach($answers as $answer) { ?>
        <div class="card mt-4 overflow-hidden" style="width: 15rem; height: 14rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $answer['address']?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Manager : <?= $answer['first_name']?></h6>
            <p class="card-text">Email : <?= $answer['email']?></p>    
        </div>
        </div>
    <?php }; ?> 
    </div>
    <div class="container-fluid d-flex my-3 justify-content-end">
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex-1) ?>">Page précédente</a></button>
        <button type="button" class="btn btn-primary ml-2"><a class="text-decoration-none text-white" href="films.php?<?= 'pageindex='.($pageindex+1) ?>">Page suivante</a></button>
    </div>
<?php require_once __DIR__.'/inc/header.php'; 