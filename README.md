##Description
The project uses the MVC architecture. 

##Instructions
The agent needs to register first. Once registration completed, the agent needs to sign in in order to have the required token for a specified amount of time available. 
The agent cam do a number of requests for a number  of actions such as creating products, getting the products, viewing the tickets assigned to him and reply to them, etc. 

##Dependicies 
Using composer Altorouter is installed to handle routing. psr-4 autoloader is used to autoload files.

##Apache configuration on localhost
The virtual host apache configuration for the project is as follows:

![image](https://github.com/heyrya/kahuna-app-api/assets/3865985/72203548-2d91-406b-98d7-301a1319b667)

Postman is used as the testing environment for the API. All the requests made could be found in the support directory. 
All responses for the API are in JSON format.

MySQL is the DBMS used for this project to store and query data from.
