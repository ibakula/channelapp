<?php

// scan the folder?

class API {
    private $db;

    public function __construct($config = array())
    {
       $this->db = new mysqli($config["host"], $config["username"], $config["password"], $config["database"]) or die("DB configuration error.");
    }

    public function ExecQuery($query)
    {
        $query = $this->db->query($query);
        $result = $query->fetch_assoc();
        return $result;
    }

    public function GetPackage($id = 0)
    {
        $id = $this->db->real_escape_string($id); // Meh! :D
        $out = array("id" => 0, "name" => "", "price" => "");
        if ($id != 0 || !empty($id))
        {
            $query = $this->ExecQuery("SELECT * FROM packages WHERE id='".$id."'");
            if (!empty($query['id']))
            {
                $out["id"] = $query['id'];
                $out["name"] = $query['name'];
                $out["price"] = $query['price'];
            }
        }
        else
        {
            $query_row = $this->db->query("SELECT * FROM packages");
            $query = $query_row->fetch_assoc();
            if (!empty($query['id']))
            {
                do
                {
                    $out["id"] = $query['id'];
                    $out["name"] = $query['name'];
                    $out["price"] = $query['price'];
                    $data[] = $out;
                } while ($query = $query_row->fetch_assoc());
                $out = $data;
            }
        }
        return json_encode($out);
    }

    public function GetChannel($id = 0)
    {
        $id = $this->db->real_escape_string($id);
        $out = array("id" => 0, "name" => "", "packageId" => "", "url" => "");
        if ($id != 0 || !empty($id))
        {
            $query = $this->ExecQuery("SELECT * FROM channels WHERE id='".$id."'");
            if (!empty($query['id']))
            {
                $out["id"] = $query['id'];
                $out["name"] = $query['name'];
                $out["packageId"] = $query['packageId'];
                $out["url"] = $query['url'];
            }
        }
        else
        {
            $query_row = $this->db->query("SELECT * FROM channels");
            $query = $query_row->fetch_assoc();
            if (!empty($query['id']))
            {
                do
                {
                    $out["id"] = $query['id'];
                    $out["name"] = $query['name'];
                    $out["packageId"] = $query['packageId'];
                    $out["url"] = $query['url'];
                    $data[] = $out;
                } while ($query = $query_row->fetch_assoc());
                $out = $data;
            }
        }
        return json_encode($out);
    }

    public function Create($data, $option = 'packages')
    {
        foreach ($data as $key => $value)
        {
            $data[$key] = $this->db->real_escape_string($value);
        }
        if ($option == 'packages')
            $this->db->query("REPLACE INTO packages VALUES('".$data['id']."', '".$data['name']."', '".$data['price']."')");
        else $this->db->query("REPLACE INTO channels VALUES('".$data['id']."', '".$data['name']."', '".$data['packageId']."', '".$data['url']."')");
    }

    public function Remove($id, $what = 'packages')
    {
        if ($what == 'packages')
            $this->db->query("DELETE FROM packages WHERE id='".$id."'");
        else $this->db->query("DELETE FROM channels WHERE id='".$id."'");
    }
}

$me = new API([
    "host" => '127.0.0.1',
    "database" => 'test',
    "username" => 'root',
    "password"  => 'root'
]);