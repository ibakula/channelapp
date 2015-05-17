<?php
require_once("../api.php");

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        echo $me->GetPackage(intval($_GET['id']));
        break;
    case 'POST':
        $data = array("id" => "10", "name" => "", "price" => "");
        foreach($_POST as $key => $value)
        {
            $data[$key] = $value;
        }
        $me->Create($data);
        break;
    case 'DELETE':
        $_DELETE = array();
        parse_str(file_get_contents('php://input'), $_DELETE);
        $data = $_DELETE['id'];
        $me->Remove($data);
        break;
}
?>