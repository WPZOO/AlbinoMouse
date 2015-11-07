# Change Log AlbinoMouse
All notable changes to this project will be documented in this file. This project follows [Semantic Versioning](http://semver.org/).

##[3.0.0]
**Attention: You need to reset your theme options**

**Added**
- Use Customizer instead of options page
- Update Bootstrap 3.3.2
– Improve the use of a child theme
- Update theme screenshot

**Removed**
– Support of IE8
- Option: Jetpack social buttons styling
- Favicon Option

##[2.1.2]
**Bug fixes**
- Loading secondary nav only if needed
- Clean up code and improve readability
- Create content and sidebar class functions
- Merged two small icon fonts

##[2.1.1]
**Bug fixes**
- SSL friendly load of Google fonts
- Bug fixesed position of banner thumbnail

##[2.1]
**Added**
- Bootstrap 3.1 update and minified styles
- New secondary menu navigation
- New option to choose between the_content and the_excerpt for homepage and archives
- New option breadcrumbs on default page template

**Bug fixes**
- Translated credits page
- Adjust title font-size and margin
- Changed widget title to h3 in sidebar.php
- Same font-family like headings for .navbar-brand
- Header search form doesn't cause line break on focus
- More space on the right of glyphicon

##[2.0.4]
**Bug fixes**
- Changed global word-break to word-wrap

##[2.0.3]
**Bug fixes**
- Changed the copyright info (theme guidelines)

##[2.0.2]
**Added**
- Added HTML5 Shiv and Respond.js to support older versions of IE
- Added fallback color to style.css and flat-social-buttons.css

**Removed**
- Removed the menu key from wp_nav_menu array

**Bug fixes**
- Changed the copyright info

##[2.0.1]
**Added**
- Added Romanian translation made by Van Testing
- Added new theme tags
- New thumbnail size

**Removed**
- Deleted phpColors because it’s incompatible with older php versions.

##[2.0]
**Added**
- AlbinoMouse now built on framework Bootstrap
- Theme redesign
- Glyphicons comes with Bootstrap instead of Font Awesome
- Aditional page templates
	- No Breadcrumbs
	- No Breadcrumbs and full width
	- Full width
- New options
	- More sidebar layout options
	- Two different post thumbnail layouts
	- Flat design for Jetpacks social buttons
- Embed videos from YouTube, Vimeo,... are now really responsive with FitVids
- Breadcrumbs are now standard on pages

**Removed**
- Shortcodes removed because of theme guidelines

##[1.4]
**Added**
- Added Polish translation made by Michał
- Font Awesome now loads from BootstrapCDN
- Font visualization on options page
- Redesigned sidbar on options page
- Added two new page templates with breadcrumbs navigation

**Bug fixes**
- Bug fixesed image height on smaller screens
- Changed to get_permalink for Twitter buttons since the counter doesn't work with wp_shortlink

##[1.3.2]
**Removed**
- Removed post link on thumbnails for single posts
- Removed  WordPress Stats Smiley Face (jetpack)

**Bug fixes**
- Better responsive styles for embed / iframe
- Bug fixesed post link for thumbnails

##[1.3.1]
**Bug fixes**
- Changed Screenshot
- Bug fixesed problems with walker object and nav menu

##[1.3]
**Added**
- The header search box is now optional
- Add Widget Icons for jetpack Plugin
- Additional Social Media Locations Option
- Optional WP and Theme Author Link in Footer
- Add Danish translation made by Eva. Thanks a lot!
- Add Swedish Translation made by David. Thanks a lot!
- Add Spanish translation made by Pablo. Thanks a lot!
- Option to choose the post thumbnail size

**Bug fixes**
- Reorganised the theme options
- Optical bug with submenu
- Issues with alignment of images
- Better quotes
- Better ClearBug fixes
- Improve excerpts

##[1.2]
**Added**
- Add French translation made by Alexis. Thanks a lot!
- The excerpt now has a read more button instead of [..]

**Bug fixes**
- Screenshot size changed to 600x450 for HiDPI displays
- Non-printable characters were found in content-single.php and content-page.php 
- Bug fixesed Issues with post date

##[1.1.4]
**Bug fixes**
- It must not load wp_nav_menu and wp_page_menu (fallback) together

##[1.1.3]
**Bug fixes**
- Bug fixesed Problems with walker object and nav menu

##[1.1.2]
**Added**
- Updated Icon "Font Awesome" and relocated styles in a new stylesheet file
- Add Custom Walker Object -> New procedure to add icon before main-navi link
- New info box on options page

**Bug fixes**
- Bug fixesed Comment Navigation Button
- Bug fixesed some translations issues

## [1.1.1]
**Removed**
- Removed unnecessary editor styles

**Bug fixes**
- Wrong generated content for sharing on Twitter

## [1.1.0]
**Added**
- Updated Options Framework Theme to 1.4
- Changed Theme Description
- Add socialite.js for better performance

**Removed**
- Removed Header Widget area and set Bug fixes search form

**Bug fixes**
- Bug fixesed PHP Notice Messages which are in conjunction with theme options
- wp_head() and wp_footer() are now immediately before closing tag
- Bug fixesed some if statements in index.php, single.php, page.php and archive.php
- Bug fixesed some CSS Styles
- JavaSript for Social Buttons aren't hard-coded anymore

## [1.0.0]
**Added**
- Initial Release