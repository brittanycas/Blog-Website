<?php
$alert="";
$alertClass="";

if(filter_has_var(INPUT_POST, 'submit')) {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

if(!empty($name) && !empty($email) && !empty($message)) {
     if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
         $alert = "Please enter a valid email address";
         $alertClass ="alert alert-danger";
     } else {
         $toEmail = 'brittany@brittanycassell.com';
         $subject = 'Contact Request from '.$name;
         $body = '<h2>Contact Request</h2>
         <h4>Name: </h4><p>'.$name.'</p>
         <h4>Email: </h4><p>'.$email.'</p>
         <h4>Message: </h4><p>'.$message.'</p>';

         $headers  = "From: $name <$email>\r\n";
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

         if( mail($toEmail, $subject, $body, $headers)) {
             $alert = "Your email has been sent. Click <a href='http://blog.brittanycassell.com/index.php' >here</a> to return home.";
             $alertClass = "text-center alert alert-success";
         } else {
             $alert = "Your email failed to send";
             $alertClass = "text-center alert alert-danger";
         }
     }
}  else {
    $alert = "Please fill in all fields";
    $alertClass="text-center alert alert-danger";
}
};
include 'header.php';
 ?>


 <h2 class="text-center p-4">Questions about the blog? Feel free to reach out using the form below</h2>
   <div>
       <?php if ($alert != ''): ?>
        <div class="<?php echo $alertClass; ?>">
         <?php echo $alert; ?>
   </div>
       <?php endif; ?>
   <h4 class="text-center p-4">Contact Me</h1>
   <div class="container form-group" id="form">
     <form  class="m-3 text-center" method="post" class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
       <div class="form-group">
           <label>Name</label>
           <input class="form-control col-sm-4 mx-auto" type="text" name="name"
           value="<?php  echo isset($_POST['name']) ? $name: ''; ?>">
       </div>
       <div class="form-group">
           <label>Email</label>
           <input class="form-control col-sm-4 mx-auto" type="email" name="email"
           value=" <?php  echo isset($_POST['email']) ? $email: ''; ?>">
       </div>
       <div class="form-group">
           <label>Message</label>
           <textarea class="form-control col-sm-4 mx-auto" rows="6" name="message"><?php  echo isset($_POST['message']) ? $message: ''; ?></textarea>
       </div>
       <div id="submit">
           <button type="submit" name="submit">Submit</button>
     </form>
   </div>

   <?php
   include 'footer.php'
   ?>
