format_single
=============

A clone of the Moodle "OneTopic" course format that does not draw the tabs, and clones the inter-page navigation to the top (use CSS to hide which one you don't want).

Why?
----

Moodle 2.3 has a built-in format called "Topic", which has two sub-settings - show all topics on a page, or show one topic per page.

The latter still shows the intro of the course at the top of every subsequent page. I find this annoying, since the intro page can be quite long or interactive.

There's a course format plugin called "OneTopic" (https://moodle.org/plugins/view.php?plugin=format_onetopic) which is /almost/ what I want, except that it draws a tab bar across the top of the page. 

This plugin is a fork of the OneTopic plugin (not hosted on GitHub) which doesn't show the tabs.

How to use it
-------------

1. Drop the unzipped folder into the Moodle/course/format folder
2. *rename* folder to 'single'
3. As admin, click Notifications, then install the plugin
4. On a course, select 'Single' as the course format type

Support
-------

I'll be trying to keep it up to date with any changes mentioned in this thread: https://moodle.org/plugins/view.php?plugin=format_onetopic

Licence
-------

GPL3, as per the original plugin and rest of Moodle