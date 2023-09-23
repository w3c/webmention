<?php
chdir(dirname(__FILE__).'/../');
shell_exec('/usr/bin/git pull origin master 2>&1');
echo 'ok';
