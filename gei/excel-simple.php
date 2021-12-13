<?php

require_once('vendor/autoload.php');

/**
 * Step 1: Setup
 */

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Robin Metcalfe")
							 ->setLastModifiedBy("Robin Metcalfe")
							 ->setTitle("Excel test")
							 ->setSubject("Solarise Design")
							 ->setDescription("A test document for outputting an Excel file with some basic values.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");

$sheet = $objPHPExcel->setActiveSheetIndex(0);

/**
 * Step 2: Setting the values
 */

// row 1
$sheet->setCellValue("A1", 'Column A');
$sheet->setCellValue("B1", 'Column B');

// row 2
$sheet->setCellValue("A2", '1');
$sheet->setCellValue("B2", '2');

// row 3
$sheet->setCellValue("A3", '3');
$sheet->setCellValue("B3", '4');

/**
 * Step 3: Output
 */
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="html-to-excel.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');