<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Geometrie-Rechner</title>
</head>

<body>
    <div class="page-container">
        <div class="shape-selection-container">
            <div class="shape-selection-item">
                <input type="radio" id="rectangle" name="shape" value="rectangle" checked>
                <label for="rectangle">Rechteck</label>
            </div>
            <div class="shape-selection-item">
                <input type="radio" id="triangle" name="shape" value="triangle">
                <label for="triangle">Dreieck</label>
            </div>
            <div class="shape-selection-item">
                <input type="radio" id="circle" name="shape" value="circle">
                <label for="circle">Kreis</label>
            </div>
        </div>

        <div id="shape-view-container">
            <?php include "Views/rectangle.php"; ?>
        </div>
        <button class="btn-calculate" id="calculate">Berechnen</button>
    </div>
</body>

<script>
    const radioButtons = document.querySelectorAll('input[name="shape"]');
    const shapeViewContainer = document.getElementById('shape-view-container');

    // Bei Selektion eines Radio Buttons die entsprechende View laden.
    radioButtons.forEach(button => {
        button.addEventListener('change', function() {
            const selectedShape = document.querySelector('input[name="shape"]:checked').value;
            fetch(`Views/${selectedShape}.php`)
                .then(response => response.text())
                .then(data => {
                    shapeViewContainer.innerHTML = data;
                    addCalculationModeListeners();
                })
                .catch(error => console.error('Error loading view:', error));
        });
    });

    function addCalculationModeListeners() {
        const calcModeBtn = document.querySelectorAll('input[name="calculation-mode"]');
        calcModeBtn.forEach(btn =>
            btn.addEventListener('change', function() {
                alert(btn.value);
            })
        );
    }

    addCalculationModeListeners();
</script>

</html>