<?php
error_reporting(E_ALL);
require_once "../classes/User.php";


if($_POST){
    if(isset($_POST['btnupload'])){
        $user_id_holder = $_POST['user_id'];

            $profile = $_FILES['profile'];

            //validation below to make sure you upload a file
            $file_error = $profile["error"];
            if($file_error > 0){
                echo "Please upload a valid file";
                exit();
            }
          
            //validation for file size. Check size value in bytes.
            // 1MB = 1,048,576 Bytes (binary)
            // 2mb = 2,097,152 Bytes (binary)
            $file_size = $profile["size"];
            if($file_size > 1048576){
                echo "Your file should not exceed 2MB";
                exit();
            }

            //Validation for file type via extension.
            //The accepted file extension on the page.
            $allowed_extension = ["jpg", "png", "jpeg"];
            $filename = $profile["name"];
            //Getting the file extesion the user uploaded
            $arrayfilename = explode(".",  $filename);
            $file_ext = end($arrayfilename);
            // echo $file_ext;
                if(!in_array($file_ext, $allowed_extension)){
                    echo "Select a valid extension";
                    exit();
                }


            //Generating a unique filename for the file, in case of multiple files with same name and extension.
            $final_filename = "gas" . time() . "." . $file_ext;

            $destination = "../uploads/$final_filename";
            $tempname = $profile["tmp_name"];

            $fileuploaded = move_uploaded_file( $tempname, $destination);

            // If the upload is successful, then send the filename and user id to user class method where it will be updated for the user
            if($fileuploaded){
                $user = new User();
                $response = $user->upload_profile_image($user_id_holder, $final_filename);
                echo $response;
                if($response){
                    header("location: ../user_profile.php");
                }
            } 

    }
}




?>