<?php

$calculationMode = $_POST['calculation-mode'] ?? 'area';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sideA = $_POST['side-a'] ?? 0;
    $sideB = $_POST['side-b'] ?? 0;
    $sideC = $_POST['side-c'] ?? 0;
    $heightH = $_POST['height-h'] ?? 0;

    $area = $_POST['area'] ?? '';
    $perimeter = $_POST['perimeter'] ?? '';
    $calculationMode = $_POST['calculation-mode'] ?? 'area';

    if ($calculationMode === 'area') {
        $area = 0.5 * $sideC * $heightH;
    } else {
        $perimeter = $sideA + $sideB + $sideC;
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
            <img src="img/triangle-image.webp" />
            <label
                id="formula-label"><?php echo $calculationMode === 'area' ? 'Flächeninhalt: A = 0.5 * c * h' : 'Umfang: U = a + b + c'; ?>
            </label>
        </div>
        <form action="index.php" method="POST">
            <div class="input-container">
                <div class="shape-input-container">
                    <div class="shape-input perimeter">
                        <label for="side-a">a</label>
                        <input type="number" id="side-a" name="side-a" value="<?php echo $sideA ?? 0; ?>">
                    </div>
                    <div class="shape-input perimeter">
                        <label for="side-b">b</label>
                        <input type="number" id="side-b" name="side-b" value="<?php echo $sideB ?? 0; ?>">
                    </div>
                    <div class="shape-input">
                        <label for="side-c">c</label>
                        <input type="number" id="side-c" name="side-c" value="<?php echo $_POST['side-c'] ?? 0; ?>">
                    </div>
                    <div class="shape-input area">
                        <label for="height-h">h</label>
                        <input type="number" id="height-h" name="height-h"
                            value="<?php echo $_POST['height-h'] ?? 0; ?>">
                    </div>
                    <div class="shape-input area">
                        <label for="area">A</label>
                        <input type="number" id="area" name="area" value="<?php echo $area ?? ''; ?>" readonly>
                    </div>
                    <div class="shape-input perimeter">
                        <label for="perimeter">U</label>
                        <input type="number" id="perimeter" name="perimeter" value="<?php echo $perimeter ?? ''; ?>"
                            readonly>
                    </div>
                </div>

                <div class="calculation-mode-container">
                    <div class="calculation-mode-item">
                        <input type="radio" id="area-mode" name="calculation-mode" value="area"
                            <?php echo $calculationMode === 'area' ? 'checked' : ''; ?>>
                        <label for="area-mode">Flächeninhalt</label>
                    </div>
                    <div class="calculation-mode-item">
                        <input type="radio" id="perimeter-mode" name="calculation-mode" value="perimeter"
                            <?php echo $calculationMode === 'perimeter' ? 'checked' : ''; ?>>
                        <label for="perimeter-mode">Umfang</label>
                    </div>
                </div>

            </div>
            <div class="btn-container">
                <button type="submit" class="btn-calculate" id="calculate">Berechnen</button>
            </div>
            <input type="hidden" name="shape" value="triangle"> <!-- Ausgewählte Form mit an index.php senden -->
        </form>
    </div>
</body>

</html>