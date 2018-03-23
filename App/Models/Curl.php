<?php
namespace App\Models;

class Curl{
	
	private $curl;
	
	public function __construct()
	{ 
		$this->curl = app()->make(\Curl\Curl::class);
		$this->curl->setUserAgent("Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:52.9) Gecko/20100101 Goanna/3.4 Firefox/52.9 PaleMoon/27.8.1");
		$this->curl->setReferrer('https://google.com.ua');
		$this->curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
		$this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
	}
	
	public function get($url)
	{
		$this->curl->get($url);
		return $this->curl->response;
	}
	
	public function __destruct()
	{
		$this->curl->close();
	}
	
	public function error()
	{
		return $this->curl->error;
	}
	
	public function printErrorMessage()
	{
		echo  'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "<br />";
	}
}