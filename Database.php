<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="shortcut icon" href="Database.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="Database2.css">
    
    
</head>
<body style="background:url(./databasebg.png)">
    <section class="py-5">
        <div class="container">
        
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-headrer">
                        <h5>Get database according to dates</h5>
                    </div> -->
                       
                    <span>

                   
                        <form action="" method="GET" autocomplete="off">
                                        <button type="button" class="btnSubmit1" onclick="location.href='index.php'"><span>Log Out</span></button>
                                        
                                         <label class="label">From </label>
                                        <input type="datetime-local" name="From_date" class="form-control" placeholder="From" <?=isset($_GET['From_date']) == true? $_GET['From_date']:''?> >
                                                        <label  class="label">To</label>

                                       
                                        <input type="datetime-local" name="To_date" class="form-control" placeholder="To" <?=isset($_GET['To_date']) == true? $_GET['To_date']:''?> >
                              
                                      <label class="label" >Course Code</label>

                                        <input type="text" name="Course_Code"maxlength="6" class="form-control1" placeholder="Course Code" id="Course" <?=isset($_GET['Course_Code']) == true? $_GET['Course_Code']:''?>  >
                                         
                                         
                                        <br>    
                                        <span>
                                       
                                            <button type="submit"  class="button"  ><span>Search</span></button>
                                            <button type="button" class="btnSub" onclick="location.href='Detension.php'"><span>Detension</span></button>
                                             <button onclick="window.print()  " class="btnSubmit "  ><span>Print</span></button>
                                             
                                            
                                        </span>
                                        
                                       
                                     </form>
                                         
                                        </spam>
                                         <h6>Student list</h6>
                            </div>
                       
                    </div>
                    <div class="card mt-3" >
                        <div class ="card-body">
                             <!--<h6>Student list</h6> -->
                            <hr>
                            <table class="table table-bordered table striped" style="font-size=4px" >
                                <thead class="table">
                                    <tr>
                                        <th class="roll">Sr no</th>
                                        <th class="roll">Enrollment no</th>
                                        <th class="roll">Date time</th>
                                        <th class="roll">Course code</th>
                                        <th class="roll">Agent no</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $con = new mysqli('sql313.ezyro.com', 'ezyro_35186661', 'e5a3ea31e89d', 'ezyro_35186661_attendancemanagement');
                                    $count=1;
                                    // $query_run;
                                        if(isset($_GET['From_date']) && $_GET['From_date'] !='' && isset($_GET['To_date']) && $_GET['To_date'] !='' && isset($_GET['Course_Code']) && $_GET['Course_Code'] !='')
                                        {
                                            $From_date=$_GET['From_date'];
                                            $To_date=$_GET['To_date'];
                                            $Course_Code=$_GET['Course_Code'];
                                           
                                            
                                            
                                           $query = "SELECT * FROM attendancemanagement WHERE Date BETWEEN '$From_date' AND '$To_date' AND Course_Code = '$Course_Code'";

                                        $query_run = mysqli_query($con,$query);
                                        
                                        
                                              if($query_run >null )
                                                 {
                                                      foreach($query_run as $row)
                                                         {
                                                
                                                             ?>
                                                                  <tr>
                                                                     <td class="roll"><?php echo $count?></td>
                                                                     <td class="roll"><?php echo $row['Enrollment'];?></td>
                                                                     <td class="roll"><?php echo $row['Date'];?></td>
                                                                     <td class="roll"><?php echo $row['Course_Code'];?></td>
                                                                     <td class="roll"><?php echo $row['Agent_no'];?></td>
                                                                  </tr>

                                                            <?php
                                                         $count++;
                                                         }
                                                 }
                                                 else
                                                  {
                                                     echo "No record found";
                                                  }
                                        }
                                    
                                    ?>
                                   
                                    
                                </tbody>
                            </table>

                        </div>
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