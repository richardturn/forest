To serve the application you can use  the below command in the route. 

php artisan serve 

To run style fix you can run
./vendor/bin/pint

To run test
php artisan test

to build the assets

npm run dev
or 
npm run build


I pulled the forest as a distinct from the table, you can then either click the unit id, to view detailed information on the unit. 
or you can click the forest name, which will detail all forest fires in that location. 

I have an additional controller located at /native_php, this is just to show connecting and getting the data from the native PDO application. 
This also shows custom pagination. 



Changes
I would make the following changes if i was doing this in a real life project rather than a prototype:

* I would import and parse the forests in its own forest table, would then make a model and relationship accordingly. 
* Link up with google maps using the long and lat to display the location on a map of the fire.
* Add ability to export fire data.
* Add filtering on the fire table so this can be further filtered on items such as discovery date, cause etc. 
* 