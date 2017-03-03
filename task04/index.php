<?php
class Path {

    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }
    public function cd($newPath)
    {
        $innerCounter = 0;
        $strOut= '';
        $newPath = explode('/',$newPath);
        $oldPath = explode('/', $this->currentPath);

        foreach ($newPath as $str) {
            if ($str == '..') {
                $innerCounter++;
            }
        }

        $oldLength = count($oldPath);
        for ($i=0;$i<($oldLength - $innerCounter);$i++)
            $strOut .= $oldPath[$i]."/";

        $counter = 0;
        $newLength = count($newPath);
        for ($i=0; $i<$newLength; $i++) {
            if ($newPath[$i] != '..'){
                if ($newPath[$i] != NULL) {
                    if ($counter) {
                        $strOut = $strOut . "/" . $newPath[$i] . '';
                    } else {
                        $strOut = $strOut.$newPath[$i] . '';
                    }
                    $counter++;
                }

            }
        }

        $this->currentPath = $strOut;

        return $this;
    }
}
$path = new Path('/a/b/c/d');
echo $path->cd('../x')->currentPath;

?>