<?php

echo "@@@@@@<br/>";
foreach ($testAAAA[$duplicateKey1]->attributes() as $testAAAAName1 => $testAAAAValue1) {
    echo $testAAAAName1, " - ", $testAAAAValue1, "<br/>";
}
echo "#####<br/>";
foreach ($testAAAA[$duplicateKey2]->attributes() as $testAAAAName2 => $testAAAAValue2) {
    echo $testAAAAName2, " - ", $testAAAAValue2, "<br/>";
}

;
?>