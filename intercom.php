<?php
// -----------------------------
// Coded By KlanxMc on Github
// Coded with <3
// Free to modify or do whatever with it! :D
// -----------------------------

//// Configuration
// Your Intercom App ID
$yourappid = '';
// Example jg83kd -> $yourappid = 'jg83kd';

// Customer IP Tracking Method (You Can Only Use One, If you want to switch replace the // in front of the ip)
$visitorip = $_SERVER["HTTP_CF_CONNECTING_IP"]; // Uses Cloudflare To Track IP (Use If YOUR Using Cloudflare)
//$visitorip = $_SERVER['HTTP_X_FORWARDED_FOR']; // Uses PHP To Track IP (Use If YOUR NOT Using Cloudflare)

//// End Of Configuration

// Get Required WHMCS Configeration File
require 'configuration.php';

// Get Current Viewer Session Details
$clientsessionname = $_SESSION["clientname"];
$clientsessionid = $_SESSION['uid'];

// Connect to WHMCS Database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check Connection
if (!$conn) {
  die("Intercom.php Error! - WHMCS MySQL Connection failed: " . mysqli_connect_error());
}

// Run Database Query To Find User Details
$sql = "SELECT * FROM `tblclients` WHERE `id` = '$clientsessionid'";
$result = mysqli_query($conn, $sql);

// Check For Account
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    // Client Account Has Been Found

      // Assign Customer Name
      $clientfullname = $row["firstname"] . ' ' . $row["lastname"];

      // Assign Customer Email
      $clientemail = $row["email"];

      // Check If User Has There Email Verified On WHMCS (Version 7.2+)
      if ($row["email_verified"] === "1") {
       $emailverification = 'Verified';
      } else {
       $emailverification = 'Unverified';
      }

      // Echo Data To Page So Intercom Can Initiate
      echo '<script>
        window.intercomSettings = {
          app_id: "' . $yourappid . '", // Your App ID
          name: "' . $clientfullname . '", // Full name
          email: "' . $clientemail . '", // Email address
          user_id: "' . $clientsessionid . '", // User ID
          created_at: "' . strtotime("now") . '", // Signup date as a Unix timestamp
          user_hash: "' . hash_hmac('sha256', $clientsessionid, 'lpgqgxIspq_Du5Sob9CQcXMbbQlXDBMysjsgFs4Z') . '",
          "IP Address": "' . $visitorip . '", // Client IP
          "City": "' . $row["city"] . '", // Client City
          "Company": "' . $row["companyname"] . '", // Client Company
          "Phone": "' . $row["phonenumber"] . '", // Client Phone Number
          "State": "' . $row["state"] . '", // Client State
          "Country": "' . $row["country"] . '", // Client Country
          "Status": "' . $row["status"] . '", // Client Status
          "Language": "' . $row["language"] . '", // Client Language
          "Email Status": "' . $emailverification . '", // Client Email Verification
          "Credit Balance": "' . $row["credit"] . '", // Client Account Credit
        };
      </script>';
   }
} else {
  // No Client Account Exists, This Is A Visitor
  echo '<script>
    window.intercomSettings = {
      app_id: "' . $yourappid . '", // Your App ID
      "IP Address": "' . $_SERVER["HTTP_CF_CONNECTING_IP"] . '", // Client IP
    };
  </script>';
}

?>
