# java-selenium-webdriver

## Testing the sites using Selenium webdriver.
Eclipse, Selenium and Firefox geckodriver are required to run the script.

## Features Tested so far:
*Checks if there are .asp links, psndealer links, broken images and missing content in all pages created on wordpress*

## Features left to work on:
*we would like to test all hrefs and src tags in all pages and make sure it navigates to the correct page and none of them navigate to a page not found*
___________________________________________________________________________________________________________________________

# CreatePages.java
This class reads from a text file the custom pages that should be created and signs into wordpress and create them automatically.

# Content.java
loops on the pages created from the previous class and imports the corresponding content from the corresponding page on the live site. The code has to be edited before running the code (Line 123) to import the content based on the html tag that contains the content.

# redirection.java
Automatically adding the redirects for all the custom pages needed to be created.

# changinhrefs.java
Under Construction
