# HTML5up Eventually Theme for Wordpress

-----
*If this kind of stuff has any value, please consider supporting me so I can do more!*

[![Support me on Patreon](http://cogdog.github.io/images/badge-patreon.png)](https://patreon.com/cogdog) [![Support me on via PayPal](http://cogdog.github.io/images/badge-paypal.png)](https://paypal.me/cogdog)

----- 


A configurable Wordpress Theme version of [HTML5up Eventually Theme](https://html5up.net/eventually) made for the internet by [@cogdog](http://cog.dog). It creates a simple, elegant calling card site, something that looks like

![Screenshot of Theme](screenshot.png "Screenshot of Eventually Theme")

where the background has a subtle sliding slide show of images. While this feature is hardcoded into the HTML5up theme's javascript files, in the WordPress version images are drawn from the pool of uploaded header images.

With the use of the optional [FontAwesome For Menus 5 plugin](http://github.com/cogdog/font-awesome-5-menus) (also by me), you can create a menu of social media links in the footer.

The front page content is drawn from the latest post, so a site could ride with just that, or a series of posts could be used to change up the front (a possible future feature would allow navigation or random selection of the front). For now, static Pages can be created, and manually linked from the front.

## Installing from Scratch

Install this theme on any self hosted Wordpress site. You cannot do this on Wordpress.com, get a real web hosting package.

You should download a ZIP file of this GitHub Repo (that's via the green **Clone or Download*" button above as a file `wp-eventually-master.zip`). 

The zip can be uploaded directly to your site via Add Themes in the Wordpress dashboard. Of you run into size upload limits or just prefer going old school like me, unzip the package and ftp the entire folder into your `wp-content/themes` directory.

## Updating the Theme

If you have ftp/sftp access to your site (or this can be done in a cpanel file manager), simply upload the new theme files to the `wp-content/themes` directory that includes the older version theme. 

For those that lack direct file upload access or maybe that idea sends shivers down the spine, upload and activate the [Easy Theme and Plugin Upgrades](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/) plugin -- this will allow you to upload a newer version of a theme as a ZIP archive, the same way you add a theme by uploading.


## Customizing with the Customizer

(coming soon)

### Social Media Icons

To have a customized set of icon links on the front of the site, download, install and activate the [Font Awesome 5 Menus](https://github.com/cogdog/font-awesome-5-menus) plugin. This allows you to add an icon to any menu item.

From the Wordpress Dashboard look under **Appearances** for **Menus**. Click **create a new menu**  name it whatever you like -- `social` is  a good choice. Under  **Menu Settings** next to **Display Location** check the box for `Social Media`. 

To add a social media (or any link), open the panel for **Custom Link**. 

![](images/add-custom-link.jpg "Adding Menu Items Links")

Enter a title for the site and provide the URL that points to your content on that site. Add as many as you like. You can drag and drop them to change the order.

To set the icon, you must first enable the visibility of CSS classes for each menu item.  Click **Screen Options** in the upper right, and check the box for **CSS Classes**.

![](images/screen-options.jpg "Enabling screen options for menus")

Open an item in your Social Menu and you will now see a field for entering CSS Class names. You have the choice to add from [well over 1400 icons in the Font Awesome free collection](https://fontawesome.com/icons?d=gallery&m=free). Find the name of the icon you wish to use, and enter it's all of it's class names as listed,

For example these are the class names to render the icon for typical social media sites (these should be all lower case):

* fab fa-twitter
* fab fa-facebook
* fab fa-youtube
* fab fa-linkedin
* fab fa-instagram
* fab fa-flickr

With the Font Awesome icons, you can add any site you wish to be represented on the front page and pick the icon you prefer.

**Save** your menu and check out the spiffy icons up front. 


## Suggested Plugins

* [Font Awesome 5 Menus](https://github.com/cogdog/font-awesome-5-menus) used to add the icons to the social media links below the tag line
* [Easy Theme and Plugin Upgrades](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/) allows you to update the theme by uploading the zip file again as a new server (because wordpress does not provide this capability)


## Features / History

* First release

### Requests

* *You tell me* Fork and edit to suggest features or [toss them into the Issues bin](https://github.com/cogdog/wp-eventually/issues)

 