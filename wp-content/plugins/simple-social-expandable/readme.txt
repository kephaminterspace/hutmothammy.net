﻿=== Plugin Name ===
Contributors: Alex Jensen
Tags: facebook, google, twitter, pinterest, plus one, like it, like, share, pin, pin it,Google follow button, Google follow badge, Social media button set,
Requires at least: 2.8
Tested up to: 3.4.2
Stable tag: trunk

Insert and customize social buttons: Facebook Like it, Google plus +1, Google follow, Twitter share, Pinterest Pin it. 

== Description ==

Simple Social Expandable adds social network buttons, five social sharing buttons, such as: **Facebook "Like it!"**, **Google plus on "+1"**, **Twitter share** and **Pinterest Pin it**. **Google follow**Plugin is fully customizable. You can decide where to put those buttons:

- Buttons above the post content 
- Buttons under the post content
- Buttons above and under the post

That's not all. Simple Social Expandable can also add social media buttons to:

- Static Pages
- Front Page
- Posts Categories
- Date Archives
- Tags Archives

Want's more? Now you can change the **order of buttons** on your pages and posts.

Let your visitors share your content with friends and let them **promote your blog**. Facebook, Google Plus, Pinterest and Twitter are the most popular social networks nowadays. Don't miss the opportunity, and help publish your content and links to those social media networks.

Simple Social Expandable is currently in the following languages:


- English
 



== Installation ==

1. Download the latest version of Simple Social Expandable
2. Upload folder named simple-social-expandable to the /wp-content/plugins/ directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. (Optional) Customize the buttons in the Settings > Simple Social Expandable menu

That's it. Buttons will show on your blog posts.

You can also use this plugin directly in your template by function `<?php get_ssb([$order]); ?>`, where `$order` is a string with args ( example: `$order = "googleplus=1&fblike=2&twitter=3"` ) or an array ( example: `$order = array('googleplus' => 1, 'fblike' => 2, 'twitter' => 3)` ). If you would like to hide a specified button, you should set order to "0".


== Frequently Asked Questions ==

= Is the plugin free? =

Yes, it's free.  

= Is the plug will be developed? =

Yes. I will develop Simple Social Expandable. There will be more buttons, more customization.

= Why use this plugin? =

This plugin automatically adds the Facebook Like button, Google plus one +1, Google Follow, Twitter share button and Pinterest Pin for each post on your blog. This is the simples and effective way to promote your blog in social media networks.


= Is there a template tag for custom install? =

Yes, you can use `<?php get_sse(); ?>` in your template file (see installation section). Default instalation does not require that. 

= Facebook button doesn't appear? =

Make sure you have set WPLANG in wp-config.php file. Correct values are "en_US" for english.
 



== Screenshots ==

1. SSE Admin Panel
2. SSE Buttons Shows on the front end Posts.
3. Follow Us Buttons.


== Changelog ==

= 1.0 =
* First stable release.

= 1.0.1 =
* Google Follow design Bug Fixed.

= 1.0.2 =
* Auto Update
* Youtube,Facebook,Twitter, Google Follow Icons Added
* Design Changes

= 1.0.3 =
* Design Fixes.
* Added New Option for Float Left/Right

= 1.0.5 =
* Javascript Issue Fixed.

= 1.0.6 =
* Buttons Design Issue Fixed.
* Javascript Confliction Fixed.

= 2.0.0 =
* On/Off Follow Buttons.
* Design Issue Fixed.

= 2.0.1 =
* Force FB and Twitter Button to English

= 2.0.2 =
*Fixed Like button to share the post instead of actual page.