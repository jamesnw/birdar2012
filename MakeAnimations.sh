#!/bin/bash

	#BIRDAR MakeAnimations.sh
	#BIRDAR: visualizing nocturnal bird migration using Weather Service Radar
	#shell script to automatically download radar and create animated .gif images
	#shell script written by James Stuckey Weber jamesnw@gmail.com and edited by David La Puma david@woodcreeper.com
	#DEPENDENCIES: birdar.php, birdar_downloads.php (both written by Mike Mills michaelmills7@gmail.com and edited by Andrew Weber ajw5179@psu.edu and James Stuckey Weber). ImageMagick (http://www.imagemagick.org/script/index.php)

#change the value below to set the time delay between animation frames
theDelay="40" 
#the variable below ariable is used to add the date to the final animation file to be saved
theDate=`date +%m%d` 
#the variable below is the search string used for selecting which images to be used in the animation. 
#All images with the current date will be used in the animation. If you instead want to animate all images in the folder, you can 
#remove this from the paths below and simply use the wildcard "*"
theDateStamp=`date +%y%m%d` 

echo -n "Download New Images? y/n: "
read -e RESPONSE
echo -n $RESONSE
if [ "$RESPONSE" = "y" ]; then
	php ~/Documents/MyWebsites/woodcreeper/nightly_spring2012/birdar.php	#<-- edit this path to reflect the location of your birdar.php file
fi


#now we invoke ImageMagick to create the animations.
#the format is as follows: convert -delay $theDelay ~/path/to/radar/data/state/station/product/$theDateStamp*.png ~/path/to/animation/storage/directory/STATE-STATION-product-$theDate.gif
#just change the paths below to point to the correct paths on your system and add copy/paste the lines to add radar stations
convert -delay $theDelay ~/home/user/websites/radar/nj/kdix/br/$theDateStamp*.png -layers Optimize ~/home/user/websites/radar/animations/NJ-KDIX-br-$theDate.gif 
convert -delay $theDelay ~/home/user/websites/radar/nj/kdix/br/$theDateStamp*.png -layers Optimize ~/home/user/websites/radar/animations/NJ-KDIX-bv-$theDate.gif

convert -delay $theDelay ~/home/user/websites/radar/de/kdox/br/$theDateStamp*.png -layers Optimize ~/home/user/websites/radar/animations/NJ-KDOX-br-$theDate.gif 
convert -delay $theDelay ~/home/user/websites/radar/de/kdox/br/$theDateStamp*.png -layers Optimize ~/home/user/websites/radar/animations/NJ-KDOX-bv-$theDate.gif

