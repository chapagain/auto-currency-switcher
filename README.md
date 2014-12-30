Auto Currency Switcher - Magento Extension
======================

Auto Currency extension tracks visitor's IP address and automatically changes the store currency to the visitor's location currency. Visitor can switch to his/her desired currency at any time.

This extension uses two IP Address databases for IP Address lookup. One is `MaxMind's GeoIP` and the other is `Webnet77's Ip2Country` database. Shop admins have the option to choose between these two databases. The default one is Webnet77's Ip2Country database.

## Installation ##

Just install the module in your multi-currency Magento shop and the module will work on the fly. 

No extra configuration settings is to be made. 

You can Enable or Disable the module & choose IP address database from configuration setting:

`System -> Configuration -> Catalog -> Auto Currency`

## Usuage ##

This extension should run immediately after installing it. If it doesn't work then please check for the following:-

1) You should first setup/enable multiple currency on your shop. Here is about [How to setup multiple currency Magento shop?](http://blog.chapagain.com.np/magento-setup-multiple-currency-shop/)

2) Sometimes the extension doesn't work due to browser cache. Please clear your browser cache and try reloading your website. Or, try opening your website in another browser.

**More details**: [Magento Extension: Auto Currency Switcher](http://blog.chapagain.com.np/magento-extension-auto-currency-switcher-free/)

## Thanks ##

* [MaxMind GeoIP Legacy database](http://dev.maxmind.com/geoip/legacy/geolite/)

* [MaxMind GeoIP Legacy PHP API](https://github.com/maxmind/geoip-api-php)

* [Webnet77 Ip2Country database](http://software77.net/geo-ip/)

* [Mats Gefvert's Ip2Country PHP API](https://github.com/mgefvert/Ip2Country)
