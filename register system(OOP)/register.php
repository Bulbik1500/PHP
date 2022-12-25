<?php
class User
{
    public $FirstName;
    public $LastName;
    public $Email;

    // public function set_user($FirstName){
    //     $this->FirstName = $FirstName;
    //     // $this->LastName = $LastName;
    //     // $this->Email = $Email;
    // }
    public function set_user($FirstName, $LastName, $Email)
    {
        echo $this->FirstName = $FirstName . "\n";
        echo $this->LastName = $LastName . "\n";
        echo $this->Email = $Email . "\n";
    }
}
$User1 = new User();
$User1->set_user($_POST["FirstName"], $_POST["LastName"], $_POST["Email"]);
