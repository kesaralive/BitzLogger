<?php
require_once 'Auth.php';
require_once 'config.php';
$auth = new Auth;
$auth->private();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $servername = SERVER_NAME;
    $username = DB_USER;
    $password = DB_PASS;
    $dbname = DB_NAME;
    // Create connection
    try {
        $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
    }
    //Create query
    $selectquery = 'SELECT * FROM users WHERE mac = "' . $data['mac'] . '"';
    //Prepare 
    $selectstmt = $conn->prepare($selectquery);
    $selectstmt->execute();
    if ($selectstmt->rowCount() > 0) {
        //array
        $userArray = $selectstmt->fetchAll(PDO::FETCH_ASSOC);
        $sql = 'INSERT INTO `logger`.`logs` (`userid`, `log`,`starttime`,`endtime`) VALUES (:userid, :logs, :startt
ime, :endtime)';
        $statement = $conn->prepare($sql);
        //Bind params
        $statement->bindParam(':userid', $userArray[0]["ai"], PDO::PARAM_INT);
        $statement->bindParam(':logs', $data['logs']);
        $statement->bindParam(':starttime', $data['start']);
        $statement->bindParam(':endtime', $data['now']);
        //Execute
        $statement->execute();
    } else {
        //Enter user details
        $sql = 'INSERT INTO users (desktop, mac, os, user) VALUES("' . $data['desktop'] . '","' . $data['mac'] . '","' . $data['os'] . '","' . $data['user'] . '")';
        $statement = $conn->prepare($sql);
        $statement->execute();

        //Read userid
        $selectquery = 'SELECT * FROM users WHERE mac = "' . $data['mac'] . '"';
        $selectstmt = $conn->prepare($selectquery);
        $selectstmt->execute();

        //array
        $userArray = $selectstmt->fetchAll(PDO::FETCH_ASSOC);
        $sql = 'INSERT INTO `logger`.`logs` (`userid`, `log`,`starttime`,`endtime`) VALUES (:userid, :logs, :starttime, :endtime)';
        $statement = $conn->prepare($sql);

        //Bind params
        $statement->bindParam(':userid', $userArray[0]["ai"], PDO::PARAM_INT);
        $statement->bindParam(':logs', $data['logs']);
        $statement->bindParam(':starttime', $data['start']);
        $statement->bindParam(':endtime', $data['end']);

        //Execute
        $statement->execute();
    }
}
