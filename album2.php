<html>
<body>
<form action="album2.php" method="post" enctype="multipart/form-data">
  Submit this file:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Send File" name="submit">
</form>
<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if(isset($_POST["submit"])) {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
$Displayfiles = scandir($target_dir);
$files = array_diff($Displayfiles, array('.', '..'));
foreach($files as $filename) {
  if (preg_match("/^[^\.].*$/", $filename)){
?>
        <a href ="#" download = "<?php echo $filename;?>" onclick="displayImage('<?php echo $filename;?>')"><?php echo $filename;?></a><br>
       <?php
}}
?>
<script type="text/javascript">
        var fileDirectory = "<?php echo"$target_dir"?>";
        function displayImage(valuename){
          var myInput = document.getElementById("dis1");
          if (myInput) {
              myInput.remove();
          }
          var imgDiv = document.createElement("img");
          imgDiv.src = fileDirectory+valuename;
          imgDiv.setAttribute('id','dis1');
          imgDiv.alt = "picture";
          document.body.appendChild(imgDiv);
        }
    </script>
</body>
</html>