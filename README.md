# Wikitongues.org

## Getting Started

### Technologies

Wikitongues.org runs on Wordpress. To set up your local environment and start contributing, you'll need to be familiar with the following:

* The Wordpress CMS
* The distinction between Wordpress themes, plugins, and core 
* PHP
* JavaScript
* HTML/CSS
* [Stylus](http://stylus-lang.com/), a CSS preprocessor

### Theme Structure and Supporting Plugins

* The Wikitongues.org theme is based on the [HTML5 Blank Boilerplate Theme](http://html5blank.com/). 
* It leverages the [Advanced Customs Fields](https://www.advancedcustomfields.com/) and [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) plugins.
* It has the following directories:
	* **components**, for repeating design elements, such as page banners and other content modules;  
	* **stylus**, for stylus templates;
		* **require**, for page-specific templates;
	* **img**, for image assets;
	* **js**, for JavaScript files; and
	* **languages**, for localization files.
* All page-specific stylus templates are loaded in *app.styl*, which is located in the root of the /**stylus** directory.
* *app.styl* is loaded in *style.css*, which is located in the theme root.
* Most pages on Wikitongues.org use custom page templates, which are stored in the theme root.
* Design elements in **/components** have content variables that can be defined differently each time that element is used.

### Set-up Instructions

#### Working Environment

Your local environment will need to run PHP, Apache, and MySQL. There are several out-of-the-box solutions, such as [MAMP](https://www.mamp.info/en/) for Mac, [WAMP](http://www.wampserver.com/en/) for Windows, and [LAMP](http://www.ampps.com/LAMP) for Linux. 

Make sure you've installed [Stylus](http://stylus-lang.com/) on your computer, too.

#### Installation

* Either through the command line or in phpMyAdmin, create a blank database for the site. Name it whatever you want.
* Create a directory on your local server to load the site files. Name it whatever you want. *Example: if you're using MAMP, create a **Wikitongues** directory in **htdocs**.*
* Download our [staging Wordpress instance](https://www.dropbox.com/s/ga8a4e3dpflb5ee/20190117_wikitonguesorg_3a6523231de2ae8c5964_20190202213241_archive.zip?dl=0) and our [installer.php](https://www.dropbox.com/s/epcm39benyhhdeq/installer.php?dl=0) file. Move them to the directory you just created. **The instance will be a .zip file. Do not extract it.** 
* Run your local server, open the browser of your choice, and navigate to installer.php. The URL will depend on your setup. *For example, if using MAMP to run the site from a **wikitongues** directory, you might navigate to **http://localhost:8888/wikitongues/installer.php***
* Follow the on-screen installer instructions to extract the site files and connect to your database.
* Once your installation is complete, use the command line to navigate to your Wordpress installation's **themes** directory:

	```bash
	$ cd your-local-directory/wp-content/themes
	```
* Delete the existing Wikitongues theme and clone this repository in its place:

	```bash
	$ rm -rf wikitongues
	```

	If you're cloning with SSH:
	```bash
	$ git clone git@github.com:wikitongues/wikitongues-website.git
	```

	If you're cloning with HTTPS:
	```bash
	$ git clone https://github.com/wikitongues/wikitongues-website.git
	```
* This will clone the repository into a **wikitongues-website** directory in your themes folder. Rename that **wikitongues**.
	
	```bash
	$ mv wikitongues-website wikitongues
	```

That's it! You're all set.

## Roadmap

### Early Post-Launch Features

- [ ] Global: Apply depth layers through element box-shadows
- [ ] Global: Assess new tab standards for external links
- [ ] Global: Fade-in images on page load
- [ ] Global: Redirect template for deprecated links (i.e., "/who")
- [ ] Global: Add Google analytics
- [ ] Homepage: Add GreenGeeks affiliate link
- [ ] Homepage: "Wikitongues In the Press" section
- [ ] Homepage: Increase featured videos to six
- [ ] Homepage: Click-through horizontal scroll for featured videos
- [ ] Projects: Build sub-navigation
- [ ] Partners: Build
- [ ] Contact: Build
- [ ] Donors: Kickstarter Wall
- [ ] Donors: Lifetime contributions section
- [ ] Donate: Improved typography on donate templates

### Code Clean-Up

- [ ] CSS consolidation
- [ ] Backward compatibility standards assessment
- [ ] Class standards assement and implementation (BEM?)
- [ ] jQuery to Vanilla migration
- [ ] Remove unnecessary HTML5 Blank code from functions.php
- [ ] Update theme name, thumbnail, and copyright information

### Improve Forms

- [ ] Progress bar on submission form
- [ ] Add "Download form" feature to Video Submission page
- [ ] Integrate volunteer sign up with Google Forms

### Archive

- [ ] Video post-type single template
- [ ] Video post-type archive page
- [ ] Video archive brosing functionality
- [ ] Search feature

### SEO Sharing

- [ ] SEO audit
- [ ] Add meta sharing content control to CMS

### Content Strategy

- [ ] Projects: Assess Poly
- [ ] About: Add images, media
- [ ] Volunteers: reorder volunteers
- [ ] Volunteers: complete headshots
- [ ] Donate: assess flow
- [ ] Donate: design narrative templates

### Donations

- [ ] Built donate pop-up window

### Meta

- [ ] Press Kit page
- [ ] Wikitongues in the press page
- [ ] Stats and reporting page

### Accessibility audit

*Audit will determine project steps and timeline*