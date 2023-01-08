
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Calendar : un générateur de calendrier PHP réalisé entièrement par Clara Lancelle avec le modèle MVC : Model View Controller">
    <link rel="shortcut icon" href="assets/img/logo_lancelle_clara.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title> Calendar </title>
</head>

<body>
    <main>
        <header>
            <div class="brand">
                <img src="../../assets/img/logo_lancelle_clara.png" alt="Logo &copy; Lancelle Clara" class="logo">
            </div>
            <h1> Génerateur de calendrier </h1>
        </header>
        <section>
            <div class="calendar">
            <h2>
                <?=@$calendarData['date']; ?>
            </h2>
                <div class="days">
                    <?php if (isset($errors) && count($errors) === 0 && isset($calendarData) && count($calendarData) > 0 ) {
                        foreach ($calendarData['arrayDays'] as $day) { ?>
                            <div class="day_name">
                                <?=$day ?>
                            </div>
                        <?php } ?>

                        <?php
                        $test = $calendarData['start'] - $calendarData['firstDayInt'] + 2;
                        for ($i = $calendarData['firstDayInt']; $i > 1; $i--) { ?>

                            <div class="day_num first_days disable">
                                <?=$test++; ?>
                            </div>

                        <?php }
                        for ($i = 1; $i <= $calendarData['numDays']; $i++) { ?>
                            <div class="day_num">
                                <?=$i ?>
                            </div>
                        <?php }
                        for ($i = 1; $i <= (count($calendarData['arrayDays']) - $calendarData['lastDayInt']); $i++) { ?>
                            <div class="day_num last_days disable">
                                <?=$i ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </section>
        <section class="form">
            <form action="#" method="post">
                <legend><h3> Quel mois de quelle année souhaitez-vous afficher ?</h3></legend>

                <label for="month"> Mois (01 - 12) </label>
                <input type="number" name="month" id="month" min="1" max="12">
                <p class="error">
                    <?=@$return['errors']['month']; ?>
                </p>

                <label for="year"> Année </label>
                <input type="number" name="year" id="year" min="1900" max="2024">
                <p class="error">
                    <?=@$return['errors']['year']; ?>
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