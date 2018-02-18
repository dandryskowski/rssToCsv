Project Dariusz Andryskowski
============================
### Export RSS/Atom to CSV file

:package_description

- [Installation](#installation)
- [Usage](#usage)
- [Credits](#credits)
- [License](#license)


Installation
------------

Download package application from https://github.com/dandryskowski/rssToCsv
Run console and write
``` 
composer install
composer update
``` 



Usage
-----
We can use two action to genrate CSV from RSS/ATOM
- csv:simple URL PATH - retrieve the RSS / Atom data from the URL and save them to the PATH.csv file specified by the PATH path. The old data from the PATH.csv file should be overwritten.
- csv:extended URL PATH - retrieving the RSS / Atom data from the URL and entering them into the PATH.csv file specified by the PATH path. The old data from the PATH.csv file should be added.


Eg. csv:simple
```
php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_simple.csv

```

Eg. csv:extended

```
php src/console.php csv:extended http://feeds.nationalgeographic.com/ng/News/News_Main eksport_extended.csv

```

If You don't add information about name file, default option generate CSV and generate file name: PATH.csv
```
php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main

```
or 
```
php src/console.php csv:extended http://feeds.nationalgeographic.com/ng/News/News_Main

```

Credits
-------

- [Dariusz Andryskowski Powers](https://github.com/dandryskowski/rssToCsv)


License
-------

The MIT License (MIT). Please see [License File](https://github.com/dandryskowski/rssToCsv/LICENSE) for more information.
