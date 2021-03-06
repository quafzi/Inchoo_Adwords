# Magento Adwords Conversion Tracking Module #

This magento module allows you to use Google Adwords to track conversions on your website.

This is an updated fork from [Inchoo's original module](http://inchoo.net/magento/magento-and-google-adwords-conversion-tracking/).

## Installation

### Install using [modgit](https://github.com/jreinke/modgit)

    $ cd /path/to/magento
    $ modgit init
    $ modgit add Inchoo_Adwords https://github.com/quafzi/Inchoo_Adwords.git
    
### Install using [composer](http://getcomposer.org)

Add this repository url to the "repositories" section of your composer.json (or to your package source), e.g.

    "repositories": [
      { "type": "vcs", "url": "https://github.com/quafzi/Inchoo_Adwords/" }
    ]

and call

    $ composer require inchoo/adwords
    
to add it to your project.

### Manual Install

- Get the [latest version](https://github.com/quafzi/Inchoo_Adwords/archive/master.zip) of the module.
- Uncompress the file and copy the app folder to Magento's main folder (merging it with the existing app folder).

### Permissions

If you have problems, check permissions:

    775 for folders;
    644 for files; 

If you want to change permissions for everything on the current folder:

    sudo find . -type d -exec chmod 755 {} \;
    sudo find . -type f -exec chmod 644 {} \;

## Cache

Clear the Magento cache on `System > Manage Cache`.

## Configuration

You now have extra fields related to conversion tracking on `System -> Configuration -> Sales -> Google API`:

- Enable Adwords Conversion Tracking
- Enable Anonymous IP
- Google conversion ID
- Google language
- Google conversion format
- Google conversion color
- Google conversion label
- Remarketing only

### Getting Google Data

Open your [Google AdWords](https://adwords.google.com) account and go to `Tools -> Conversions`.

Create a new conversion and get the data from the code generated by Google.
