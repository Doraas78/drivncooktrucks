<?php

function verification_file($_FILES)
{

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);

    // Validate image extension
    if (!in_array($file_extension, $allowed_image_extension))
    {
        return array(
            "type" => "error",
            "message" => "Seuls les extensions JPG, PNG et JPEG sont autorisées"
        );
    }
    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 100000000))
    {
        return array(
            "type" => "error",
            "message" => "L'image excède 100MB"
        );
    }
    else
    {
        $target = PUBLIC_PATH . '/images/user/' . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            return array(
                "type" => "success",
                "message" => "Image bien sauvegardée"
            );
        } else {
            return array(
                "type" => "error",
                "message" => "Erreur ! Problème avec l'image"
            );
        }
    }
}
