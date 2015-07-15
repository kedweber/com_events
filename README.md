# Events Component \(com_events\)

Events component for Joomla 3.x and Nooku (Koowa 1.0).

## Installation

### Composer

Installation is done through composer. In your `composer.json` file, you should add the following lines to the repositories
section:

from the local repository;

```json
{
    "name": "moyo/com_events",
    "type": "vcs",
    "url": "https://github.com/kedweber/com_events.git"
}
```

and from the official repository;

```json
{
    "name": "moyo/com_events",
    "type": "vcs",
    "url": "https://github.com/moyoweb/com_events.git"
}
```

The require section should contain the following line:

```json
    "moyo/com_events": "1.0.*",
```

Afterwards, one just needs to run the command `composer update` from the root of your Joomla project. This will 
effectively create a `composer.lock` file which will contain the collected dependencies and the hash codes for 
each latest release \(depending on the require section's format\) for each particular repo. Should installations 
problems occur due to a bad ordering of the dependencies, one may need to go into the lock file and manualy change 
the order of the components. Running `composer update` again will again cause a reordering of the lock file, beware of 
this factor when running an update. Thereafter, you can run the command `composer install`. 

If you have not setup an alias to use the command composer, then you will need to replace the word composer in the previous commands with the 
commands with `php composer.phar` followed by the desired action \(eg. update or install\).

### jsymlinker

Another option is to run the [jsymlink script](https://github.com/derjoachim/moyo-git-tools) in the root folder, available via the original Moyo developer, Joachim van de Haterd's repository, under 
the [Moyo Git Tools](https://github.com/derjoachim/moyo-git-tools).

#### License jsymlinker

The joomlatools/installer plugin is free and open-source software licensed under the [GPLv3 license](https://github.com/derjoachim/joomla-composer/blob/develop/gplv3-license).
