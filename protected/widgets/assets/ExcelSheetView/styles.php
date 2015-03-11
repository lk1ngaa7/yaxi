<?php
CHtmlEx::loadPHPExcel();

$borderBlackNthin = array(
	'style' => PHPExcel_Style_Border::BORDER_THIN,
	'color' => array(
		'rgb' => '000000',
	),
);

$styles = array(
	'sample' => array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'argb' => 'FFCCFFCC',
			),
		),
		'borders' => array(
			'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
			'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		),
	),
	'thin_border' => array(
		'borders' => array(
			'bottom' => $borderBlackNthin,
			'top' => $borderBlackNthin,
			'left' => $borderBlackNthin,
			'right' => $borderBlackNthin,
		),
	),
	'header' => array(
		'font' => array(
			'bold' => true,
		),
		'alignment' => array(
			'wrap' => true,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'argb' => 'FF96C8A2',	//color: eton blue
			),
		),
	),
	'odd' => array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'argb' => 'FFFFF0F5',	//color: lavender blush
			),
		),
	),
	'even' => array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'argb' => 'FFFFFACD',	//color: lemon chiffon
			),
		),
	),
	'footer' => array(
		'font' => array(
			'bold' => false,
			'color'     => array(
                //'rgb' => '808080'
                'argb' => 'FF73A7E9',
            ),
            'size' => 7,
		),
	),
);
CHtmlEx::unLoadPHPExcel();

return $styles;