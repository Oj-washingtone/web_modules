<?php
// function to upload a file 

function validate_and_upload_files(string $file_name, string $target_directory, array $accepted_type = null, int $required_size = null, array $accepted_dim = null)
{
    $error = 0;
    $success = false;

    $name = time() . '_' . $_FILES[$file_name]['name'];
    $target_file = $target_directory . basename($name);
    // validate file type

    if (!is_null($accepted_type)) {
        if (!in_array(pathinfo($target_file, PATHINFO_EXTENSION), $accepted_type)) {
            echo "Invalid type";
            $error++;
        }
    }


    if (!is_null($required_size)) {
        // validate size
        if ($_FILES[$file_name]['size'] > $required_size) {
            echo "file size must not exceed" . $required_size;
            $error++;
        }
    }

    // add dimensions validation

    // if no error
    if ($error == 0) {
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
            $success = true;
        }
    }

    return array("success" =>$success, "name"=>$name);
}