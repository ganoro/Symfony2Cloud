Symfony2Cloud 
=============

Symfony2Cloud is a project aiming to exploiting the power of 
[Symfony2](http://symfony.com/doc/current/book/installation.html) and 
the [Zend Developer Cloud](http://my.phpcloud.com).

Symfony Standard Edition - a fully-functional Symfony2 application that you 
can use as the skeleton for your new app. If you want to learn more about 
the features included, see the "What's Inside?" section.

Zend Developer Cloud - Zend Developer Cloud, as its name suggests, a 
cloud-based environment designed to help you code more quickly and more 
efficiently. It includes a robust PHP stack, advanced debugging capabilities, 
collaboration tools and much more. Zend Developer Cloud is only a few clicks 
away and does not require any installation. To make it even better, 
it's absolutely free!

This document contains information on how to download and start using Symfony2Cloud.

1) Get the bits!
----------------

### Clone the git Repository


If you're using [Zend Studio 9](http://zend.com/studio/) use File | New | PHP Project from Github...
Wizard to clone the project from:

	http://github.com/ganoro/Symfony2Cloud.git

If you're using [Zend SDK](http://code.google.com/p/zend-sdk/) use 
['clone project'](http://code.google.com/p/zend-sdk/wiki/ManagingProjects#Clone_Project) command 
by running the following command:

	zend clone project -r http://github.com/ganoro/Symfony2Cloud.git

If you prefer the traditional Git CLI:

    git clone http://github.com/ganoro/Symfony2Cloud.git

2) Installation
---------------

### For [Zend SDK](http://code.google.com/p/zend-sdk/)

	zend deploy application -t <target-id>

where target-id is the id of your Zend Developer Cloud container created eariler 
by the ['add target'](http://code.google.com/p/zend-sdk/wiki/ManagingTargets#Adding_a_Target) command. 

### For [Zend Studio 9](http://zend.com/studio)

Open the deployment.xml file and click on the "Launch a PHP application".
Follow the wizard steps to finalize the deployment step

Enjoy!
