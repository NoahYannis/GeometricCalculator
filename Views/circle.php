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
            <label>Flächeninhalt: A = π ⋅ r²</label> <!-- Formel Flächeninhalt  -->
        </div>
        <div class="shape-input-container">
            <div class="shape-input">
                <label for="diameter">d</label>
                <input type="number" id="diameter" name="diameter" value="0">
            </div>
            <div class="shape-input">
                <label for="radius">r</label>
                <input type="number" id="radius" name="radius" value="0">
            </div>
            <div class="shape-input">
                <label for="circumference">C</label>
                <input type="number" id="circumference" name="circumference" value="0">
            </div>
            <div class="shape-input area">
                <label for="area">A</label>
                <input type="number" id="area" name="area" readonly>
            </div>
        </div>
        <div class="calculation-mode-container">
            <div class="calculation-mode-item">
                <input type="radio" id="area" name="calculation-mode" value="area">
                <label for="area">Flächeninhalt</label>
            </div>
            <div class="calculation-mode-item">
                <input type="radio" id="perimeter" name="calculation-mode" value="perimeter">
                <label for="perimeter">Umfang</label>
            </div>
        </div>
    </div>
</body>

</html>