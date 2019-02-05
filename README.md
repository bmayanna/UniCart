# Unicart

## INSTALLATION

### This application is run on EasyPHP.This web server solution package is installed using the following steps.
* Go to http://www.easyphp.org/
* Click the button "Download Devserver 17.0" for windows 7/8/10
* Download starts automatically 
* select an installation folder and follow the instructions
* Post installation a shortcut to Devserver is created on your desktop 

## RUNNING THE APPLICATION

* The EasyPHP directory will consist of a folder eds-www
* Unzip the project folder and copy the contents to this folder.
* Create a database named "unicart" and import the database submitted to blackboard.
* Launch EasyPHP and start all servers.
* Launch localhost in a browser to start the application.

## WORKING FLOW OF THE APPLICATION

* Home page appears when the localhost is loaded.
* There are options to register or login on top-right corner of the page
* While registering. You have to fill out all details like address and phone number
* You can login using the credentials given
* There is a profile page to view the logged in user's profile information
* In the home page as you scroll down you can view all the items in sale (buy,bid or rent) 
* When you click on an item it takes you to a page that gives the complete details of the product
* On clicking "Buy now" it takes you to the checkout page, where the buyer details also appears here
* On clicking "Buy now" it navigates to the PayPal gateway where the following sandbox credentials should be used
        Username: unicart.ip@gmail.com 
			  Password: ip.unicart
* A sandbox transaction happens and goes to the payment receipt page
* On clicking "Return to Merchant" it goes to a page where the seller's detail along with the location are revealed
* To go back to the homepage "Home" button on top-right corner is clicked
