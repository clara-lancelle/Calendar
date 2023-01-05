<?php
if (count($_POST) !== 0) {
    include 'ttt.php';
    $return = validation($_POST);
    if (count($return) === 0) {
        $valid = true;
        $calendar = getCalendar($_POST);
        $arrayDays = $calendar['arrayDays'];
        $firstDayOfMonth = $calendar['firstDayOfMonth'];
        $lastDayOfMonth = $calendar['lastDayOfMonth'];
        $lastDayInt = $calendar['lastDayInt'];
        $start = $calendar['start'];
        $numDays = $calendar['numDays'];
        $firstDayInt = $calendar['firstDayInt'];
        $startNextMonth = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>TD_Dates</title>
</head>

<body>
    <main>
        <h1> Génerateur de calendrier </h1>
        <section>
            <h2>
                <?=@$calendar['date']; ?>
            </h2>
            <div class="calendar">
                <div class="days">
                    <?php if (isset($valid) && $valid === true) {

                        foreach ($arrayDays as $day) { ?>

                            <div class="day_name">
                                <?=@$day ?>
                            </div>

                        <?php } ?>

                        <?php
                        $test = $start - $firstDayInt + 2;
                        for ($i = $firstDayInt; $i > 1; $i--) { ?>

                            <div class="day_num first_days disable">
                                <?=@$test++; ?>
                            </div>

                        <?php }
                        for ($i = 1; $i <= $numDays; $i++) { ?>
                            <div class="day_num">
                                <?=@$i ?>
                            </div>
                        <?php }
                        for ($i = 1; $i <= (count($arrayDays) - $lastDayInt); $i++) { ?>
                            <div class="day_num last_days disable">
                                <?=@$i ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </section>
        <section class="form">
            <form action="#" method="post">
                <legend> Quel mois de quelle année souhaitez-vous afficher ?</legend>

                <label for="month"> Mois </label>
                <input type="number" name="month" id="month" min="1" max="12">
                <p class="error">
                    <?=@$return['month']; ?>
                </p>

                <label for="year"> Année </label>
                <input type="number" name="year" id="year" min="1900" max="2024">
                <p class="error">
                    <?=@$return['year']; ?>
                </p>
                <button type="submit" class="calendarBtn"> Générer le calendrier </button>
            </form>
        </section>
    </main>
    <footer>
        <p class="copy"> &copy; Lancelle Clara 2023 </p>
    </footer>
</body>

</html>