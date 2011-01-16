How to :
--------

The CLI way : clear && phpunit --verbose --colors --bootstrap ./tests/bootstrap.php  --log-junit build/logs/phpunit.xml --coverage-clover build/logs/coverage/clover.xml --coverage-html build/logs/coverage/ --group=WebCheckerTests tests/alltests.php

The XML way : ~/$ phpunit --configuration tests/phpunit.xml
 