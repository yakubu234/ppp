<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

function format_time_delta($timestamp) {
    // """
    // Formats a timestamp into a human-readable string relative to current time.
  
    // Args:
    //     timestamp: A string representing a timestamp in YYYY-MM-DD HH:MM:SS format.
  
    // Returns:
    //     A string representing the formatted time delta (e.g., "Friday 07 Apr (4 hours ago)").
    // """
  
    // Convert timestamp string to datetime object
    $timestamp_dt = datetime::createFromFormat('Y-m-d H:i:s', $timestamp);
  
    // Get current time
    $now = new DateTime();
  
    // Calculate time delta
    $delta = $now->diff($timestamp_dt);
  
    // Define units and thresholds for relative time calculation
    $units = [
        ["year", 365 * 24 * 60 * 60],
        ["month", 30 * 24 * 60 * 60],
        ["week", 7 * 24 * 60 * 60],
        ["day", 24 * 60 * 60],
        ["hour", 60 * 60],
        ["minute", 60],
    ];
  
    // Find the appropriate unit for the time delta
    for ($i = 0; $i < count($units); $i++) {
      $unit = $units[$i][0];
      $threshold = $units[$i][1];
  
      if ($delta->format('%s') >= $threshold) {
        // Calculate the number of units elapsed
        $time_elapsed = $delta->format('%s') / $threshold;
  
        // Format the output string
        return $timestamp_dt->format('l j \M\y') . " (" . (int)$time_elapsed . " " . $unit . ($time_elapsed > 1 ? 's' : '') . " ago)";
      }
    }
  
    // If delta is less than a minute, display "just now"
    return "just now";
  }
    

if(isset($_GET['id']) ){
    $parts = explode('_', $_GET['id']); // Split the string at the underscore
    $id = $parts[0];
    
    // Fetch user data based on email
    $sql = "SELECT * FROM messages WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id , PDO::PARAM_STR);
    $query->execute();
    $message = $query->fetch(PDO::FETCH_ASSOC);
    
    $formatted_time = format_time_delta($message['created_at']);
    // Access the count using the key 'total_bookings'
    include('message.view.php');
}else{
    $_SESSION['errors'] ='Error the message ID is missing';
    header("Refresh:0; url=message.data.php");
}

?>