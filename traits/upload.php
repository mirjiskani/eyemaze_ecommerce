<?php
trait uploadImage
{
    public function upload($path)
    {
        //print_r($_FILES);
        $target_file = $path . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if ($check !== false) {
        } else {
            return ["status" => 0, 'message' => "File is not an image."];
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            return ["status" => 0, 'message' => "Sorry, file already exists."];
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            return ["status" => 0, 'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        }

        // Check if $uploadOk is set to 0 by an error
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            return ["status" => 1, 'message' => "Upload successfully.", "filePath" => $target_file];
        } else {
            return ["status" => 0, 'message' => "Sorry, there was an error uploading your file."];
        }
    } // end upload method
}//end of upload image class
