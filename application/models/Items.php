<?php
/**
 * Created by IntelliJ IDEA.
 * @author prskavecl
 * @version
 * @package
 * @filesource
 */
/**
 * @package @@PACKAGE@@
 */
class Model_Items 
{
    public static function getItems()
    {
        $filename = '/tmp/kosik';
        if (!file_exists($filename)) {
            $data = "1;Item 1\n2;Item 2";
            file_put_contents($filename, $data);
        }

        $data = file_get_contents($filename);
        $rows = explode("\n", $data);
        foreach ($rows as $row) {
            $items = explode(";",$row);
            $out[$items[0]] = $items[1];
        }
        return $out;        
    }
}
