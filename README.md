# concert-tracker
A web-based PHP solution to tracking concerts you've attended and artists you want to see. *Now with multiuser support!*

Allows for simple management of artists and concerts for multiple users, along with the ability to import and export their own data.

# Dependencies
* A web server with PHP support
* PostgreSQL or MySQL (Others may work, these are the only ones tested)

# Installation
The recommended installation is fairly straightforward:

1. Create a database role and a database that that role has full access to.
2. Extract the source to the web server, and point a virtual host to the concert-tracker root.
3. Navigate to the system in a web browser, and run the installation script using the database info from earlier.

At this point, the system should be fully operational.

# Bugs
#### *Testing? What's that?*
But seriously, I tried my best to test it out and make sure the system generally works. However, I can't catch them all, and I didn't put nearly enough time into error handling.

If you find any bugs, please [report them](https://github.com/Erdubya/concert-tracker/issues) and I'll see what I can do.
