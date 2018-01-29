<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 16.10.2017
 * Time: 13:28
 */

include_once ROOT.'/libs/PHPExcel/IOFactory.php';
class ImportController
{
    public static function actionExcel($file = ROOT . '/products.xlsx') {
        $db = mysqli_connect("localhost", "root", "", "test");

        $PHPExcel_file = PHPExcel_IOFactory::load($file);

        foreach ($PHPExcel_file->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();

            for($row = 2; $row <= $highestRow; $row++) {
                $name = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $age = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $email = mysqli_real_escape_string($db, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $query = "INSERT INTO users (name, age, email) VALUES ('".$name."', '".$age."', '".$email."')";
                mysqli_query($db, $query);
            }

        }
        return true;
    }
}