<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Calendar : un calendrier PHP réalisé par Clara Lancelle avec le modèle MVC">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PILS - Error 404</title>
</head>

<body class="small">
    <?php include(__DIR__ . '/../includes/header.php'); ?>
    <main class="grid grid--center">
        <h1> OUPS.. C'est une impasse. </h1>
        <a class="backBtn" href="javascript:history.go(-1)" title="retour à la page précédente"> 
           <img class="return" src="../../assets/img/return.png" alt="retour"> Page précédente </a>
        <img src="../../assets/img/Monster_404_Error.gif" alt="erreur 404" class="monsterError">
    </main>
    <?php include(__DIR__ . '/../includes/footer.php'); ?>
    <?php include(__DIR__ . '/../includes/phoneNav.php'); ?>
</body>

</html>