<?php
class Inport
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
 	   $lines =file('hd2013.csv');
		$file = fopen('hd2013.csv', 'r');
		while (($line = fgetcsv($file)) !== FALSE) 
		{
  		//$line is an array of the csv elements
  		print_r($line);
		}
		fclose($file);
    }

}

$obj = Inport::getInstance();   
?>