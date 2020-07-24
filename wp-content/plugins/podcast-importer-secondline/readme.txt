=== Podcast Importer SecondLine ===
Contributors: secondlinethemes
Donate link: https://secondlinethemes.com/
Tags: podcast, import, podcasting, feed, audio, rss, episodes, embed
Requires at least: 4.8
Tested up to: 5.4
Requires PHP: 5.6
Stable tag: trunk
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A simple podcast import tool for WordPress.

== Description ==

The Podcast Importer plugin helps to easily import existing podcasts into WordPress. You can import your podcast into the regular WordPress posts or into a custom post type (if you have an existing one). 
The plugin fully supports popular WordPress podcasting plugins such as PowerPress, Seriously Simple Podcasting, Simple Podcast Press, and works perfectly with podcast themes developed by [SecondLineThemes](https://secondlinethemes.com) 

The plugin supports importing episodes into existing custom post types, assign categories, import featured images and more. Additionally, the plugin enables continuous import of podcast RSS feeds, so every time you release a new podcast episode, it could be automatically created within WordPress. You can also set multiple import schedules and import different podcasts from separate sources at the same time. (For example, when importing separate podcasts from separate feeds into one website)

To use the plugin, simply run a new import under "Tools -> Podcast Importer SecondLine" via the main menu that appears in your WordPress dashboard. Set the different options and if you need a continuous import process for future episodes, make sure to hit that checkbox before running the import process. 
You can disable a schedueld import at any time by simply deleting the import entry. 

The plugin currently support automatic embed of audio player from the following podcast hosting providers: Transistor, Anchor, Simplecast, Podbean, Whooshkaa, Omny.

== About SecondLineThemes ==

SecondLineThemes is developing unique WordPress themes and plugins for Podcasters. Our tools are very popular among podcasters. To hear more about us please check our website:
[https://secondlinethemes.com](https://secondlinethemes.com)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/podcast-importer-secondline` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Run a new import via the "Tools -> Podcast Importer Secondline" section in your WordPress admin panel.
4. If needed, delete any of the scheduled import processes. 

== Frequently Asked Questions ==

= The import failed or takes too much time to process? =
You can run the improter multiple times, as it will never import the same post twice. Once all episodes are imported, only future ones would be imported, assuming you selected the continuous import option.

= Do you support podcast feeds from any host? =
Sure. All types of podcast feeds can be imported, as long as they are in an RSS/XML format. If you feel something is missing, please reach out and we will ensure to look into it.

= The import does not work for my podcast feed =
First of all, make sure you are filling in a valid URL, of a valid podcast RSS feed. Second, make sure your server is up to modern requirements - we recommend PHP 7 or above.

== Screenshots ==

1. Import your podcast episodes based on multiple options.
2. Add multiple continuous import processes of separate podcasts.

== Changelog ==

= 1.1.4 =
* Added Ausha.co (Thanks @Jeau!), Pinecast and Audioboom as additional embed providers.
* Increased the default number of "Continuous" imports displaying on the plugin's page.
* Fixed issue with external embed player on some themes.

= 1.1.3 =
* Fixed image import issues with Buzzsprout
* Added 3 additional providers for embed audio players: Buzzsprout, Captivate.fm, Megaphone.fm
* Added automatic import of season number and episode number (this can only be used with themes from SecondLineThemes.com or via a theme customization)

= 1.1.2 =
* Fixed conflicts between server timezone and WP timezone - episodes are instantly published instead of being scheduled.
* Fixed a bug with the embedded audio player import.

= 1.1.1 =
* Modified XML image object to parse as string (caused a bug in WP 5.4).
* Updated the compatibility tag for WordPress 5.4. 

= 1.1.0 =
* Added cURL fallback for better compatibility on certain servers. 

= 1.0.9 =
* Advanced functionality added for users using our premium themes.
* Fixed minor error displaying while importing a new podcast with no images.

= 1.0.8 =
* You can now select multiple categories for your imports.
* Fixed minor bug with image importing.
* Updated PAnD version (dismiss notices).

= 1.0.7 =
* Fixed new episodes not importing when no GUID in feed.

= 1.0.6 =
* Fixed multiple issues with image imports.
* Added filesize data to imported episodes.
* Minor fix when no duration is specified in RSS.

= 1.0.5 =
* Avoid scheduling posts to future dates when RSS and Server have timezone conflicts.
* Now adding episode duration when possible.
* Added minor new CSS styles to better match WordPress 5.3

= 1.0.4 =
* Fixed scheduled import throwing errors (post_exists function undefined) on some occasions.

= 1.0.3 =
* Fixed audio file import when no embed player is available, but embed option was selected.

= 1.0.2 =
* Fixed some issues with duplicate imports and unsaved settings.
* Added support for Omny embedded audio player.
* Improved performance.

= 1.0.1 =
* Added option to use an embed audio player rather than the default WordPress audio player for several hosts (Transistor.fm, Anchor.fm, Simplecast, Podbean, Whooshkaa)

= 1.0 =
* Initial Release.
