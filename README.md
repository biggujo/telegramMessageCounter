# telegramMessageCounter
Message counter for Telegram written in PHP

### In

Exported chat (**_"messagesXXX.html"_**) from Telegram (tested in Telegram Desktop)

### Out
**_"counter.html"_** with number of sent messages from each user

### Usage:
1) place all **_"messagesXXX.html"_** and all scripts in work folder;
2) edit **_"uniter.php"_** to match number of your files of messages;
   1) Ex.:
   
   `<?php
      file_put_contents('united.html',
      file_get_contents('messages1.html').
      file_get_contents('messages2.html').
      file_get_contents('messages3.html')
   ); 
   ?>`
3) run **_uniter.php_**;
4) run **_strip.php_**;
5) run **_counter.php_**;
6) open result file called **_result.html_**.

