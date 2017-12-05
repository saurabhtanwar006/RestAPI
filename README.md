# RestAPI
<h> At the end of the API creation you will have the files and folders  in that order</h> 
<p>|─ api/</p>
<p>├─── config/</p>
<p>├────── core.php  – file used for core configuration</p>
<p>├────── database.php – file used for connecting to the database.</p>
<p>├─── objects/</p>
<p>├────── product.php – contains properties and methods for “product” database queries.</p>
<p>├────── category.php – contains properties and methods for “category” database queries.</p>
<p>├─── product/</p>
<p>├────── create.php – file that will accept posted product data to be saved to database.</p>
<p>├────── delete.php – file that will accept a product ID to delete a database record.</p>
<p>├────── read.php – file that will output JSON data based from “products” database records.</p>
<p>├────── read_paging.php – file that will output “products” JSON data with pagination.</p>
<p>├────── read_one.php – file that will accept product ID to read a record from the database.</p>
<p>├────── update.php – file that will accept a product ID to update a database record.</p>
<p>├────── search.php – file that will accept keywords parameter to search “products” database.</p>
<p>├─── category/</p>
<p>├────── read.php – file that will output JSON data based from “categories” database records.</p>
<p>├─── shared/</p>
<p>├────── utilities.php – file that will return pagination array.</p>

<u>Steps to follow</u>
<pre><B>1.0 setup the database </B> 
        1.1 Using PhpMyAdmin, create a new “api_db” database. Yes, “api_db” is the database name. Afterthat, 
            run the  SQL queries to create new tables with sample data. create table name as Truck and add three 
            column to it number,lon , lan representing the truck no. , longitude and latitude.
        1.2 now since the file given is csv file hence add the file by following these steps:-
              1.2.1  go to import option in myphpadmin on your browser and go to import option and 
                    add "csv" file from your computer.
              1.2.2 and further below choose csv load from data this sort of option from drop down menu .
              1.2.3 choose the column as , separated and each row or next line by | as i have modified the csv 
              file data by putting | to end of each row.
              1.2.4 now choose number,lon , lat in attributes and GO.
         
         NOW YOUR DATA IS ENTERED NOW YOU NEED TO CONNECT TO DATABASE.
         
        1.3 Connect to database
            Create “config” folder. Open that folder and create “database.php” file. and put code inside it.
   <B>2.0 read Trucks</B>
        2.1 Create “objects” folder. Open that folder and create “truck.php” file.
            this truck class file will contain all the function and operation which you want to perform .
        2.2 Create “read.php” file
            Create “product” folder. Open that folder and create “read.php” file.
        2.3 Add Product “read()” method.
            Open “objects” folder. Open “product.php” file. The code on the previous section will not work without 
            the following code in “product.php” file. Add the following method inside the “Product” class.
        2.4 output 
            If you develop on localhost and will run the read.php file using this URL:http://127.0.0.1/api/trucks/read.php
            it will show you all data
          
        By the way, I’m using a Chrome extension called JSONView to make the JSON data readable in the browser.
        
    <B>3.0 create truck </B>
          3.1 Create create.php file
              Open “trucks” folder. Create a new “create.php” file. 
          3.2 5.2 Product create() method
              Open “objects” folder. Open “truck.php” file. The previous section will not work without the following code 
              inside that “truck.php” file.
              "" CREATE METHOD "". SEE inside the truck.php file.
   
    <B>4.0 read one truck</B>
        6.1 Create read_one.php file
            Open “trucks” folder. Create new “read_one.php” file.
            add readone method again to truck.php class as same as we put create method of create.php file.
        6.2 ouptut 
            If you develop on localhost and will run the read_one.php file using this  
            Read one entry
            URL:  http://127.0.0.1/api/trucks/read_one.php?number=19976
    <B>5.0 Add data</B>
        5.1 If you develop on localhost and will run the  create.php you will be able to add data using 
          url :  http://127.0.0.1/api/trucks/create.php?number=11111&lon=-9.3&lat=-2.5
          here number is what you want to add with its latitude and longitude. 
   
   <B>6.0 paginate trucks</B>
        6.1 Create “read_paging.php” file
            On the /api/trucks/ folder, create “read_paging.php” file
        6.2 Create “core.php” file
            This file holds our core configuration like the home URL and pagination variables.
            Open the “config” folder and create “core.php” file. Open “core.php” file .
    <B>7.0 file that will return pagination array.</B>
        7.1 Go to shared folder and make utilities.php – file that will return pagination array.
 </pre>
   
   

