<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Doctor Dashboard</title>
    <link rel="icon" href="/images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/addpatientcss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- Sidebar -->
    <?php
        include('./includes/sidebar.php');
    ?>
    <!-- End of Sidebar -->

     <!-------section jdide-->
     <div class="main-content">
        <div class="leftright">
            <div class="right">
                <div class="titlesearch">
                    <div>
                        <h2>Appointments</h2>
                    </div>
                    <div class="searchbox">
                        <input type="text" name="search" id="search" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
              <div class="tablediv">
                <table class="table" id="stable">
                    <thead>
                    <tr>
                        <th>Name of Patient</th>
                        <th>Date</th>
                        <th>Time</th>
                       
                    </tr>
                    </thead>
                    <tr>
                        <td>patient 1</td>
                        <td>11/12/2023</td>
                        <td>10:00 am</td>
                       
                    </tr>
                    <tr>
                        <td>patient 2</td>
                        <td>11/12/2023</td>
                        <td>10:00 am</td>
                       
                    </tr>
                    <tr>
                        <td>patient 3</td>
                        <td>11/16/2023</td>
                        <td>12:00 pm</td>
                       
                    </tr>
                    <tr>
                        <td>patient 4</td>
                        <td>11/20/2023</td>
                        <td>13:00 pm</td>
                      
                    </tr>
                    <tr>
                        <td>patient 2</td>
                        <td>11/12/2023</td>
                        <td>10:00 am</td>
                       
                    </tr>
                    <tr>
                        <td>patient 3</td>
                        <td>11/16/2023</td>
                        <td>12:00 pm</td>
                       
                    </tr>
                    <tr>
                        <td>patient 4</td>
                        <td>11/20/2023</td>
                        <td>13:00 pm</td>
                      
                    </tr>
                    <tr>
                        <td>patient 2</td>
                        <td>11/12/2023</td>
                        <td>10:00 am</td>
                       
                    </tr>
                    <tr>
                        <td>patient 3</td>
                        <td>11/16/2023</td>
                        <td>12:00 pm</td>
                       
                    </tr>
                    <tr>
                        <td>patient 3</td>
                        <td>11/16/2023</td>
                        <td>12:00 pm</td>
                       
                    </tr>
                    <tr>
                        <td>patient 3</td>
                        <td>11/16/2023</td>
                        <td>12:00 pm</td>
                       
                    </tr>
                    
                </table>

              </div>

            </div>
            <div class="left">
                <div class="title">
                    <h2>Add Patient</h2>
                </div>
                <form action="" id="form">
                    <div class="txt" id="forpatient">
                       <label for="pname">Patient Name</label>
                       <input type="text" name="pname" id="pname">
                    </div>
                    <div class="txt" id="forlastapp">
                        <label for="lappdate">Last appointment date</label>
                        <input type="date" name="lappdate" id="lappdate">
                     </div>
                     <div class="txt" id="fornewapp">
                        <label for="nappdate">New appointment date</label>
                        <input type="date" name="nappdate" id="nappdate">
                     </div>
                     <div class="txt" id="fortime">
                        <label for="tapp">Time appointment</label>
                        <input type="time" name="tapp" id="tapp">
                     </div>
                     <div class="btn">
                        <input type="submit" value="Add" name="submit" >
                     </div>

                </form>
            </div>
        </div>
     </div>
     <!-------end l section l jdide---------->
     <script>

        var filterInput = document.getElementById('search');
        var dataTable = document.getElementById('stable');
        var rows = dataTable.getElementsByTagName('tr');

        filterInput.addEventListener('input', function() {
        var filterValue = filterInput.value.toLowerCase();
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName('td');
            var shouldShow = false;
            for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent.toLowerCase();
            if (cellText.includes(filterValue)) {
                shouldShow = true;
                break;
            }
            }
            row.style.display = shouldShow ? 'table-row' : 'none';
        }
        });
        
     </script>

    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/addpatient.js"></script>

</body>
</html>