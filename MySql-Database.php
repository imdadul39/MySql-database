<?php
$con = mysqli_connect('localhost', 'root', '', 'iaabangla');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css">
    <title>MySQL DataFilter in PHP</title>


    <div class="card_body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Form Date</label>
                    <input type="date" name="form_date" value="<?php if (isset($_GET['form_date'])) {
                                                                    echo $_GET['form_date'];
                                                                } ?>">
                </div>

                <div class="col-md-4">
                    <label for="">To Date</label>
                    <input type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                    echo $_GET['to_date'];
                                                                } ?>">
                </div>

                <div class="col-md-4">
                    <input type="submit" name="submit" class="btn btn-primary" value="filter">
                </div>
            </div>

        </form>

        <div class="card_content">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>UserName </th>
                    <th>UserEmail</th>
                    <th>PhoneNo</th>
                    <th>PackName</th>
                    <th>TransactionDate</th>
                    <th>TransactionId</th>
                </tr>



                <?php
                if (isset($_GET['form_date']) && $_GET['to_date']) {
                    $from_date = $_GET['form_date'];
                    $to_date = $_GET['to_date'];

                    $filter = "SELECT * FROM ssl_transaction_cus WHERE TransactionDate BETWEEN '$from_date' AND '$to_date'";

                    $filter_query = mysqli_query($con,  $filter);
                    if (mysqli_num_rows($filter_query) > 0) {
                        while ($row = mysqli_fetch_assoc($filter_query)) {
                ?>
                            <tr>
                                <td><?php echo $row['Id']; ?></td>
                                <td><?php echo $row['UserId']; ?></td>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['UserEmail']; ?></td>
                                <td><?php echo $row['PhoneNo']; ?></td>
                                <td><?php echo $row['PackName']; ?></td>
                                <td><?php echo $row['TransactionDate']; ?></td>
                                <td><?php echo $row['TransactionId']; ?></td>
                            </tr>
                <?php
                            // print_r($row);
                        }
                    } else {
                        echo 'sorry not found';
                    }
                }
                ?>
            </table>
        </div>
    </div>

<body>










    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>



</body>

</html>
