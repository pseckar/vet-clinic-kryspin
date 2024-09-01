# Veterina U Kryšpína - Website source code

## About

This repository contains source for official webpage of a veterinary clinic "U Kryšpína". It is a responsive single-page landing website containing mostly static information about the clinic (opening hours, staff, services, equipment, contact information). It provides a simple admin interface for configuring a simple information messages to be displayed on the page to inform clients about news or warn them about changes.

The repo is forked from the StartBootstrap's templete [Agency](https://startbootstrap.com/theme/agency).

## Preview

Production version can be found at [veterinahlinsko.cz](https://www.veterinahlinsko.cz).

[![Agency Preview](/web-preview.png)](https://www.veterinahlinsko.cz)

## TODO list

- height of the map - set min value
- names in front of photos (for mobile) X
- optimize images and web (pagespeed.web.dev)
- proper error display of unsuccessful login
- buttons to go down and to the top
- js for getting actual year
- readme with live link, responsive design examples X
- fix transparent menu on tablet X
- center petexpert logo X
- team and clinic padding not on mobile X
- forbid save of photos X

## Usage

After downloading, simply edit the HTML and CSS files included with `dist` directory. To preview the changes you make to the code, you can open the `index.html` file in your web browser.

### PHP Server

To run the PHP backend scripts, you will need a PHP server. For development purposes you can use for example XAMPP.

### Creating user database

To access admin interface, you need to create an user in the database file `user.json` (see `user.json.example`). To generate a password hash, use `create_hashed_password.php` (change the `plainPassword` variable to your desired password).

## Contributing

When contributing, branch out of master. When changes are ready, create Pull request. With each new change (PR) increment the version in the `index.html` footer. After merge, the commit should be tagged and new release created.

## Copyright and License

Copyright 2024 Petr Sečkář. Code released under the [MIT](https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE) license.
