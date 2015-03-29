<?php
class Import
{
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) 
        {
            $instance = new static();
        }
        return $instance;
    }
    protected function __construct()
    {
		$datafile = fopen("hd2013.csv","r");
		$index = fgetcsv($datafile);
		while(!feof($datafile))
		{
			$data = fgetcsv($datafile);
			$ids[] = $data[0]; 
			$school_array[] = array_combine($index, $data);
		}
		$final_array = array_combine($ids, $school_array);
		fclose($datafile);
		
		if(!$_GET['page'])
		{
			foreach ($final_array as $key => $val) 
			{
				echo "<table border='1' style='width:50%'>";
				echo "<tr>";
				echo "<td>";
				echo '<a href="index.php?page='.$key.'">'.$val["INSTNM"].'</a><br>';
				echo "</td>";
				echo "</tr>";
				echo "</table>";
			}
		}
		else
		{
		//var_dump($final_array);
		$pagenum = $_GET['page'];
		echo $pagenum;
		//$searchid = array_search ($pagenum ,$final_array);
		//echo $searchid;
		}
	}
}
$obj = Import::getInstance();   
?>