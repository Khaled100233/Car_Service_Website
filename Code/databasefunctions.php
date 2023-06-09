<?php

    function getReceiptSales(){

        $mysqli = new mysqli(SERVER,DBUSER,DBPASS,DBNAME);
        $stmt = $mysqli->prepare("SELECT SUM(`R_Total`) AS 'Price', CONCAT(MONTH(`R_Date`),' ',YEAR(`R_Date`)) AS 'Time' FROM `csreceipt` GROUP BY `R_Date`");
        $stmt->execute();
        $array = [];
        foreach ($stmt->get_result() as $row)
        {
            $array1[] = $row['Time'];
            $array2[] = $row['Price'];
        }

        $array = [$array1,$array2];

        $stmt->close();
        $mysqli->close();
        return $array;
    }

    function addService($name,$price,$desc,$link,$require){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "INSERT INTO `csservice`(`S_Name`, `S_Price`, `S_Desc`, `S_Link`, `RequirePart`) VALUES ('$name','$price','$desc','$link','$require')";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function updateService($id,$name,$price,$desc,$link,$require){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "UPDATE `csservice` SET `S_Name`='$name',`S_Price`='$price',`S_Desc`='$desc',`S_Link`='$link',`RequirePart`='$require' WHERE `S_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function deleteService($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "DELETE FROM `csservice` WHERE `S_ID`= '$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function getServices(){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT * FROM `csservice`";
        $query = mysqli_query($conn,$stat);

        $services = [];
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $rid = $row['S_ID'];
                $services["$rid"] = $row;
            }
        }

        mysqli_close($conn);
        return $services;
    }

    function getService($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT * FROM `csservice` WHERE `S_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        $services = 0;
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $services = $row;
            }
        }

        mysqli_close($conn);
        return $services;
    }

    function getCars($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT `CC_ID`,CONCAT(`CC_TYPE`,' ',`CC_YEAR`) AS 'Name',`CC_PlateNumber` FROM `cscustcar` WHERE `C_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        $cars = [];
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $cars[] = $row;
            }
        }

        mysqli_close($conn);
        return $cars;
    }

    function getCar($cid){
        //1 - connection
        $conn  = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn)
            exit("ERROR : ".mysqli_connect_error());
        //2- query
        $car = [];
        $query = mysqli_query($conn,"SELECT * FROM `cscustcar` WHERE `CC_ID`='$cid'");
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_assoc($query);
            $car = $row;
            return $car;
        }
        else {
            return false;
        }
    }
    
    function getAllCars() {
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT * FROM `cscustcar`";
        $query = mysqli_query($conn,$stat);

        $cars = [];
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $cars[] = $row;
            }
        }

        mysqli_close($conn);
        return $cars;
    }

    function updateCar($cid,$type,$year,$pltn){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "UPDATE `cscustcar` SET `CC_Type`='$type',`CC_Year`='$year',`CC_PlateNumber`='$pltn' WHERE `CC_ID` = '$cid'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function deleteCar($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "DELETE FROM `cscustcar` WHERE `CC_ID`= '$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function addCar($type,$year,$plateno,$uid){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "INSERT INTO `cscustcar` (`CC_Type`, `CC_Year`, `CC_PlateNumber`, `C_ID`) VALUES ('$type', '$year', '$plateno', '$uid')";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;

    }

    function updateUser($id,$password,$firstname,$lastname,$email,$phone){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "UPDATE `cscustomer` SET `C_Pass`='$password',`C_FirstName`='$firstname',`C_LastName`='$lastname',`C_Email`='$email',`C_Phone`='$phone' WHERE `C_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;

    }

    function updateUserName($id,$username){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "UPDATE `cscustomer` SET `C_UserName`='$username' WHERE `C_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;

    }

    function getUsers(){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT * FROM `cscustomer`";
        $query = mysqli_query($conn,$stat);

        $customers = [];
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $customers[] = $row;
            }
        }

        mysqli_close($conn);
        return $customers;
    }

    function deleteUser($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "DELETE FROM `cscustomer` WHERE `C_ID`= '$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function deleteCars($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "DELETE FROM `cscustcar` WHERE `C_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function getReceipts(){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "SELECT * FROM `csreceipt`";
        $query = mysqli_query($conn,$stat);

        $receipts = [];
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $receipts[] = $row;
            }
        }

        mysqli_close($conn);
        return $receipts;
    }

    function setToComplete($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "UPDATE `csreceipt` SET `isFinished`='1' WHERE `R_ID`='$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function addReceipt($total,$date,$ccid,$isfinished=0){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "INSERT INTO `csreceipt`(`R_Total`, `R_Date`, `isFinished`, `CC_ID`) VALUES ('$total','$date','$isfinished','$ccid')";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            $stat = "SELECT MAX(`R_ID`) AS 'max' FROM `csreceipt`";
            $query = mysqli_query($conn,$stat);
            $row = mysqli_fetch_assoc($query);
            //3- close
            mysqli_close($conn);
            return $row['max'];
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function deleteReceipt($id){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "DELETE FROM `csreceipt` WHERE `R_ID`= '$id'";
        $query = mysqli_query($conn,$stat);
        $stat = "DELETE FROM `service_receipt` WHERE `R_ID`= '$id'";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function addEmployee($username,$password,$ismanager,$isadmin){
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error: ".mysqli_connect_error());
        }

        $stat = "INSERT INTO `csemployee`(`E_Username`, `E_Password`, `isManager`, `isAdmin`) VALUES ('$username','$password','$ismanager','$isadmin')";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) >0)
        {
            //3- close
            mysqli_close($conn);
            return true;
        }
        //3- close
        mysqli_close($conn);
        return false;
    }

    function fabricate($string){

        return $string;
    }

    function getUser($id){
        //1 - connection
        $conn  = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn)
            exit("ERROR : ".mysqli_connect_error());
        //2- query
        $customer = [];
        $query = mysqli_query($conn,"SELECT * FROM `cscustomer` WHERE `C_ID`='$id'");
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_assoc($query);
            $customer = $row;
            return $customer;
        }
        else {
            return false;
        }
    }

    function userLogin($username,$userpass){
        //1 - connection
        $conn  = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn)
            exit("ERROR : ".mysqli_connect_error());
        //2- query
        $query = mysqli_query($conn,"SELECT * FROM `cscustomer` WHERE `C_UserName`='$username' AND `C_Pass`='$userpass'");
        if(mysqli_num_rows($query)>0)
        {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['C_ID'];
            mysqli_close($conn);
            return true;
        }
        else
        {
            mysqli_close($conn);
            return false;
        }
    }

    function userSign($username,$useremail,$userpass){
        
        $conn = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn){
            exit("Error : ".mysqli_connect_error());
        }

        $stat = "INSERT INTO `cscustomer`(`C_UserName`,`C_Email`,`C_Pass`) VALUES ('$username','$useremail','$userpass')";
        $query = mysqli_query($conn,$stat);

        if(mysqli_affected_rows($conn) > 0){
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);
        return false;

    }

    function empLogin($username,$userpass){
        //1 - connection
        $conn  = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$conn)
            exit("ERROR : ".mysqli_connect_error());
        //2- query
        $query = mysqli_query($conn,"SELECT * FROM `csemployee` WHERE `E_Username`='$username' AND `E_Password`='$userpass'");
        if(mysqli_num_rows($query)>0)
        {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['E_ID'];
            $_SESSION['Manager'] = $row['isManager'];
            $_SESSION['Admin'] = $row['isAdmin'];
            mysqli_close($conn);
            return true;
        }
        else
        {
            mysqli_close($conn);
            return false;
        }
    }

    function logout()
    {
	    session_destroy();
    }

?>