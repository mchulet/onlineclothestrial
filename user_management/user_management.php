<?php

    session_start(); // Starting Session
    include "../includes/connection.php";


    if(isset($_REQUEST['form_name']))
    {
        $form_name = $_REQUEST['form_name'];
    }

    switch ($form_name) {

        case "user_registration" :
        {
            $errorMsg = ''; // Initialize error as blank

            if (isset($_POST['submit'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $username = $_POST['username'];
                $birth_date = $_POST['birth_date'];
                $user_country = $_POST['user_country'];
                $model_body_type = $_POST['model_body_type'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $confirm_password = $_POST['confirm_password'];
                $act_key = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                $active_user = 'Y';

                $insert = mysql_query("INSERT INTO user_details (first_name, last_name, username, email, password, country, dob, body_type, act_key, active_user)
                        VALUES ('" . $first_name . "','" . $last_name . "','" . $username . "','" . $email . "','" . $password . "','" . $user_country . "',
                        '" . $birth_date . "','" . $model_body_type . "','" . $act_key . "','" . $active_user . "')");

                $errorMsg = "User registered successfully..!! ";
                header('Location: ../index.php');
            }
            else{
                $errorMsg = "User not registered successfully ";
            }
        }

        case "user_login" :
        {
            if (isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $query = mysql_query("select * from user_details where password = '".$password."' AND username = '".$username."' AND active_user = 'Y' ");
                $rows = mysql_num_rows($query);
                if ($rows == 1) {
                    $_SESSION['username']=$username; // Initializing Session
                    header("Location:../index.php?oauth_provider=normal"); // Redirecting To Other Page
                } else {
                    $error = "Username or Password is invalid";
                    header("Location:user_login.php"); // Redirecting To Other Page
                }
            }
        }

        case "edit_user_profile" :
        {
            if (isset($_POST['submit'])) {
//                print_r($_POST);exit;
                $userID = $_POST['user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $username = $_POST['username'];
                $user_country = $_POST['user_country'];
                $birth_date = $_POST['birth_date'];
                $model_body_type = $_POST['model_body_type'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                if($_POST['password'] == '' || $_POST['password'] == null)
                {
//                    echo "update user_details set first_name = '".$first_name."', last_name = '".$last_name."', username = '".$username."',
//                        email = '".$email."', country = '".$user_country."', dob = '".$birth_date."', body_type = '".$model_body_type."' where User_id = '".$userID."' ";exit;
                    $insert = mysql_query("update user_details set first_name = '".$first_name."', last_name = '".$last_name."', username = '".$username."',
                        email = '".$email."', country = '".$user_country."', dob = '".$birth_date."', body_type = '".$model_body_type."' where User_id = '".$userID."' ");
                }
                else
                {
//                    echo "update user_details set first_name = '".$first_name."', last_name = '".$last_name."', username = '".$username."',
//                        email = '".$email."', password = '".$password."', country = '".$user_country."', dob = '".$birth_date."', body_type = '".$model_body_type."' where User_id = '".$userID."' ";exit;
                    $insert = mysql_query("update user_details set first_name = '".$first_name."', last_name = '".$last_name."', username = '".$username."',
                        email = '".$email."', password = '".$password."', country = '".$user_country."', dob = '".$birth_date."', body_type = '".$model_body_type."' where User_id = '".$userID."' ");
                }



                $errorMsg = "User updated successfully..!! ";
                header('Location: user_profile.php');
            }
            else{
                $errorMsg = "User not registered successfully ";
            }
        }

        case "add_user_model_image" :
        {
            if (isset($_POST['submit']))
            {
//                print_r($_POST);print_r($_FILES);exit;
                $user_id = $_POST['user_id'];
                if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!="" && $_FILES['userfile']['name']!=NULL)
                {
                    $image_name = $_FILES['userfile']['name'];

                    $target_path = "../images/models/";
                    $target_path = $target_path.basename($image_name);

                    $target_path2 = "../images/models/small/";
                    $target_path2 = $target_path2.basename($image_name);

                    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path))
                    {
//                        copy($target_path, $target_path2);
                        define('THUMBNAIL_IMAGE_MAX_WIDTH', 75);
                        define('THUMBNAIL_IMAGE_MAX_HEIGHT', 250);

                        function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
                        {
                            list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
                            switch ($source_image_type) {
                                case IMAGETYPE_GIF:
                                    $source_gd_image = imagecreatefromgif($source_image_path);
                                    break;
                                case IMAGETYPE_JPEG:
                                    $source_gd_image = imagecreatefromjpeg($source_image_path);
                                    break;
                                case IMAGETYPE_PNG:
                                    $source_gd_image = imagecreatefrompng($source_image_path);
                                    break;
                            }
                            if ($source_gd_image === false) {
                                return false;
                            }
                            $source_aspect_ratio = $source_image_width / $source_image_height;
                            $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
                            if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
                                $thumbnail_image_width = $source_image_width;
                                $thumbnail_image_height = $source_image_height;
                            } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
                                $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
                                $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
                            } else {
                                $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
                                $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
                            }
                            $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
                            imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
                            imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
                            imagedestroy($source_gd_image);
                            imagedestroy($thumbnail_gd_image);
                            return true;
                        }
                        $result = generate_image_thumbnail($target_path, $target_path2);
                    }

//                    echo "update user_details set user_image = '".$image_name."' where User_id='".$user_id."'";exit;
                    mysql_query("update user_details set user_image = '".$image_name."' where User_id='".$user_id."'");
                    header("location: ../index.php?oauth_provider=normal");
                }
            }
        }

        default:
            break;
    }

?>