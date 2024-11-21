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
            <label>Flächeninhalt: A = (c * h) / 2</label> <!-- Das c symbolisiert hier die Grundfläche des Bildes  -->
        </div>
        <div class="shape-input-container">
            <div class="shape-input">
                <label for="side-a">a</label>
                <input type="number" id="side-a" name="side-a" value="0">
            </div>
            <div class="shape-input">
                <label for="side-b">b</label>
                <input type="number" id="side-b" name="side-b" value="0">
            </div>
            <div class="shape-input">
                <label for="side-c">c</label>
                <input type="number" id="side-c" name="side-c" value="0">
            </div>
            <div class="shape-input">
                <label for="height-h">h</label>
                <input type="number" id="height-h" name="height-h" value="0">
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