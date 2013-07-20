<?php

class DB {

    function getDatasetAsJSON() {
        $servername = 'sunucu';
        $username = 'kullaniciadi';
        $password = 'parola';
        $connectionID = mysql_connect($servername, $username, $password);
        mysql_select_db("veritabani");

	
        $result = mysql_fetch_assoc("select * from categories");

        $rows = array();
        while ($row = mssql_fetch_assoc($result)) {
            $rows[] = $row;
        }
        mysql_close($connectionID);
        return json_encode($rows);
    }

}

$db = new DB();
print '{
    "category":' . $db->getDatasetAsJSON() . '}';
unset($db);
?>
