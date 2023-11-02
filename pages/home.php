

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
    <!-- Include Chart.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <?php
    // Your PHP code to fetch exam results goes here
    $examResults = [
        // Replace this with your fetched data, e.g., ['Question 1', 80]
        // You can fetch the questions and scores from your database
    ];
    ?>

    <div style="width: 80%; margin: 0 auto;">
        <h1>Exam Results</h1>
        <canvas id="examChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Extract exam results data from PHP into JavaScript
        var examResults = <?php echo json_encode($examResults); ?>;

        // Extract question labels and scores
        var labels = examResults.map(result => result[0]);
        var scores = examResults.map(result => result[1]);

        // Create a bar chart using Chart.js
        var ctx = document.getElementById('examChart').getContext('2d');
        var examChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Scores',
                    data: scores,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Blue color
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100 // Set your max score here
                    }
                }
            }
        });
    </script>
</body>
</html>

    </div>
    </div>
