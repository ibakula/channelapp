<?php
require_once("../api.php");

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        echo $me->GetChannel(intval($_GET['id']));
        break;
    case 'POST':
        $data = array("id" => "10", "name" => "", "packageId" => "1", "url" => "");
        foreach($_POST as $key => $value)
        {
            $data[$key] = $value;
        }
        $me->Create($data, 'channels');
        break;
    case 'DELETE':
        $_DELETE = array();
        parse_str(file_get_contents('php://input'), $_DELETE);
        $data = $_DELETE['id'];
        $me->Remove($data, 'channels');
        break;
}
?>