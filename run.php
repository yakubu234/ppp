<?php

// if($_POST){
// 	$_POST['description'];
// 	echo  htmlentities(htmlentities($_POST['description'], ENT_QUOTES), ENT_QUOTES);
// 	die;
// }


?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <textarea name="description"></textarea>
        <input type="file" name="file" onchange="handleFile(event)">
        <input type="submit" name="submit" value="Upload">
    </form>

    <script>
        function validateFileType(file) {
            const filename = file.name;
            const extension = filename.substr(filename.lastIndexOf(".")).toLowerCase();
            const allowedExtensions = [".csv", ".excel"];
            return allowedExtensions.includes(extension);
        }

        function validateFileSize(file, maxSizeInKB) {
            return file.size / 1024 <= maxSizeInKB;
        }

        async function getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = (error) => reject(error);
            });
        }

        async function handleFile(event) {
            const file = event.target.files[0];
            if (!validateFileType(file)) {
                console.log("File extension must be .csv or .excel");
                return;
            }
            if (!validateFileSize(file, 5 * 1024)) {
                console.log("File size should not be greater than 5MB");
                return;
            }
            try {
                const base64String = await getBase64(file);
                console.log(base64String);
            } catch (error) {
                console.error("Error occurred while reading the file:", error);
            }
        }
    </script>
</body>
</html>

<button id="upload_widget" class="cloudinary-button">Upload files</button>

<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>  

<script type="text/javascript">  
var myWidget = cloudinary.createUploadWidget({
  cloudName: 'cloudinary://668624467928855:WeEe8AzWrvFyao9J9BxYecrdfnI@hirefreehands-tech', 
  uploadPreset: 'my_preset'}, (error, result) => { 
    if (!error && result && result.event === "success") { 
      console.log('Done! Here is the image info: ', result.info); 
    }
  }
)

document.getElementById("upload_widget").addEventListener("click", function(){
    myWidget.open();
  }, false);
</script>