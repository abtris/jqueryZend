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

    const FILENAME = '/tmp/kosik'; 

    public static function getItems()
    {
        if (!file_exists(self::FILENAME)) {
            $data = "1;Item 1\n2;Item 2";
            file_put_contents(self::FILENAME, $data);
        }

        $data = file_get_contents(self::FILENAME);
        $rows = explode("\n", $data);
        foreach ($rows as $row) {
            $items = explode(";",$row);
            $out[$items[0]] = $items[1];
        }
        return $out;        
    }

    public static function addItem($value)
    {
        $data = file_get_contents(self::FILENAME);
        $rows = explode("\n", $data);
        $i = count($rows);
        $i++;
        $data .= "\n$i;$value";
        file_put_contents(self::FILENAME, $data);        
    }
}
