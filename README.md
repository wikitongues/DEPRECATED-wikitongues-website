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
* Design elements in **/components** have content variables that can be defined differently each time that element is loaded in a telement.

### Set-up Instructions

*Coming soon*

## Roadmap

### Early Post-Launch Features

- [ ] Global: Apply depth layers through element box-shadows
- [ ] Global: Assess new tab standards for external links
- [ ] Global: Fade-in images on page load
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