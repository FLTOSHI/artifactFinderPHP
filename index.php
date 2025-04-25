<?php
$locations = include 'locations.php';
$detectors = include 'detectors.php';
$artifacts = include 'artifacts.php';
$anomalies = include 'anomalies.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Искалка артефактов</title>
</head>
<body>
<h1>Добро пожаловать.</h1>
<p>Введи информацию о сталкере и скажу, чё он нашел.</p>
<form action="process.php" method="post">
    <label for="name">Имя персонажа:</label>
    <input type="text" placeholder="Иван Иванов" id="name" name="name" required pattern="^[^\d]+$" title="Имя не должно содержать цифр"><br>

    <label for="name">Характеристика «Интеллект»:</label>
    <input type="number" min="2" max="8" placeholder="8" id="intelligence" name="intelligence" required><br>

    <label for="name">Навык «Артефакты»:</label>
    <input type="number" min="0" max="13" placeholder="13" id="artefacts" name="artefacts" required><br>

    <label for="name">Навык «Аномалии»:</label>
    <input type="number" min="0" max="13" placeholder="13" id="anomalies" name="anomalies" required><br>

    <label for="anomaly">Аномалия:</label>
    <select id="anomaly" name="anomaly">
        <?php foreach ($anomalies as $type => $list): ?>
            <optgroup label="<?= htmlspecialchars($type) ?>">
                <?php foreach ($list as $anomaly): ?>
                    <option value="<?= htmlspecialchars($anomaly) ?>">
                        <?= htmlspecialchars($anomaly) ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    </select><br>

    <label for="detector">Детектор:</label>
    <select id="detector" name="detector" required>
        <?php foreach ($detectors as $name => $data): ?>
            <option value="<?= htmlspecialchars($name) ?>"
                    data-tiers="<?= htmlspecialchars(implode(',', $data['tiers'])) ?>">
                <?= htmlspecialchars($name) ?> (<?= htmlspecialchars($data['description']) ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="location">Локация:</label>
    <select id="location" name="location" required>
        <option value="" disabled selected>Выберите локацию</option>

        <?php foreach ($locations as $tier => $loc_list): ?>
            <optgroup label="Тир <?= substr($tier, -1) ?>">
                <?php foreach ($loc_list as $location): ?>
                    <option value="<?= htmlspecialchars($location) ?>">
                        <?= htmlspecialchars($location) ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    </select><br>

    <br><br>
    <button type="submit">Начать</button>
    <button type="reset">Сбросить</button>
</form>
</body>
</html>