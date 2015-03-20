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

		foreach($lines as $data)
		{
		list($UNITID[],$INSTNM[],$ADDR[],$CITY[],$STABBR[],$ZIP[],$FIPS[],$OBEREG[],$CHFNM[],$CHFTITLE[],$GENTELE[],
		$FAXTELE[],$EIN[],$OPEID[],$OPEFLAG[],$WEBADDR[],$ADMINURL[],$FAIDURL[],$APPLURL[],$NPRICURL[],$SECTOR[],$ICLEVEL[],
		$CONTROL[],$HLOFFER[],$UGOFFER[],$GROFFER[],$HDEGOFR1[],$DEGGRANT[],$HBCU[],$HOSPITAL[],$MEDICAL[],$TRIBAL[],$LOCALE[],
		$OPENPUBL[],$ACT[],$NEWID[],$DEATHYR[],$CLOSEDAT[],$CYACTIVE[],$POSTSEC[],$PSEFLAG[],$PSET4FLG[],$RPTMTH[],$IALIAS[],
		$INSTCAT[],$CCBASIC[],$CCIPUG[],$CCIPGRAD[],$CCUGPROF[],$CCENRPRF[],$CCSIZSET[],$CARNEGIE[],$LANDGRNT[],$INSTSIZE[],
		$CBSA[],$CBSATYPE[],$CSA[],$NECTA[],$F1SYSTYP[],$F1SYSNAM[],$F1SYSCOD[],$COUNTYCD[],$COUNTYNM[],$CNGDSTCD[],$LONGITUD[],
		$LATITUDE[])
		= explode(',',$data);
		}
    }

}

$obj = Inport::getInstance();   
?>