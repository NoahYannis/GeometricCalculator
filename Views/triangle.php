<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sideA = $_POST['side-a'] ?? 0;
    $sideB = $_POST['side-b'] ?? 0;
    $sideC = $_POST['side-c'] ?? 0;
    $heightH = $_POST['height-h'] ?? 0;

    $area = $_POST['area'] ?? 0;
    $perimeter = $_POST['perimeter'] ?? 0;
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
            <label id="formula-label">Flächeninhalt: A = 0,5 * c * h</label> <!-- Das c symbolisiert hier die Grundfläche des Bildes -->
        </div>
        <form action="" method="POST">
            <div class="shape-input-container">
                <div class="shape-input">
                    <label for="side-a">a</label>
                    <input type="number" id="side-a" name="side-a" value="<?php echo $sideA ?? 0; ?>">
                </div>
                <div class="shape-input">
                    <label for="side-b">b</label>
                    <input type="number" id="side-b" name="side-b" value="<?php echo $sideB ?? 0; ?>">
                </div>

                <div class="shape-input">
                    <label for="side-c">c</label>
                    <input type="number" id="side-c" name="side-c" value="<?php echo $_POST['side-c'] ?? 0; ?>">
                </div>
                <div class="shape-input">
                    <label for="height-h">h</label>
                    <input type="number" id="height-h" name="height-h" value="<?php echo $_POST['height-h'] ?? 0; ?>">
                </div>
                <div class="shape-input area">
                    <label for="area">A</label>
                    <input type="number" id="area" name="area" value="<?php echo $area ?? ''; ?>" readonly>
                </div>
                <div class="shape-input perimeter">
                    <label for="perimeter">U</label>
                    <input type="number" id="perimeter" name="perimeter" value="<?php echo $perimeter ?? ''; ?>" readonly>
                </div>
                <div class="calculation-mode-container">
                    <div class="calculation-mode-item">
                        <input type="radio" id="area" name="calculation-mode" value="area" checked>
                        <label for="area">Flächeninhalt</label>
                    </div>
                    <div class="calculation-mode-item">
                        <input type="radio" id="perimeter" name="calculation-mode" value="perimeter">
                        <label for="perimeter">Umfang</label>
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