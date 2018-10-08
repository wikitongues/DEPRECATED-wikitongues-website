# Wikitongues Developer Notes

## Post types
 * YouTube videos. These should sync with YouTube: http://preview.codecanyon.net/item/youtube-videos-to-wordpress-posts/full_screen_preview/12836753. (Is this worth it?)
 * Initiatives. Perhaps better called projects?
 * General news/blog. These should sync with Medium: https://www.youtube.com/watch?v=UieR0WvlFoo.
 * Partners.
 * Members, to be separated by leadership and volunteers categories.

## Custom templates
 * front page
 * initiatives
 * partners
 * leadership
 * community
 * donors
 * about?

## Development Map

### v0

- [x] Standard post types
- [x] Template structures
- [ ] Template basic styles
- [ ] Template graphic elements
- [x] Donorbox integration: https://donorbox.org/pricing/
- [x] Integration with YouTube (i.e., recent videos)
- [x] Integration with Medium (i.e., recent news)
- [ ] Mobile styles

- [ ] transifex live integration (including published translations)

### v1 - LIVE

- [ ] sync all contributors with community page - can we automate this?

#### v1.1

- [ ] partners detail view: https://tympanus.net/codrops/2013/03/19/thumbnail-grid-with-expanding-preview/
- [ ] progress bar for submission form
- [ ] add pagination -- or lazy load? -- to volunteers scroll
- [ ] automate volunteer activity tracking
- [ ] separate donors from other members with their own unique post type


# [HTML5 Blank]

This theme is built on HTML5 Blank (https://github.com/toddmotto/html5blank).

## Features

### HTML5
* Basic Semantic HTML5 Markup
* W3C Valid Code Foundations
* Responsive Ready, ViewPort meta data
* HTML Class support for IE7, IE8, IE9 Conditionals (HTML5 Boilerplate)
* Clean, neatly organised code, with PHP annotations

### jQuery + JavaScript
* Replaced built-in WordPress enqueue with Google CDN
* Protocol relative jQuery if Google CDN offline (HTML5 Boilerplate)
* Conditionizr for cross-platform/device detects and enhancements
* Modernizr feature detection, HTML5 element support for legacy, progressive enhancement (HTML5 Boilerplate)
* DOM Ready JavaScript file setup (scripts.js) for instant JavaScript development
* JavaScript files enqueued using WordPress functions into wp_head

### CSS3
* HTML5 Boilerplate reset
* Media Queries framework for instant development using @media
* @font-face empty framework with Fonts folder setup ready for new custom fonts
* CSS3 custom selection styles
* Inline print styles (HTML5 Boilerplate)
* Body element config, including Optimize Legibility for kerning and font-smoothing
* Replaced focus styles to avoid blue blur in field elements, replaced with border
* Stylesheet enqueued using WordPress functions into wp_head

### Preloaded Functions (functions.php)
* Enqueue Scripts functions setup
* Enqueue Styles functions setup
* Dynamic WordPress Menu Navigation Support, preloaded with 3 Dynamic menus
* Cleaned up dynamic nav output (Remove outer 'div')
* Remove all injected classes from nav items, ID's, Page ID's
* Custom Post Type x1 preloaded for demonstration, supporting: Category, Tags, Post Thumbnails, Excerpts
* Dynamic Sidebar with x2 Widget Areas, and sidebar.php setup
* WordPress Thumbnail Support, no Plugin image cropping, custom Arrays and Thumbnail settings
* Custom Excerpt callbacks, with changeable callback numbers
* Replaced 'Read More' button for custom Excerpt callbacks
* Demo Shortcodes included, with Nested Shortcode capability
* Add Slug to body class (Starkers Theme credit)
* wp_head functions stripped right down, remove excess injected junk
* All functions annotated, categorised into sections, filters, actions, shortcodes etc.
* Space for development, neatly organised code with Modules/External files

### Theme Files and Functionality
* Built in Pagination, no plugins (strips out prev + next post and gives page numbers)
* Optimised Google Analytics in footer (HTML5 Boilerplate)
* Widget Area Sidebar support, functions in place to get developing
* Custom Search Form included (searchform.php) - fully editable
* Tags support for showing Post Tags
* Category support for showing the Category of post
* Author support showing the author
* Demo Custom Page Template for expansion
