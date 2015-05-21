<?php namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Credentials
 *
 * @author tmaxham
 * @generated 11.05.2015
 * @version 11.05.2015
 */
class Credential extends Model {

	public function getXwordAttribute()
	{

		$key = 'Laravel';
		$range = implode(range('a', 'z')) . implode(range('A', 'Z'));
		$Codiert = '';

		$xsave = $this->xsave;

		while(strlen($key) < strlen($xsave)) $key = $key . $key;
		for ($i=0; $i < strlen($xsave); $i++ )
		{

			$Stelle = strpos($range, $xsave[$i]);
			$StelleS = strpos($range, $key[$i]);
			if (($Stelle > -1) && ($StelleS > -1))
			{
				$Summe = $Stelle + $StelleS;
				if ($Summe >= strlen($range))
				{
					$Summe = $Summe - strlen($range);
				}
				$Codiert = $Codiert . $range[$Summe];
			}
			else { $Codiert = $Codiert . " "; }
		}

		return $Codiert;
	}

} 