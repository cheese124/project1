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
		echo "<table border='1' style='width:50%'>";
			foreach ($hd2013_array as $key => $value) 
			{
				echo "<tr>";
				echo "<td>";
				echo '<a href="index.php?page='.$key.'">'.$value["INSTNM"].'</a><br>';
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else
		{
			//Gets the page number
			$pagenum = $_GET['page'];
			$result = $hd2013_array[$pagenum];
			
			//inports dict
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
			
			//list the real value for each
			foreach ($frequencies_array as $key1 => $value1) 
			{
				foreach ($result as $key2 => $value2)
				{ 
					//Replace the real values
					if(($value1['varname'] == $key2) &($value1['codevalue'] == $value2))
					{
						$newvalue = $value1['valuelabel'];
    					$result[$key2] = $newvalue;
    				}
				}
				
			}//dist forloop
			
			//inports dict
			$vfile = fopen("varlist.csv","r");
			$vindex = fgetcsv($vfile);
			while(!feof($vfile))
			{
				$vdata = fgetcsv($vfile);
				$vids[] = $vdata[1]; 
				$vdata_array[] = array_combine($vindex, $vdata);
			}
			$varlist_array = array_combine($vids, $vdata_array);
			fclose($vfile);
			//add full discriptions
			foreach ($varlist_array as $key1 => $value1) 
			{
				foreach ($result as $key2 => $value2)
				{ 
					//Replace the real values
					if($value1['varname'] == $key2)
					{
						$newkey = $value1['varTitle'];
    					$newresult[$newkey] = $value2;
    				}
				}
				
			}//varlist forloop
			
			//print modified array
			echo "<table border='1' style='width:100%' table-layout: fixed>";
			foreach ($newresult as $key => $value) 
			{
				echo "<tr>";
				echo "<td>";
				echo "$key";
				echo "</td>";
				echo "<td>";
				echo "$value";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
		} // else
	}//constructor
}//class
$obj = Import::getInstance();   
?>