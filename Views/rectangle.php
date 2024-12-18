<?php

$calculationMode = $_POST['calculation-mode'] ?? 'area';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sideA = $_POST['side-a'] ?? 0;
    $sideB = $_POST['side-b'] ?? 0;

    $area = $_POST['area'] ?? 0;
    $perimeter = $_POST['perimeter'] ?? 0;
    $calculationMode = $_POST['calculation-mode'] ?? 'area';

    if ($calculationMode === 'area') {
        $area = $sideA * $sideB;
    } elseif ($calculationMode === 'perimeter') {
        $perimeter = 2 * ($sideA + $sideB);
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
            <img src="img/rectangle-image.webp" />
            <label id="formula-label"><?php echo $calculationMode === 'area' ? 'Flächeninhalt: A = a * b' : 'Umfang: U = 2 * (a + b)'; ?></label>
        </div>
        <form action="index.php" method="POST">
            <div class="input-container">
                <div class="shape-input-container">
                    <div class="shape-input">
                        <label for="side-a">a</label>
                        <input type="number" data-rectangle id="side-a" name="side-a" step="0.01" min="0" value="<?php echo $sideA ?? 0; ?>">
                    </div>
                    <div class="shape-input">
                        <label for="side-b">b</label>
                        <input type="number" data-rectangle id="side-b" name="side-b" step="0.01" min="0" value="<?php echo $sideB ?? 0; ?>">
                    </div>
                    <div class="shape-input area">
                        <label for="area">A</label>
                        <input type="number" id="area" name="area" value="<?php echo $area ?? ''; ?>" readonly>
                    </div>
                    <div class="shape-input perimeter">
                        <label for="perimeter">U</label>
                        <input type="number" id="perimeter" name="perimeter" value="<?php echo $perimeter ?? ''; ?>" readonly>
                    </div>
                </div>

                <div class="calculation-mode-container">
                    <div class="calculation-mode-item">
                        <input type="radio" id="area-mode" name="calculation-mode" value="area" <?php echo $calculationMode === 'area' ? 'checked' : ''; ?>>
                        <label for="area-mode">Flächeninhalt</label>
                    </div>
                    <div class="calculation-mode-item">
                        <input type="radio" id="perimeter-mode" name="calculation-mode" value="perimeter" <?php echo $calculationMode === 'perimeter' ? 'checked' : ''; ?>>
                        <label for="perimeter-mode">Umfang</label>
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-calculate" id="calculate">Berechnen</button>
            </div>

            <input type="hidden" name="shape" value="rectangle"> <!-- Ausgewählte Form mit an index.php senden -->
        </form>
    </div>
</body>

</html>
