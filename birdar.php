<?
/*
//BIRDAR NEXRAD download script
//BIRDAR: visualizing nocturnal bird migration using Weather Service Radar
//By Michael Mills michaelmills7@gmail.com augmented by Drew and James Weber jamesnw@gmail.com and edited by David La Puma david@woodcreeper.com
//BIRDAR.org
//Last Update: 4/11/12
*/

<?

// Change this to the path of your nightly folder where the downloaded images go
$path_root = "/path/to/your/nightly/radar/folder";

require_once 'birdar_downloads.php';

$nightly = json_decode($nightly_downloads,true);

// future expansion where we can have a configuration file
$image_settings = array(
 "background" => array("bkgr"=>"black"),
 "duration" => array("duration"=>"10")
);

$image_folders= array("bref1"=>"br","vel1"=>"bv");

//$request_base = "http://weather.aero/data/radar/nws_nids";
$request_base = "http://weather.rap.ucar.edu/radar/displayRad.php?";

// loop through all elements in the downloads objects and build request objects (HTTP Requests to the approproate URL)
// example --> http://weather.rap.ucar.edu/radar/displayRad.php?icao=KMPX&prod=bref1&bkgr=black&duration=8

$count = 0;
$request_objects = array();

$log_out = "BirDAR script initiated at " . @date("r") . "\n";
$log_line = 1;

foreach($nightly as $pos => $ary){
	
	foreach($ary as $n_n => $n_v){
		
		// get station
		$r_station = $nightly[$pos]["radar_station"];
		$r_state = $nightly[$pos]["state"];
		
		if($n_n == "radar_products"){				
			foreach($ary[$n_n] as $product){
				//$request_full = $request_base . "/" . $product . "/" . $r_station ;
				$request_full = $request_base . "icao=" . $r_station . "&prod=" . $product . "&bkgr=black&duration=10";
				
				$log_out .=  $log_line++ . "). Requesting radar at " . $request_full . ".\n";
				
				$response = file_get_contents($request_full);
				
				// document was not well formed, so DOMDocument capabilites were not working. had to hack it by searching for string surrounds
				$step1 = explode('<PARAM name="filenames" value="',$response);
				$step2 = explode('">', $step1[1]);
				$filesnames = explode(",", $step2[0]);

// now download each file and put it in the appropriate folder
$i = 1;
foreach($filesnames as $filename){
if(strlen($filename)>3) {
// EDIT THE VALUE BELOW to reflect the nth image you wish to download. Default is 4th, hence the 4
if($i % 4 === 0) {

// get image filename
$image = explode("/",$filename);
$image = $image[count($image)-1];

//$image_save = $path_root . "/" . $r_state . "/" . $r_station . "/" . $product . "/" . $image;

$image_save = $path_root . "/" . $r_state . "/" . $r_station . "/" . $image_folders[$product] . "/" . $image;

$log_out .= $log_line++ . "). Downloading radar at " . $filename . "...... ";

// now download file.. permissions and the folder structure should exist for all combinations of state - station - product

file_put_contents($image_save, file_get_contents($filename));

$log_out .= " SUCCESS.\n";
$log_out .= $log_line++ . "Image saved to " . $image_save . "\n";

}
$i++;
}
else{
$log_out .= $log_line++ . "). No $product images for $r_station were listed... continuing... \n";

}
}

// increment position in objects array
				$count++;
			}
		}
	}
}

echo $log_out;

?>