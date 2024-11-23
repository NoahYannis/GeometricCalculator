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
                <input type="radio" id="rectangle" name="shape" value="rectangle" <?php echo $_POST['shape'] === 'rectangle' ? 'checked' : ''; ?>>
                <label for="rectangle">Rechteck</label>
            </div>
            <div class="shape-selection-item">
                <input type="radio" id="triangle" name="shape" value="triangle" <?php echo $_POST['shape'] === 'triangle' ? 'checked' : ''; ?>>
                <label for="triangle">Dreieck</label>
            </div>
            <div class="shape-selection-item">
                <input type="radio" id="circle" name="shape" value="circle" <?php echo $_POST['shape'] === 'circle' ? 'checked' : ''; ?>>
                <label for="circle">Kreis</label>
            </div>
        </div>

        <div id="shape-view-container">
            <?php
            $selectedShape = isset($_POST['shape']) ? $_POST['shape'] : 'rectangle';
            include "Views/{$selectedShape}.php";
            ?>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectedMode = document.querySelector('input[name="calculation-mode"]:checked').value;
        toggleCalculationFields(selectedMode);
    });

    // Zeigt die für die Berechnung relevanten Felder an und versteckt die anderen.
    function toggleCalculationFields(mode) {
        document.querySelector('.perimeter').style.display = (mode === 'area') ? 'none' : 'block';
        document.querySelector('.area').style.display = (mode === 'area') ? 'block' : 'none';
    }

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
                    const selectedMode = document.querySelector('input[name="calculation-mode"]:checked').value;
                    toggleCalculationFields(selectedMode);
                })
                .catch(error => console.error('Error loading view:', error));
        });
    });


    function addCalculationModeListeners() {
        const calcModeBtn = document.querySelectorAll('input[name="calculation-mode"]');
        calcModeBtn.forEach(btn =>
            btn.addEventListener('change', function() {
                const selectedMode = btn.value;
                const selectedShape = document.querySelector('input[name="shape"]:checked').value;
                const formulaLabel = document.getElementById('formula-label');
                formulaLabel.innerHTML = getCalculationFormula(selectedShape, selectedMode);
                toggleCalculationFields(selectedMode);
            })
        );
    }


    function getCalculationFormula(shape, mode) {
        switch (shape) {
            case 'rectangle':
                return mode === 'area' ? 'Flächeninhalt: A = a * b' : 'Umfang: U = 2 * (a + b)';
            case 'triangle':
                return mode === 'area' ? 'Flächeninhalt: A = 0,5 * c * h' : 'Umfang: U = a + b + c';
            case 'circle':
                return mode === 'area' ? 'Flächeninhalt: A = π * r²' : 'Umfang: U = 2 * π * r';
            default:
                return '';
        }
    }

    addCalculationModeListeners();
</script>

</html>