# README

# Overview
The LCCC (Liquid Chromatography under Critical Conditions) web project was developed by the Chemistry department at the University of Memphis. The project involves hosting a database of research experiments from use of LCCC techniques to analyze complex mixtures and provide detailed information about their components. This document provides instructions on how to install and use the necessary software to run the LCCC project on your local machine.

## Setting up a Local Development Enviroment with VS Code, XAMPP, and phpMyAdmin
This guide provides instructions on how to install and use these tools to create a complete local development environment on your computer. It includes steps for installing the software, running the Apache and MySQL servers, and accessing the database management interface. With these tools, you can easily develop and test this web application on your local machine.

## Installing Software
1. Download and install [VS Code](https://code.visualstudio.com/){
2. Download and install [XAMPP](https://www.apachefriends.org/download.html)
3. Start XAMPP and ensure that the Apache and MySQL modules are running by going to the "Manage Servers" tab and starting both modules.
4. Visit the phpMyAdmin URL to access the database management interface.

## Using the Software
1. Open XAMPP and start the Apache and MySQL servers.
2. In the XAMPP folder, locate "htdocs" folder and create a few folder.
3. Copy the GitHub source code directory into the HTdocs newly created folder.
4. Open VS code and navigate to the source code directory in the HTdocs folder.
5. In a web browser, go to http://localhost/phpmyadmin to access the database management system.
6. In phpMyAdmin, create a new database named "lccc_db".
7. Import the "lccc_db" file into the newly created database.
8. In a web browser, go to http://localhost/[page-name] to access LCCC web application on your browser.
9. Navigate through **http://localhost/[newly-created-file-name]/LLC/web-dev/app/views/[page-name].php** to render the files in the **app/views** path.
 
Note: replace "[newly-created-file-name]" with the actual name of the folder you created in the HTdocs directory, and replace "[page-name]" with the name of the page you want to access.
 
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
By following the steps in this guide, you can set up a complete local development environment on your computer using VS code, XAMPP, and phpMyAdmin. These tools will provide you with everything you need to write, test, and manage your code and databases. With a local development environment, you can easily develop and test your projects without the need for a live server, saving time and resources. Additionally, you can use XAMPP to host your website on a local server for testing and development purposes before deploying it to a live server.
