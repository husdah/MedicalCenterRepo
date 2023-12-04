<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Patients </title>
    <link rel="icon" href="/images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/patient.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Sidebar -->
    <?php
        include('./includes/sidebar.php');
    ?>
    <!-- End of Sidebar -->

    <!-- Start of Content -->
    <div class="content">
        <div class="left-side">
        <h3>Patient's Info</h3>
        <div class="patient-info">
            <div class="left">
            <label class="name" id="name">Patients Name</label>
            <label class="email" id="email">patientemail@gmail.com</label>
            <h5>Appointments</h5>
            <table class="apps">
                <tr>
                <td>
                    <h2 class="past" id="past">4</h2>
                    <label>Past</label>
                </td>
                <td>
                    <h2 class="upcoming" id="upcoming">2</h2>
                    <label>Upcoming</label>
                </td>
                </tr>
            </table>
            </div>

            <div class="right">
                <table class="info">
                <tr>
                    <td>
                        <div class="cell">
                        <label>Gender</label>
                        <span>Female</span>
                        </div>
                    </td>
                    <td>
                        <div class="cell">
                        <label>Birthday</label>
                        <span>Dec 31,1995</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="cell">
                        <label>Blood Group</label>
                        <span>A+</span>
                        </div>
                    </td>
                    <td>
                        <div class="cell">
                        <label>Registration Date</label>
                        <span>Nov 16,2023</span>
                        </div>
                    </td>
                </tr>
                </table>
                <button class="send-email">Send Email</button>
            </div>
            
        </div>

        <div class="apps-table">
            <h3>Appointments</h3>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Treatment Type</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>sep,11 2023</td>
                    <td>11:00 am</td>
                    <td>Consultation</td>
                    <td><span class="Completed">Completed</span></td>
                </tr>
                <tr>
                    <td>sep,15 2023</td>
                    <td>11:00 am</td>
                    <td>Follow-up</td>
                    <td><span class="Completed">Completed</span></td>
                </tr>
                <tr>
                    <td>Nov,18 2023</td>
                    <td>10:30 am</td>
                    <td>Follow-up</td>
                    <td><span class="Pending">Pending</span></td>
                </tr>
            </table>
        </div>
        </div>

        <div class="right-side">
        <div class="notes">
            <div class="page">
            <h2>Health Hub</h2>
            <form id="patient-from" class="patient-from">
                <div class="inputs">
                <div class="input-field"><label>First Name </label><input type="text" name="first-name"></div>
                <div class="input-field"><label>Last Name </label><input type="text" name="last-name"></div>
                </div>
                <div class="inputs">
                <div class="input-field"><label>Age</label><input type="number" name="age"></div>
                <div class="input-field"><label class="date">Date </label><input type="date" name="first-name"></div>
                </div>
                <textarea id="myTextarea" rows="7"></textarea>
            </form>
            <div class="signature">
                <label>Doctor Signature: </label><input type="text" name="doctor">
            </div>
            </div>
            <button>Print</button>
        </div>
        </div>
    </div>
    <!-- End of Content -->

    <script src="assets/js/patient.js"></script>
</body>
</html>