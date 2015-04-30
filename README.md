Auto Currency Switcher - Magento Extension
======================

Auto Currency extension tracks visitor's IP address and automatically changes the store currency to the visitor's location currency. Visitor can switch to his/her desired currency at any time.

This extension uses two IP Address databases for IP Address lookup. One is `MaxMind's GeoIP` and the other is `Webnet77's Ip2Country` database. Shop admins have the option to choose between these two databases. The default one is `Webnet77's Ip2Country` database.

## Installation ##

Just install the module in your multi-currency enabled Magento shop and the module will work on the fly. 

No extra configuration settings is to be made. 

However, you have the option to `Enable or Disable` the module & `Choose IP address Database Source` from configuration setting:

`System -> Configuration -> CATALOG -> Catalog -> Auto Currency`

By default, the module is enabled and the IP address database source is Ip2Country.

## Troubleshoot  ##

This extension should run immediately after installing it. If it doesn't work then please check for the following:-

1) You should first setup/enable multiple currency on your shop. Here is about [How to setup multiple currency Magento shop?](http://blog.chapagain.com.np/magento-setup-multiple-currency-shop/)

2) Sometimes the extension doesn't work due to browser cache. Please clear your browser cache and try reloading your website. Or, try opening your website in another browser.

3) If Caching is enabled then Refresh Cache (`System -> Cache Management`)

4) If Compilation is enabled then Re-run Compilation (`System -> Tools -> Compilation`)

**More details**: [Magento Extension: Auto Currency Switcher BLOG](http://blog.chapagain.com.np/magento-extension-auto-currency-switcher-free/)

## Updating GeoIP Databases ##

The GeoIP database should be updated from time to time in order to make this extension work accurately. In this extension, you have option to choose from two databases (Webnet77's ip2country database & MaxMind's GeoIP database). Here are the ways to update these databases for this extension:

**Updating Webnet77's Database**

1) Download [IPV4 CSV](http://software77.net/geo-ip/) file

2) Extract the file. This will extract IPtoCountry.csv file.

3) Use [Ip2Country lookup classes for PHP](https://github.com/mgefvert/Ip2Country) to create binary-optimized version of the csv file.

4) Upload the binary file (**.dat** file) to your **[Magento Folder]/var/geoip/ip2country/** folder.

**Updating MaxMind GeoIP Database**

1) Download [GeoIP Database](http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz) and [GeoIPv6 Database](http://geolite.maxmind.com/download/geoip/database/GeoIPv6.dat.gz)

2) Extract both **.gz** files

3) Upload them to your **[Magento Folder]/var/geoip/** folder

## Thanks ##

* [MaxMind GeoIP Legacy database](http://dev.maxmind.com/geoip/legacy/geolite/)

* [MaxMind GeoIP Legacy PHP API](https://github.com/maxmind/geoip-api-php)

* [Webnet77 Ip2Country database](http://software77.net/geo-ip/)

* [Mats Gefvert's Ip2Country PHP API](https://github.com/mgefvert/Ip2Country)
