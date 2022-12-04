# README

## Setting up a Local Development Enviroment with VS Code, XAMPP, and phpMyAdmin
+ This guide provides instructions on how to install and use these tools to create a complete local development environment on your computer. It includes steps for installing the software, running the Apache and MySQL servers, and accessing the database management interface. With these tools, you can easily develop and test your projects on your local machine before deploying them to a live server.

## Installing Software
1. Download and install [VS Code](https://code.visualstudio.com/)
2. Download and install [XAMPP](https://www.apachefriends.org/download.html)
3. Start XAMPP and ensure that the Apache and MySQL modules are running by going to the "Manage Servers" tab and starting both modules.
4. Visit the phpMyAdmin URL to access the database management interface.

## Using the Software
1. Open XAMPP and start the Apache server.
2. In the XAMPP control panel, click the "Explorer" button next to the "HTdocs" folder to open it in your operating system's file explorer.
3. Copy the source code directory into the HTdocs folder.
4. Open VS code and navigate to the source code directory in the HTdocs folder.
5. Use VS code to edit and manage the source code.
6. In a web browser, go to http://localhost/phpmyadmin to access the database management system.
7. In phpMyAdmin, create a new database named "lccc_db".
8. Import the "lccc_db" file into the newly created database.
9. In a web browser, go to http://localhost/[file-location] to access the source code and interact with the database.
 
### VS Code
* Integrated debugging support to help you find and fix errors in your code.
* IntelliSense, which provides smart completions based on variable types, function definitions, and imported modules.
* Git integration, allowing you to easily manage your code repositories and collaborate with others.

### XAMPP
* You can use XAMPP to host your website on a local server, making it easy to test and develop your website before deploying it to a live server.

### phpMyAdmin
* phpMyAdmin allows you to easily manage and maintain your databases, including creating, modifying, and deleting tables and columns, importing and exporting data, and running SQL queries.
* It provides a user-friendly interface, making it easy to use even for beginners.

## Troubleshooting
+ In terms of using XAMPP on a Mac with an M1 chip, you may need to use the Docker version of XAMPP to run it on your system. The regular version of XAMPP may not be compatible with the M1 chip.

## Conclusion
+ By following the steps in this guide, you can set up a complete local development environment on your computer using VS code, XAMPP, and phpMyAdmin. These tools will provide you with everything you need to write, test, and manage your code and databases. With a local development environment, you can easily develop and test your projects without the need for a live server, saving time and resources. Additionally, you can use XAMPP to host your website on a local server for testing and development purposes before deploying it to a live server.
