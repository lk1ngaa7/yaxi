<?php
/**
 * ExcelColumn class file
 * PLEASE NOTE: In order to avoid changing all the "css" named properties to something else,
 * try to remember that the convention is as follows:
 * css files are php files that return an array consisting of PHPExcel_Style arrays
 * class names equivalent is the index of the array of the file explained here
 *
 * @author pligor <pligor@facebook.com>
 * @link http://www.facebook.com/pligor
 */

/**
 * An ExcelColumn object represents the specification for rendering the cells in a particular excel view column.
 * In a column, there is one header cell, multiple data cells, and an optional footer cell.
 * If you want other special formats for each column you should create child classes or other columns
 * @author pligor <pligor@facebook.com>
 */
class ExcelColumn extends CComponent {
	/**
	 * @var string the ID of this column. This value should be unique among all excel view columns.
	 * If this is not set, it will be assigned one automatically.
	 * This MUST represent the column index of a php excel column (zero-based)
	 */
	public $id;
	
	/**
	 * @var ExcelSheetView the grid view object that owns this column.
	 */
	public $grid;
	
	/**
	 * @var string the header cell text. Note that it will not be HTML-encoded.
	 */
	public $header;
	
	/**
	 * @var string the footer cell text. Note that it will not be HTML-encoded.
	 */
	public $footer;
	
	/**
	 * @var boolean whether this column is visible. Defaults to true.
	 */
	public $visible=true;
	
	/**
	 * @var array the PHPExcel_Style array for the data cell tags.
	 */
	public $htmlOptions=array();
	/**
	 * @var array the PHPExcel_Style array for the header cell tag.
	 */
	public $headerHtmlOptions=array();
	/**
	 * @var array the PHPExcel_Style array for the footer cell tag.
	 */
	public $footerHtmlOptions=array();
	/**
	 * @var string a PHP expression that is evaluated for every data cell and whose result
	 * is used as the style index for the data cell. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $cssClassExpression;
	
	/**
	 * the width of this column
	 * please ensure you initialize with a default value
	 * @var integer
	 */
	public $width = 15;
	
	/**
	 * @var string the attribute name of the data model. The corresponding attribute value will be rendered
	 * in each data cell. If value is specified, this property will be ignored
	 * @see value
	 */
	public $name;
	
	/**
	 * @var string a PHP expression that will be evaluated for every data cell and whose result will be rendered
	 * as the content of the data cells. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $value;
	
	/**
	 * @var string the type of the cell. Only constants within PHPExcel_Cell_DataType class are valid
	 */
	public $type;
	
	/**
	 * @var boolean if you want a filter for this column then you must set this to true
	 * If you don't want a filter for this data column, set this value to false.
	 */
	public $filter;

	/**
	 * Constructor.
	 * @param ExcelSheetView $grid the grid view that owns this column.
	 */
	public function __construct($grid) {
		//CHtmlEx::loadPHPExcel();
		$this->type = PHPExcel_Cell_DataType::TYPE_STRING;
		//CHtmlEx::unLoadPHPExcel();
		
		$this->grid = $grid;
	}
	
	/**
	 * Initializes the column.
	 * This method is invoked by the grid view when it initializes itself before rendering.
	 * You may override this method to prepare the column for rendering.
	 */
	public function init() {
		if($this->name===null && $this->value===null) {
			throw new CException(Yii::t('zii','Either "name" or "value" must be specified for ExcelColumn.'));
		}
		
		$this->initStyles();
		
		$this->grid->sheet->getColumnDimensionByColumn($this->id)->setWidth($this->width);
	}
	
	protected function initStyles() {
		$styles = $this->grid->styles;
		$this->headerHtmlOptions = $styles['header'];
		$this->footerHtmlOptions = $styles['footer'];
	}
	
	/**
	 * id is constrained to be an unsigned integer of a specific range
	 * @throws Exception
	 */
	public function idValidator() {
		$condition = $this->grid->isUnsignedInteger($this->id) && ($this->id < 256);
		if( !$condition ) {
			$message = Yii::t('', 'id of column must be an unsigned integer with value of less than 256')
				.'. '. Yii::t('', 'if you want to write to Excel 2007 or 2010 format which supports more columns change the condition inside ExcelColumn');
			throw new Exception($message);
		}
	}

