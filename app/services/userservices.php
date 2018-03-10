<?php

class userservices
{
    public function autheticate($email, $password)
    {
        $dbservices = new databaseconnectionservice;
        $db = $dbservices->getConnection();
        

        $user = $db->dt_users("email = ? and password = ?", $email, $password)->fetch();
        
         throw new Exception($user);

        $myObj = (object)array();

        if ($user)
        {
            $myObj->isAuthenticated = true;
            $myObj->redirectUrl = '../../index.html';
            $myObj->message = 'Login Successfull..';
            $_SESSION["userid"] = $user . id;
        }
        else
        {
            $myObj->isAuthenticated = false;
            $myObj->redirectUrl = 'pages/examples/sign-in.html';
            $myObj->message = 'Invalid credentials..';
        }

        return $myObj;
    }

    public function checkAccess()
    {
        $myObj = (object)array();

        if (isset($_SESSION["userid"]))
        {
            $myObj->isAuthenticated = true;
            $myObj->redirectUrl = '../../index.html';
            $myObj->message = 'Login Successfull..';
        }
        else
        {
            $myObj->isAuthenticated = false;
            $myObj->redirectUrl = 'pages/examples/sign-in.html';
            $myObj->message = 'No Access..';
        }

        return $myObj;
    }
}

?>
