import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class HospitalDB {

    // Database URL, Username, Password
    static final String DB_URL = "jdbc:mysql://localhost:3306/hospital_db";
    static final String USER = "root"; // your DB username
    static final String PASS = "newpassword"; // your DB password

    // Connect to Database
    public static Connection connect() {
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(DB_URL, USER, PASS);
            System.out.println("Connected to Database successfully!");
        } catch (SQLException e) {
            System.out.println("Connection failed!");
            e.printStackTrace();
        }
        return conn;
    }

    // Insert Appointment
    public static void insertAppointment(String patientName, String doctorName, String department,
            String appointmentTime) {
        String sql = "INSERT INTO appointments (patient_name, doctor_name, department, appointment_time) VALUES (?, ?, ?, ?)";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setString(1, patientName);
            pstmt.setString(2, doctorName);
            pstmt.setString(3, department);
            pstmt.setString(4, appointmentTime);
            pstmt.executeUpdate();

            System.out.println("Appointment inserted successfully!");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Retrieve Appointments
    public static void listAppointments() {
        String sql = "SELECT * FROM appointments";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery()) {

            while (rs.next()) {
                System.out.println("Appointment ID: " + rs.getInt("id"));
                System.out.println("Patient: " + rs.getString("patient_name"));
                System.out.println("Doctor: " + rs.getString("doctor_name"));
                System.out.println("Department: " + rs.getString("department"));
                System.out.println("Time: " + rs.getTimestamp("appointment_time"));
                System.out.println("----------------------------");
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Main Method
    public static void main(String[] args) {
        // Example usage
        insertAppointment("John Doe", "Dr. Smith", "Cardiology", "2025-05-01 10:30:00");
        listAppointments();
    }
}
