<?php
namespace App\Controllers;

use \Sunra\PhpSimple\HtmlDomParser;

class CurlController extends \Core\Controller
{
	public function currency()
	{
        $curl = app()->make(\App\Models\Curl::class);
		$dom = HtmlDomParser::str_get_html($curl->get('https://crb-dnr.ru/'));
		$usd = $dom->find('div[class=views-field views-field-field-off-curs-usd]  div.field-content', 0)->innertext;
		$eur = $dom->find('div[class=views-field views-field-field-off-curs-eur]  div.field-content', 0)->innertext;
		$uah = $dom->find('div[class=views-field views-field-field-off-curs-uah]  div.field-content', 0)->innertext;
		if ($curl->error()) {
 		   	   $curl->printErrorMessage();
		} else {
				echo $this->blade->render("currency", ["message" => "Работа с cURL", "usd" => $usd, "eur" => $eur, "uah" => $uah]);
		}
	}

	public function countries($letter = 'А')
	{
		$countries2 = []; $i = 0;
		$curl = app()->make(\App\Models\Curl::class);
		$dom = HtmlDomParser::str_get_html($curl->get("https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%B3%D0%BE%D1%81%D1%83%D0%B4%D0%B0%D1%80%D1%81%D1%82%D0%B2"));
		if(is_object($dom)){
			$countries = $dom->find('span.flagicon a[title]');
			foreach ($countries as $country)
			{
				if(strpos($country->title, $letter) === 0) //название страны начинается с буквы-параметра
				{
					$countries2[$i]["name"] = $country->title;
					$countries2[$i]["country_href"] = 'https://ru.wikipedia.org' . $country->href;
					$countries2[$i]["flag_img_src"] = $country->find('img.thumbborder',0)->src;
					$dom = HtmlDomParser::str_get_html($curl->get($countries2[$i]["country_href"]));
					if(is_object($dom)){
						$countries2[$i]["country_img_src"] = $dom->find('table.infobox span.no-wikidata a.image img',0)->src;	
					}
					$i++;
				}
			}
		}
		if ($curl->error()) {
 		   	   $curl->printErrorMessage();
		} else {
				echo $this->blade->render("countries", ["message" => "Список стран с википедии", "countries" => $countries2]);
		}
	}
}