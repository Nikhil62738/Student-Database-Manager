<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detension</title>
    <link rel="shortcut icon" href="Database.png">
    <link rel="stylesheet" href="Detension.css">
</head>
<body style="background:url(./databasebg.png)">
    <section class="py-5">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <span>
                        <form action="" method="GET" autocomplete="off">
                        <button type="button" class="btnSubmit1" onclick="location.href='index.php'"><span>Log Out</span></button>

                            <label class="label">From</label>
                            <input type="datetime-local" name="From_date" class="form-control" placeholder="From" required <?=isset($_GET['From_date']) == true? $_GET['From_date']:''?> >
                            <label class="label">To</label>
                            <input type="datetime-local" name="To_date" class="form-control" placeholder="To" required <?=isset($_GET['To_date']) == true? $_GET['To_date']:''?> >
                            <input type="text" name="Course_Code" maxlength="6" class="form-control1" placeholder="Course Code" id="Course" required <?=isset($_GET['Course_Code']) == true? $_GET['Course_Code']:''?>  >
                            <input type="int" name="Total"  class="form-control1" placeholder="Total pratical" id="Total" required <?=isset($_GET['Total']) == true? $_GET['Total']:''?>  >

                            <br>    
                            <span>
                                <button type="submit" class="button"><span>Search</span></button>
                                <button onclick="window.print()" class="btnSubmit"><span>Print</span></button>
                            </span>
                        </form>
                        <h6>DETENSION LIST</h6>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead class="table">
                                <tr>
                                    <th class="roll">Enrollment</th>
                                    <th class="roll">Course Code</th>
                                    <th class="roll">Attend</th>
                                    <th class="roll">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $con = new mysqli('sql313.ezyro.com', 'ezyro_35186661', 'e5a3ea31e89d', 'ezyro_35186661_attendancemanagement');

                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                    if (isset($_GET['From_date']) && isset($_GET['To_date']) && isset($_GET['Course_Code'])&& isset($_GET['Total'])) {
                                        $From_date = $_GET['From_date'];
                                        $To_date = $_GET['To_date'];
                                        $Course_Code = $_GET['Course_Code'];
                                        $total_days = $_GET['Total'];

                                        // Query to fetch attendance data based on selected date range and Course Code
                                        $check_query = mysqli_query($con, "SELECT Enrollment, Course_Code, COUNT(*) as attendance_days FROM attendancemanagement WHERE Date BETWEEN                                             '$From_date' AND '$To_date' AND Course_Code='$Course_Code' GROUP BY Enrollment");

                                        if (mysqli_num_rows($check_query) > 0) {
                                            while ($row = mysqli_fetch_assoc($check_query)) {
                                                // $total_days_query = mysqli_query($con, "SELECT COUNT(*) as total_days FROM attendancemanagement WHERE Date BETWEEN '$From_date' AND '$To_date' AND Course_Code='$Course_Code' AND Enrollment = '" . $row['Enrollment'] . "'");
                                                // $total_days = mysqli_fetch_assoc($total_days_query)['total_days'];
                                                $attendance_days = $row['attendance_days'];
                                                $attendance_percentage = ($attendance_days / $total_days) * 100;
                                                ?>
                                                <tr>
                                                    <td  class="roll"><?php echo $row['Enrollment']; ?></td>
                                                    <td class="roll"><?php echo $row['Course_Code']; ?></td>
                                                    <td class="roll"><?php echo $attendance_days; ?></td>
                                                    <td class="roll"><?php echo round($attendance_percentage, 2) . "%"; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            // Data not found, display a message
                                            ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Data not found for the selected criteria.</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        const inp = document.getElementById("Course");
        inp.addEventListener("input",()=>{
            inp.value = inp.value.toUpperCase();
        });
    </script>
</body>
</html>
