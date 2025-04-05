<?php
chdir(dirname(__FILE__).'/../../');
shell_exec('/usr/bin/git pull origin main 2>&1');
echo 'ok';
