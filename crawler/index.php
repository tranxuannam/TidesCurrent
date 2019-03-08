<?php

//crawl_page('http://tides.mobilegeographics.com/index.html', "abc.txt", 5);
//crawl_page('http://tides.mobilegeographics.com/calendar/year/100.html?y=2018&m=1&d=1', "100.txt", 50);

function crawler_page($filename, $year)
{
	$curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, "https://tides.mobilegeographics.com/calendar/year/$filename.html?y=$year&m=1&d=1");
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = curl_exec($curlSession);
	file_put_contents("2019/".$filename."_".$year.".html", $jsonData, FILE_APPEND);
    curl_close($curlSession);
}
for($j=2019; $j<=2019; $j++)
{
	for ($i=9096; $i<=9123; $i++)
	{
		crawler_page($i, $j);
	}
}
?>
