<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>My Notes Page</title>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);

body {
  font-family: Roboto, sans-serif;
}

#chart {
  max-width: 650px;
  margin: 35px auto;
}
</style>
</head>
<body>
<?php
    include '../config/database.php';
    if (!isset($_SESSION['user_id'])) {
        header('Location: /index.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // Fetch notes from MongoDB
    $filter = ['user_id' => $user_id];
    $options = [
        'sort' => ['created_at' => -1]
    ];
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $mongo->executeQuery('my_notes.notes', $query);
?>
    <div class="container mt-5">
        <div class="row">
            <!-- <div class="col-md-3"></div> -->
            <div class="col-md-6">
                <h2 class="header"><?php echo htmlspecialchars($username); ?></h2>
                <div class="d-flex justify-content-between mb-3">
                    <a href="/views/add_note_page.php" class="btn btn-md btn-success">Add Note</a>
                    <a href="/controllers/logout.php" class="btn btn-md btn-warning">Logout</a>
                </div>
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <h3 class="header">Your Notes</h3>
                    </div>
                    <div class="card-body">
                        <?php foreach ($rows as $note): ?>
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    <strong><?= htmlspecialchars($note->title) ?></strong>
                                </div>
                                <div class="card-body">
                                    <?= nl2br(htmlspecialchars($note->content)) ?>
                                </div>
                                <div class="card-footer">
                                    <a href="/views/edit_note_page.php?id=<?= $note->_id ?>" class="btn btn-md btn-success">Edit</a>
                                    <a href="/controllers/delete_note.php?id=<?= $note->_id ?>" onclick="return confirm('Delete this note?')" class="btn btn-md btn-danger">Delete</a>
                                </div>
                            </div>
                            <br>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="chart"></div>
                <br>
                <div id="barChart"></div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // ApexChartJS
    var options = {
        chart: {
            type: 'area'
        },
        stroke: {
            curve: 'smooth',
        },
        series: [
            {
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            },
             {
                name: 'sales 2',
                data: [3,40,35,23,49,66,10,91,145]
            },
        ],
        xaxis: {
            categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();

    //Bar
    var options = {
        chart: {
            type: 'bar'
        },
        stroke: {
            curve: 'smooth',
        },
        series: [
            {
                name: 'My Notes',
                data: [30,40,35]
            }
        ],
        xaxis: {
            categories: ['2025', '2026', '2027']
        }
    }

    var barChart = new ApexCharts(document.querySelector("#barChart"), options);

    barChart.render();
</script>
</body>
</html>