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
		$datafile = fopen("test.csv","r");
		$index = fgetcsv($datafile);
		while(!feof($datafile))
		{
			$data = fgetcsv($datafile);
			$ids[] = $data[0]; 
			$data_array[] = array_combine($index, $data);
		}
		$hd2013_array = array_combine($ids, $data_array);
		fclose($datafile);
		
		if(!$_GET['page'])
		{
			foreach ($hd2013_array as $key => $value) 
			{
				echo "<table border='1' style='width:50%'>";
				echo "<tr>";
				echo "<td>";
				echo '<a href="index.php?page='.$key.'">'.$value["INSTNM"].'</a><br>';
				echo "</td>";
				echo "</tr>";
				echo "</table>";
			}
		}
		else
		{
			//Prints raw data
			$pagenum = $_GET['page'];
			$result = $hd2013_array[$pagenum];
			
			//inports frequencies
			$ffile = fopen("dict.csv","r");
			$findex = fgetcsv($ffile);
			$i=0;
			while(!feof($ffile))
			{
				$fdata = fgetcsv($ffile);
				$fids[] = $i++; 
				$fdata_array[] = array_combine($findex, $fdata);
			}
			$frequencies_array = array_combine($fids, $fdata_array);
			fclose($ffile);
			//list rows as an array
			
			//list the real value for each
			foreach ($frequencies_array as $key1 => $value1) 
			{
				foreach ($result as $key2 => $value2)
				{ 
				//echo $key2;
					if(($value1['varname'] == $key2) &($value1['codevalue'] == $value2))
					{
						$newvalue = $value1['valuelabel'];
    					$result[$key2] = $newvalue;
    				}
				}
				
			}//dist forloop
			
			//print modified array
			foreach ($result as $key => $value) 
			{
    			echo "Key: $key; Value: $value<br />\n";
			}
			
		} // else
	}//constructor
}//class
$obj = Import::getInstance();   
?>