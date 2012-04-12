<?php

/*
 //BIRDAR NEXRAD download script
 //BIRDAR: visualizing nocturnal bird migration using Weather Service Radar
 //By Michael Mills michaelmills7@gmail.com
 //BIRDAR.org
 //Last Update: 4/10/12
 
 // BIRDAR Download Configuration

 // this controls which files are to be downloaded

  EXAMPLE //
 {
   "name":"La Crosse, WI",					-> not used just yet.. a simple name",
   "state":"WI",						 	-> state abbreviation also the folder name 
   "radar_station":"KMPX", 				 	-> station abbreviation, also the folder name
   "radar_products":["bref1","vel1"]	 	-> a list of products you want for the station
 }

 // everything is defined in a ARRAY [ ] of OBJECTS { }, 
 // where each OBJECT is a station with specific values: name, state, radar_station, and products

*/

/* Edit the file below to include only the radars for which you want to download data */

$nightly_downloads = '[
 {
    "name":"La Crosse, WI",
    "state":"WI",
    "radar_station":"KARX",
	"radar_products":["bref1","vel1"]
 },
 {
    "name":"Milwaukee, WI",
    "state":"WI",
    "radar_station":"KMKX",
	"radar_products":["bref1","vel1"]
 },
 {
    "name":"Green Bay, WI",
    "state":"WI",
    "radar_station":"KGRB",
	"radar_products":["bref1","vel1"]
 },
 {
    "name":"Fort Dix, NJ",
    "state":"NJ",
    "radar_station":"KDIX",
	"radar_products":["bref1","vel1"]
 },
 {
 	"name":"Dover, DE",
	"state":"DE",
	"radar_station":"KDOX",
	"radar_products":["bref1","vel1"]
 },
 {
    "name":"Key West, FL",
    "state":"FL",
    "radar_station":"KBYX",
	"radar_products":["bref1","vel1"]
 },
 {
 	"name":"Miami, FL",
	"state":"FL",
	"radar_station":"KAMX",
	"radar_products":["bref1","vel1"]
 },
  {
 	"name":"Duluth, MN",
	"state":"MN",
	"radar_station":"KDLH",
	"radar_products":["bref1","vel1"]
 },
  {
 	"name":"Chicago, IL",
	"state":"IL",
	"radar_station":"KLOT",
	"radar_products":["bref1","vel1"]
 },
  {
 	"name":"Davenport, IA",
	"state":"IA",
	"radar_station":"KDVN",
	"radar_products":["bref1","vel1"]
 }
]';
?>