<?php
include 'connect.php'; // your DB connection

// Fetch doctors
$doctor_query = "SELECT id, name, department FROM doctors";
$doctor_result = mysqli_query($conn, $doctor_query);

// Fetch appointments
$appointment_query = "SELECT * FROM appointments ORDER BY date ASC";
$appointment_result = mysqli_query($conn, $appointment_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Management</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Appointment Scheduling - Management Panel</h2>

<!-- Doctors List -->
<h4>Doctor Time Management</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Doctor Name</th>
      <th>Department</th>
      <th>Available Timing</th>
    </tr>
  </thead>
  <tbody>
    <?php while($doctor = mysqli_fetch_assoc($doctor_result)) { ?>
      <tr>
        <td><?php echo $doctor['name']; ?></td>
        <td><?php echo $doctor['department']; ?></td>
        <td>09:00 AM - 05:00 PM (Example)</td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Appointment List -->
<h4>Patient Appointments</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Patient Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Appointment Date</th>
      <th>Doctor</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php while($appointment = mysqli_fetch_assoc($appointment_result)) { ?>
      <tr>
        <td><?php echo $appointment['name']; ?></td>
        <td><?php echo $appointment['email']; ?></td>
        <td><?php echo $appointment['phone']; ?></td>
        <td><?php echo date('d M Y, H:i A', strtotime($appointment['date'])); ?></td>
        <td><?php echo $appointment['doctor']; ?></td>
        <td>
          <?php
          $now = date('Y-m-d H:i:s');
          if($appointment['date'] < $now){
            echo '<span class="badge bg-secondary">Completed</span>';
          } else {
            echo '<span class="badge bg-success">Upcoming</span>';
          }
          ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

</body>
</html>
