<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Validate the username and password (replace with your own validation logic)
  if (validate_credentials($username, $password)) {
    // Set the expiration date to one week from now
    $expiry = time() + 60 * 60 * 24 * 7;
    
    // Get the user ID from the database (replace with your own database logic)
    $query = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    
    // Set the cookie value
    $value = "$user_id|$username";
    
    // Set the cookie
    setcookie('classifieds_user', $value, $expiry);
    
    // Redirect to the home page
    header('Location: index.php');
    exit;
  } else {
    // Display an error message
    echo '<p>Invalid username or password. Please try again.</p>';
  }
}

// Function to validate the username and password
function validate_credentials($username, $password) {
  // Check if the username and password are correct (replace with your own validation logic)
  return $username == 'test' && $password == 'test';
}
?>