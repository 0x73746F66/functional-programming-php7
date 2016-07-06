#!/bin/bash
phpunit --bootstrap src/autoload.php tests/ --testdox-html public/index.html
