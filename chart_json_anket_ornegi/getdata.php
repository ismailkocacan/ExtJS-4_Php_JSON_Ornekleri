<?php

class DB {           
    function getDatasetAsJSON() {
        $servername = 'sunucu';
        $username   = 'kullaniciadi';
        $password   = 'parola';
        $connectionID = mssql_connect($servername, $username, $password);
        mssql_select_db("veritabani_adi");

        // oyların yüzdesi hesaplanıyor.
        $Query="DECLARE @totalvote INT";
        $Query.=" SET @totalvote=(SELECT SUM(VoteCount) FROM SurveyResults) "; // toplam oy sayısı
        $Query.="SELECT AnswerText,VoteCount,(VoteCount*100)/@totalvote AS [Percent] FROM SurveyResults"; //her bir cevabın yüzdesi oranı hesaplanıyor.
        
        $result = mssql_query($Query);
        
        $rows = array();
        while ($row = mssql_fetch_assoc($result)) {
            $rows[] = $row;
        }
        mssql_close($connectionID);
        return json_encode($rows);
    }

}

$db = new DB();
print '{
    "Result":' . $db->getDatasetAsJSON() . '}';
unset($db);
?>
