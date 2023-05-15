<?

$json = file_get_contents('save.json', true);
$data  = json_decode($json,true);

$Portion = ($data["portion"] != "") ? $data["portion"] : $data["portion2"];
$Iteration = ($data["iteration"] != "") ? $data["iteration"] : $data["iteration2"];

$Calendar = $data["calendarDate"];

$Time = time();
$TimeStart = strtotime("09:00");
$TimeEnd = strtotime("24:00");

$DateNow = date("Y-m-d H:i:s");

$DateStart = $Calendar[0];
$DateEnd = $Calendar[1];

if(($DateNow  >= $DateStart && $DateNow <= $DateEnd)|| $Calendar == "")
{
    $TimeFeeding = $TimeStart;
    $Add = (($TimeEnd - $TimeStart)/($Iteration-1));
    for ($i = 0; $i < $Iteration; $i++)
    {  
        //echo date("H:i",$TimeFeeding) . " ";
        if(date("H:i",$Time) == date("H:i",$TimeFeeding))
        {
            echo $Portion;
            mail('test@gmail.com', 'Feeder', 'Внимание!');
        }
        $TimeFeeding +=$Add;
    }
}

?>