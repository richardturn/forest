# Forest Fire App

### Summary
The application assumes the sqlite database is located in the database folder. Upon connecting, I take a distinct of the NWCG_REPORTING_AGENCY, NWCG_REPORTING_UNIT_ID and NWCG_REPORTING_UNIT_NAME, as well as the 
count of the number of fires. I paginate this data and then use it to display all unique forests for the main index. 

I have added a show for the agency, which takes the unit id and connects to the NWCG_UnitIDActive_20170109 to return additional information of the Unit, this has been added as a model.
I have also added a link from the forest to list the fires, I have created this as the Fire model.

The max container width has been limited to 800px.

In addition to the above, I have also added a route located at /native_php, this works the same as the main index, but it uses the default PDO connector and also manual pagination using skip and limit.

The models have had to be overridden to point to the correct table and the correct primary key, normally this wouldnt be required when following the Laravel naming convention.

In the AppServiceProvider.php, I have added some Blade Directives, this means that when using things like numbers and dates, you can use the directive to display them in the correct format. 



### Commands
To serve the application you can use  the below command in the base directory. 

    php artisan serve 

To run style fix you can run the following command, which will check agains the base Laravel styling and automatically fix.

    ./vendor/bin/pint

To build the assets, you can run the below for development 

    npm run dev

Or you can run the following for production

    npm run build

### Production CHanges / Additional Functionality
If i was to do this as a production application, I would do the following additional features or changes:

#### New table structure
When working with the data, I would have parse and store the data into multiple tables:
    * Forests - This will be all the forest information.
    * Fire - Which will be all the fire information with the forest id
    * Unit - Which will be all Agency Units
    * Agency - All information on the Agencys
The above will allow me to create individual models for the data, and then link them together using relationships. This should allow us to optimise the speed.

For example, the above would mean the index would become

    public function index(): View
    {
        $forests = Forest->paginate(15);

        return view('home')
            ->with('forests', $forests);
    }
Which will return all non deleted forests, and will be indexed to increase speed. 

The fires index will then become

    public function show(Forest $forest): View
    {
        $fires = $forest->fire()->paginate(15);

        return view('forest.show')
            ->with('fires', $fires);
    }
This again will be indexed and will speed up laoding speed.

#### Additional Functionality
* Link up with google maps using the longitude and latitude to display the location on a map of the fire location.
* Add ability to export fire data to Excel, for dealing with additional data reporting.
* Add filtering on the fire table so this can be further filtered on items such as discovery date, cause etc. 
* Add a dashboard for each forest that will show a summary of information like number of fires through the last year, statistics on cause, this will allow
the users to find statistical information easier.
* I would also add factories and tests to the application, the reason they werent currently added was due to the way the database is currently structured, it was difficult to write
factories. For example, Forests are technically in the fire table rather than an individual table, so the factory would have to create a full fire table.