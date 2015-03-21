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
   		//imports data
 	   	$data =file('hd2013.csv');
		$datafile = fopen('hd2013.csv', 'r');
		while (($data = fgetcsv($datafile)) !== FALSE) 
		{
  		print_r($data);
		}
		fclose($datafile);
		
		echo '<br/>';
		echo '<br/>';
		
		//imports varlist
 	   	$varlist =file('varlist.csv');
		$varlistfile = fopen('varlist.csv', 'r');
		while (($varlist = fgetcsv($varlistfile)) !== FALSE) 
		{
  		print_r($varlist);
		}
		fclose($varlistfile);
		
		echo '<br/>';
		echo '<br/>';
		
		//imports description
 	   	$description =file('description.csv');
		$descriptionfile = fopen('description.csv', 'r');
		while (($description = fgetcsv($descriptionfile)) !== FALSE) 
		{
  		print_r($description);
		}
		fclose($descriptionfile);
		
		echo '<br/>';
		echo '<br/>';

		//imports frequencies
 	   	$frequencies =file('frequencies.csv');
		$frequenciesfile = fopen('frequencies.csv', 'r');
		while (($frequencies = fgetcsv($frequenciesfile)) !== FALSE) 
		{
  		print_r($frequencies);
		}
		fclose($frequenciesfile);
    }

}

$obj = Import::getInstance();   
?>