# Mexico Zip Codes Search - Laravel (Lumen)

## Introducion
I started looking for Mexico Zip Codes API in Google and try to use Google GeoCode API, but all API's I tested (including Google GeoCode API) not return me the all data your API return or isn't free. After that I think to create an API that use your API, but I thought it isn't what you want. So I think in populate a database with all Mexico zip codes data and provide an own API for it. 

## How did I make it
I created a webscrapper using JQuery and run in console of the website https://codigo-postal.co/en-us/mexico/ getting all zip codes data, saving as json files and use it to populate my database.

The json files are in a folder called json_files inside public and in root I saved a SQL file and the webscrapper script that I created.