 <?php
// function getDatabaseConnection() {
//     try {
//         $host = 'localhost';
//         $dbname = 'smart_fertilizer'; // Replace with your database name
//         $username = 'root'; // Default XAMPP username
//         $password = ''; // Default XAMPP password (empty unless changed)
//         $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        
//         // Check if ATTR_ERRMODE_EXCEPTION is defined, fallback to basic error mode if not
//         if (defined('PDO::ATTR_ERRMODE_EXCEPTION')) {
//             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
//         } else {
//             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); // Fallback to silent mode
//             error_log("Warning: PDO::ATTR_ERRMODE_EXCEPTION not defined, using ERRMODE_SILENT");
//         }
        
//         return $conn;
//     } catch (PDOException $e) {
//         error_log("Connection failed: " . $e->getMessage());
//         return null;
//     }
// }



function getDatabaseConnection() {
    try {
        $dsn = 'mysql:host=localhost;dbname=smart_fertilizer;charset=utf8mb4';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => false
        ]);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return null;
    }
}
?>