	/**
	 * @return boolean whether this column has a footer cell.
	 * This is determined based on whether footer is set.
	 */
	public function getHasFooter() {
		return $this->footer!==null;
	}

	/**
	 * Renders the header cell.
	 */
	public function renderHeaderCell() {
		$this->renderHeaderCellContent();
		
		$this->grid->sheet->getStyleByColumnAndRow($this->id, $this->grid->row)->applyFromArray($this->headerHtmlOptions);
	}
	
	/**
	 * Renders the header cell content.
	 * This method will render a link that can trigger the sorting if the column is sortable.
	 */
	protected function renderHeaderCellContent() {
		if($this->name!==null && $this->header===null) {
			if($this->grid->dataProvider instanceof CActiveDataProvider) {
				$header = $this->grid->dataProvider->model->getAttributeLabel($this->name);
			}
			else {
				$header = $this->name;
			}
		}
		else {
			$header = trim($this->header)!=='' ? $this->header : $this->grid->blankDisplay;
		}
		$this->grid->sheet->setCellValueByColumnAndRow($this->id, $this->grid->row, $header);
	}

	/**
	 * Renders a data cell.
	 * @param integer $row the row number (zero-based)
	 */
	public function renderDataCell($row) {
		$data = $this->grid->dataProvider->data[$row];
		
		$this->grid->sheet->getStyleByColumnAndRow($this->id,$this->grid->row)->applyFromArray($this->htmlOptions);
		
		if($this->cssClassExpression !== null) {
			$style = $this->evaluateExpression($this->cssClassExpression,array('row'=>$row,'data'=>$data));
			$this->grid->sheet->getStyleByColumnAndRow($this->id,$this->grid->row)->applyFromArray($this->styles[$style]);
		}

		$this->renderDataCellContent($row, $data);
	}

	/**
	 * Renders the data cell content.
	 * This method evaluates {@link value} or {@link name} and renders the result.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data) {
		if($this->value !== null) {
			$value = $this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		}
		elseif($this->name !== null) {
			$value = CHtml::value($data,$this->name);
		}
		
		if($value === null) {
			$value = $this->grid->nullDisplay;
			$this->grid->sheet->setCellValueByColumnAndRow($this->id,$this->grid->row,$value);
		}
		else {
			$this->grid->sheet->setCellValueByColumnAndRow($this->id,$this->grid->row,$value,true)	//true means return cell
				->setDataType($this->type);	
		}
	}

	/**
	 * Renders the footer cell.
	 */
	public function renderFooterCell() {
		$this->renderFooterCellContent();
		
		$this->grid->sheet->getStyleByColumnAndRow($this->id, $this->grid->row)->applyFromArray($this->footerHtmlOptions);
	}

	/**
	 * Renders the footer cell content.
	 * The default implementation simply renders {@link footer}.
	 * This method may be overridden to customize the rendering of the footer cell.
	 */
	protected function renderFooterCellContent() {
		$footer = ( (trim($this->footer) !== '') ? $this->footer : $this->grid->blankDisplay );
		$this->grid->sheet->setCellValueByColumnAndRow($this->id, $this->grid->row, $footer);
	}
	
	/**
	 * Renders the filter cell.
	 */
	/*public function renderFilterCell()
	{
		echo "<td>";
		$this->renderFilterCellContent();
		echo "</td>";
	}*/

	/**
	 * Renders the filter cell content.
	 * This method will render the {@link filter} as is if it is a string.
	 * If {@link filter} is an array, it is assumed to be a list of options, and a dropdown selector will be rendered.
	 * Otherwise if {@link filter} is not false, a text field is rendered.
	 * @since 1.1.1
	 */
	/*protected function renderFilterCellContent() {
		if(is_string($this->filter))
			echo $this->filter;
		else if($this->filter!==false && $this->grid->filter!==null && $this->name!==null && strpos($this->name,'.')===false)
		{
			if(is_array($this->filter))
				echo CHtml::activeDropDownList($this->grid->filter, $this->name, $this->filter, array('id'=>false,'prompt'=>''));
			else if($this->filter===null)
				echo CHtml::activeTextField($this->grid->filter, $this->name, array('id'=>false));
		}
		else {
			echo $this->grid->blankDisplay;
		}
	}*/
}
?>