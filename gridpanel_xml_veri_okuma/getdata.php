<?php
class DB {
    function getDatasetAsXML() {
        $servername = 'sunucu';
        $username = 'kullaniciadi';
        $password = 'parola';
        $connectionID = mssql_connect($servername, $username, $password);
        mysql_select_db("veritabani_adi",$connectionID);
      
	   
        $result = mysql_query("select ContentID,Title from Contents Order By ContentID DESC");

        $xmlresult = "<?xml version=\"1.0\" encoding=\"ISO-8859-9\" standalone=\"yes\"?>\n";
        $xmlresult.="<Rows>\n";
		
		
        while ($row = mysql_fetch_object($result)) {
            $xmlresult.="\t<Row>\n";
            $xmlresult.="<ContentID>".$row->ContentID."</ContentID>";
            $xmlresult.="<Title>".str_replace("&","",$row->Title)."</Title>";
            $xmlresult.="\t</Row>\n"; 
        }
        $xmlresult.="</Rows>";
        mysql_close($connectionID);
        return $xmlresult; 
    }
}

//XML ile çalışırken türkçe karakter problemi olmaması için ISO-8859-9
header("Content-type:text/xml; charset=ISO-8859-9");
$db = new DB();
echo $db->getDatasetAsXML();
unset($db);
?>
