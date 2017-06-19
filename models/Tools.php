<?php
class Tools
{
	public $dataid;
	public function __construct()
	{
		$this->dataid = "";
	}
	
	public function __destruct(){}
	
	//自訂加密方式
	public function convert($video_name)
	{
		$text = "";
		
		for ($i = 0; $i < mb_strlen($video_name); $i++)
		{
			$key = mb_substr($video_name, $i, 1);
				
			switch ($key)
			{
				case '0': $text .= "a"; break;
				case '1': $text .= "B"; break;
				case '2': $text .= "3"; break;
				case '3': $text .= "D"; break;
				case '4': $text .= "E"; break;
				case '5': $text .= "F"; break;
				case '6': $text .= "G"; break;
				case '7': $text .= "H"; break;
				case '8': $text .= "i"; break;
				case '9': $text .= "J"; break;
				default: $text .= $key; break;
			}
		}
		
		$text = md5( $text."-".date("YmdHis") );
		
		return $text;
	}
	
	//取得副檔案
	public function getExtension($filename)
	{
		return pathinfo($filename, PATHINFO_EXTENSION);
	}
	
	//取得主檔名
	public function getFileName($filename)
	{
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	
	//取得天氣開放資料
	public function getWeatherOpenData()
	{
		$oXML = "";
		try 
		{
			$this->dataid = "F-C0035-006";
			$ak = "CWB-55AE3EAD-1E8A-45FD-A33E-5185E8DC81BF";
			$link = "http://opendata.cwb.gov.tw/opendataapi?dataid=".$this->dataid."&authorizationkey=".$ak;
			$ch = curl_init();
			
			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, $link);
			curl_setopt($ch, CURLOPT_FAILONERROR,1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);
			//curl_setopt($ch, CURLOPT_HEADER, 1);
			
			// grab URL and pass it to the browser
			$sXML = curl_exec($ch);
			$oXML = new SimpleXMLElement($sXML);
			//$result = new SimpleXMLElement($result);
			// close cURL resource, and free up system resources
			curl_close($ch);
		}
		catch(Exception $e)
		{
			
		}
		return $oXML;
	}
	
}