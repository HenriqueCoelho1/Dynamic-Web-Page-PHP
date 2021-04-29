<?php
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";
$errorInputName = false;
$errorInputEmail = false;
$errorInputGender = false;
$errorInputWebsite = false;
if(isset($_POST["Submit"])){
    function test_user_input($Data){
        return $Data;
    
    }
    $NameIsEmpty = empty($_POST["Name"]);
    $EmailIsEmpty = empty($_POST["Email"]);
    $GenderIsEmpty = empty($_POST["Gender"]);
    $WebsiteIsEmpty = empty($_POST["Website"]);

    $NameRegex = "/^[A-Za-z. ]*$/";
    $EmailRegex = "/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0.9._-]{2}/";
    $WebsiteRegex = "/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/";

    
    // $NameIsEmpty ? $NameError = "Name is Required" : $Name = test_user_input($_POST["Name"])
    // && !preg_match($NameRegex, $Name = test_user_input($_POST["Name"])) 
    // ? $NameError = "Only Letters and White Space are allowed" : "";
    // $EmailIsEmpty ? $EmailError = "Email is Required" : $Email = test_user_input($_POST["Email"])
    // && !preg_match($EmailRegex, $Email = test_user_input($_POST["Email"])) 
    // ? $EmailError = "Is not a valid email" : "";

    // function validatorRegex($EmailRegex, $Email){
    //     if(preg_match($EmailRegex, $Email)){
    //         return true;
    //     }
        
    // }

    
    
    if($NameIsEmpty){
        $NameError = "Name is Required";
    }else{
        $Name = test_user_input($_POST["Name"]);
        $NameSuccess = preg_match($NameRegex, $Name);
        if($NameSuccess == false){
            $NameError = "Only letters and white space are permitted";
            $errorInputName = true;

        }
    }

    if($EmailIsEmpty){
        $EmailError = "Name is Required";
    }else{
        $Email = test_user_input($_POST["Email"]);
        $EmailSuccess = preg_match($EmailRegex, $Email);
        if($EmailSuccess == false){
            $EmailError = "Is not a valid email";
            $errorInputEmail = true;
        }
        
    }
    if($GenderIsEmpty){
        $GenderError = "Gender is Required";
        $errorInputGender = true;
    }

    if($WebsiteIsEmpty){
        $WebsiteError = "Name is Required";
        $errorInputWebsite = true;
    }else{
        $Website = test_user_input($_POST["Website"]);
        $WebsiteSuccess = preg_match($WebsiteRegex, $Website);
        if($WebsiteSuccess == false){
            $WebsiteError = "Is not a valid Website";

        }
    }

    if(!$NameIsEmpty && !$EmailIsEmpty && !$WebsiteIsEmpty && !$GenderIsEmpty){
        if($NameSuccess && $EmailSuccess && $WebsiteSuccess){
            echo "<h2>Your Submit Information: </h2> <br />";
            echo "Name: ". ucwords($_POST["Name"]) . "<br />";
            echo "Email:  {$_POST["Email"]} <br />";
            echo "Gender:  {$_POST["Gender"]} <br />";
            echo "Website:  {$_POST["Website"]} <br />";
            echo "Comments:  {$_POST["Comment"]} <br />";

        }else{
            echo "Please complete the form again!";
        }
    }

    // function validationName(){
    //     if($errorInputName == false){
    //         echo "<input class='input is-primary' type='text' placeholder='Your Name' Name='Name' value='' />";

    //     }else{
    //         echo "<input class='input is-danger' type='text' placeholder='{$NameError}' Name='Name' value='' />";
    //         $errorInputName == false;

    //     }
    // }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>Document</title>
</head>
<body>

    <div class="has-text-centered">
        <h1 class="title is-1 center">Form Validation with PHP</h1>
    </div>

    <div class="container">
        <div class="columns is-centered">
            <form action="formValidationProject.php" method="post"> 
                <p class="has-text-left is-italic has-text-info">Please Fill Out the following Fields</p>
                    
                    <div class="field p-2">    
                        <label class="label">Name: </label>
                        
                        <div class="control">
                        <?php
                            if($errorInputName == false){
                                echo "<input class='input is-primary' type='text' placeholder='Your Name' Name='Name' value='' />";

                            }else{
                                echo "<input class='input is-danger' type='text' placeholder='Your Name' value=''>";
                                echo "</div> <p class='help is-danger'>{$NameError}</p> </div>";
                                $errorInputName == false;

                            }
                        ?>
                        </div>
                    </div>
                    
                    <div class="field p-1">
                        <label class="label"> Email: </label>
                        <div class="control">
                        <?php
                        if($errorInputEmail == false){
                            echo "<input class='input is-primary' type='email' placeholder='Your Email' Name='Email' value='' />";

                        }else{
                            echo "<input class='input is-danger' type='email' placeholder='Email input' value=''>";
                            echo "</div> <p class='help is-danger'>{$EmailError}</p> </div>";
                            $errorInputEmail == false;

                        }

                        ?>
                        </div>
                    </div>

                    <div class="field p-1">
                        <div class="control">
                        <h5 class="title is-5"> Gender: </h5>
                        <?php
                        if($errorInputGender == false){
                            echo "<label class='radio is-primary'>
                            <input type='radio' Name='Gender' value='Female' />Female
                            <input type='radio' Name='Gender' value='Male' />Male
                            </label>";

                        }else{
                            echo "<label class='radio is-danger'>
                            <input type='radio' Name='Gender' value='Female' />Female
                            <input type='radio' Name='Gender' value='Male' />Male
                            </label>";
                            echo "</div> <p class='help is-danger'>{$GenderError}</p> </div>";
                            $errorInputGender == false;

                        }

                        ?>
                        </div>
                    </div>
                    <div class="field p-1">
                        <label class="label"> Website: </label>
                        <div class="control">
                        <?php
                        if($errorInputWebsite == false){
                            echo "<input class='input is-primary' type='text' placeholder='Your Website' Name='Website' value='' />";

                        }else{
                            echo "<input class='input is-danger' type='text' placeholder='Your Website' value=''>";
                            echo "</div> <p class='help is-danger'>{$EmailGender}</p> </div>";
                            $errorInputGender == false;

                        }

                        ?>
                        </div>
                    </div>
                    <div class="field p-1">
                        <label class="label">Comment:</label>
                        <div class="control">
                            <textarea class="textarea" Name="Comment" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" Name="Submit" value="">Submit</button>
                        </div>
                    </div>
                    <br />
            </form>
        </div>
    </div>
    
</body>
</html>