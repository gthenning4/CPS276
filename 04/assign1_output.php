<?php
$inner = $_REQUEST['innerNum'];
$outer = $_REQUEST['outerNum'];
echo('<ul>');
for ($c=1; $c<=$outer; $c++){
    echo("<li>".$c);
    echo('<ul>');
    for ($x=1; $x<=$inner; $x++){
        echo("<li>".$x."</li>");
    }
    echo("</ul>");
}
echo('</ul>');

