<?php

$calculationMode = $_POST['calculation-mode'] ?? 'area';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radius = $_POST['radius'] ?? 0;
    $calculationMode = $_POST['calculation-mode'] ?? 'area';

    if ($calculationMode === 'area') {
        $area = pi() * pow($radius, 2);
    } elseif ($calculationMode === 'perimeter') {
        $circumference = 2 * pi() * $radius;
    }
}
?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Geometrie-Rechner</title>
</head>

<body>
    <div class="shape-view">
        <div class="shape-section">
            <img src="img/circle-image.webp" />
            <label id="formula-label"><?php echo $calculationMode === 'area' ? 'Flächeninhalt: A = π * r²' : 'Umfang: C = 2 * π * r'; ?></label>
        </div>
        <form action="index.php" method="POST">
            <div class="input-container">
                <div class="shape-input-container">
                    <div class="shape-input">
                        <label for="radius">r</label>
                        <input type="number" id="radius" name="radius" value="<?php echo $radius ?? 0; ?>">
                    </div>
                    <div class="shape-input area">
                        <label for="area">A</label>
                        <input type="number" id="area" name="area" value="<?php echo $area ?? ''; ?>" readonly>
                    </div>
                    <div class="shape-input perimeter">
                        <label for="circumference">C</label>
                        <input type="number" id="circumference" name="circumference" value="<?php echo $circumference ?? ""; ?>" readonly>
                    </div>
                </div>

                <div class="calculation-mode-container">
                    <div class="calculation-mode-item">
                        <input type="radio" id="area" name="calculation-mode" value="area" <?php echo $calculationMode === 'area' ? 'checked' : ''; ?>>
                        <label for="area">Flächeninhalt</label>
                    </div>
                    <div class="calculation-mode-item">
                        <input type="radio" id="perimeter" name="calculation-mode" value="perimeter" <?php echo $calculationMode === 'perimeter' ? 'checked' : ''; ?>>
                        <label for="perimeter">Umfang</label>
                    </div>
                </div>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn-calculate" id="calculate">Berechnen</button>
            </div>
            <input type="hidden" name="shape" value="circle"> <!-- Ausgewählte Form mit an index.php senden -->
        </form>
    </div>
</body>

</html>