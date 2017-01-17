Prerequisites:  
1) Download php-webdriver-bindings latest version from this page, unpack the contents to a directory that we’re going to include in our script later  
2) We will also need a java VM (or JRE) installed on our machine, as we’d need Selenium test server. NOTE: I tried the 2.29 version. You can find it [here](https://lamp-dev.com/wp-content/uploads/selenium-server-standalone-2.29.0.zip)  
3) Download Chrome driver for Selenium [here](https://chromedriver.storage.googleapis.com/index.html) (i use 2.27 version) , unpack it to your project folder.  
4) run composer update  

launch the Selenium server with chrome driver  
    java -jar selenium-server-standalone-2.29.0.jar -Dwebdriver.chrome.driver="chromedriver"
Place there your Selenium driver version and the path to chromedriver (step 3 in Prerequisites)  

great! you can testing  
    phpunit --bootstrap tests/bootstrap.php tests/
