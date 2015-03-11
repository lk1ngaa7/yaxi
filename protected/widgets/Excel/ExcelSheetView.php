<?php
/**
 * ExcelSheetView class file.
 * PLEASE NOTE: In order to avoid changing all the "css" named properties to something else,
 * try to remember that the convention is as follows:
 * css files are php files that return an array consisting of PHPExcel_Style arrays
 * class names equivalent is the index of the array of the file explained here
 *
 * @author pligor <pligor@facebook.com>
 * @link http://www.facebook.com/pligor
 */

//require_once Yii::getPathOfAlias('ext');
Yii::import('ext.phpexcel.PHPExcel',true);

Yii::import('zii.widgets.CBaseListView');
Yii::import('application.widgets.Excel.ExcelColumn');

/**
 * ExcelSheetView exports a list of data items in terms of a table
 *
 * Each row of the table represents the data of a single data item, and a column usually represents
 * an attribute of the item (some columns may correspond to complex expression of attributes or static text)
 *
 * The code below first creates a data provider for the <code>Post</code> ActiveRecord class.
 * It then uses ExcelSheetView to display every attribute in every <code>Post</code> instance.
 * 
 * In order to selectively display attributes with different formats, we may configure the
 * {ExcelSheetView::columns} property. For example, we may specify only the <code>title</code>
 * and <code>create_time</code> attributes to be displayed, and the <code>create_time</code>
 * should be properly formatted to show as a time. We may also display the attributes of the related
 * objects using the dot-syntax as shown below:
 *
 * <pre>
 * $dataProvider=new CActiveDataProvider('Post');
 * $this->widget('application.widgets.ExcelSheetView', array(
 *     'dataProvider'=>$dataProvider,
 *     'columns'=>array(
 *         'title',          // display the 'title' attribute
 *         'category.name',  // display the 'name' attribute of the 'category' relation
 *         array(            // display 'create_time' using an expression
 *             'name' => 'create_time',
 *             'value' => 'date("M j, Y", $data->create_time)',
 *         ),
 *         array(            // display 'author.username' using an expression
 *             'name' => 'authorName',
 *             'value' => '$data->author->username',
 *         ),
 *     ),
 * ));
 * </pre>
 *
 * @author pligor <pligor@facebook.com>
 */
class ExcelSheetView extends CBaseListView {

	const FIRST_ROW = 1;

	/**
	 * @todo filter
	 * @var bool|array this can be a true or false value to define if the filter is applied in ALL of the columns
	 * Otherwise it can be an array in order to apply the filter in certain columns (zero based) 
	 */
	public $filter;
	
	/**
	 * @var array grid column configuration. Each array element represents the configuration
	 * for one particular grid column which can be either a string or an array.
	 *
	 * When a column is specified as a string, it should be in the format of "name:type:header",
	 * where "type" and "header" are optional. A ExcelColumn instance will be created in this case,
	 * whose ExcelColumn::name, ExcelColumn::type and ExcelColumn::header
	 * properties will be initialized accordingly.
	 *
	 * When a column is specified as an array, it will be used to create a grid column instance of ExcelColumn class.
	 */
	public $columns=array();
	/**
	 * @var boolean whether to display the table even when there is no data. Defaults to true.
	 * The {@link emptyText} will be displayed to indicate there is no data.
	 */
	public $showTableOnEmpty=true;
	/**
	 * @var string the text to be displayed in a data cell when a data value is null. Defaults to a single space.
	 */
	public $nullDisplay = ' ';
	/**
	 * @var string the text to be displayed in an empty grid cell. Defaults to a single space.
	 * This differs from nullDisplay in that nullDisplay is only used by ExcelColumn to render null data values.
	 */
	public $blankDisplay = ' ';
	/**
	 * @var boolean whether to hide the header cells of the grid. When this is true, header cells
	 * will not be rendered, which means the grid cannot be sorted anymore since the sort links are located
	 * in the header. Defaults to false.
	 */
	public $hideHeader=false;
	
	/**
	 * @var string the alias file used by this view.
	 * This is actually a php file with array styles as defined inside PHPExcel_Style class
	 */
	public $cssFile = 'application.widgets.assets.ExcelSheetView.styles';
	
	/**
	 * @var array the PHPExcel_Style indices for the table body rows.
	 * If multiple styles are given, they will be assigned to the rows sequentially and repeatedly.
	 * This property is ignored if rowCssClassExpression is set.
	 * Defaults to <code>array('odd', 'even')</code>.
	 * @see rowCssClassExpression
	 */
	public $rowCssClass=array('odd','even');
	
	/**
	 * @var string a PHP expression that is evaluated for every table body row and whose result
	 * is used as the style index for the row.
	 * In this expression, the variable
	 * <code>$row</code> stands for the row number (zero-based),
	 * <code>$data</code> is the data model associated with the row, and
	 * <code>$this</code> is the grid object.
	 * @see rowCssClass
	 */
	public $rowCssClassExpression;
	
	/**
	 * The name of this worksheet
	 * @var string
	 */
	public $title = 'worksheet';
	
	/**
	 * Holds the active sheet of the PHPExcel object
	 * @var PHPExcel_Worksheet
	 */
	public $sheet;
	
	/**
	 * Holds the phpexcel object
	 * @var PHPExcel
	 */
	protected $phpExcel;
	
	/**
	 * @var integer
	 */
	public $row;

	/**
	 * This is the format that the excel writer supports, defaults to Excel2003 xls format (Excel 5)
	 * @var string 
	 */
	public $format = 'Excel5';
	
	/**
	 * Stores the styles loaded
	 * @var array
	 */
	protected $_styles;
	
	/**
	 * @return array
	 */
	public function getStyles() {
		if( $this->_styles === null ) {
			$this->_styles = include Yii::getPathOfAlias($this->cssFile) .'.php';
		}
		return $this->_styles;
	}
	
	/**
	 * Creates a new PHPExcel object with ONE worksheet
	 */
	protected function createSheet() {
		//CHtmlEx::loadPHPExcel();
		$this->phpExcel = new PHPExcel();
		//CHtmlEx::unLoadPHPExcel();
		
		$this->phpExcel->getProperties()->setCreator(Yii::app()->params['adminName'])
		->setLastModifiedBy(Yii::app()->params['adminGreekName'])
		->setKeywords('george pligor')	//space delimited
		->setDescription('by '. Yii::app()->params['adminEmail'])
		//->setTitle($this->copyright)
		//->setSubject("PV Stats")
		//->setCategory("statistics")
		;
		
		$this->sheet = $this->phpExcel->getActiveSheet();
		$this->sheet->setTitle($this->title);
	}

	/**
	 * Initializes the grid view.
	 * This method will initialize required property values and instantiate columns objects.
	 */
	public function init() {
		parent::init();
		
		/**
		 * @todo this defaults to true, since there is no need for pagination inside a worksheet
		 * idea is to define the printable areas of the worksheet so each printed page has the number of rows we want
		 */
		$this->enablePagination = false;

		$this->createSheet();
		
		$this->initColumns();
		
		$this->row = $this->rowValidator($this->row) ? $this->row : self::FIRST_ROW;
		
		$this->itemsCssClass = 'thin_border';
	}

	/**
	 * Creates column objects and initializes them.
	 */
	protected function initColumns() {
		if($this->columns === array()) {
			if($this->dataProvider instanceof CActiveDataProvider) {
				$this->columns = $this->dataProvider->model->attributeNames();
			}
			else if($this->dataProvider instanceof IDataProvider) {
				//use the keys of the first row of data as the default columns
				$data=$this->dataProvider->getData();
				if(isset($data[0]) && is_array($data[0])) {
					$this->columns=array_keys($data[0]);
				}
			}
		}
		
		//below we alter the column from the specifications to a real ExcelColumn object
		foreach($this->columns as $i => $column) {
			if(is_string($column)) {
				$column=$this->createDataColumn($column);
			}
			else {
				if(isset( $column['class'] )) {
					$message = Yii::t('', 'Do NOT define column class, currently only valid column is the ExcelColumn');
					throw new Exception($message);
				}
				$column['class'] = 'ExcelColumn';
				$column=Yii::createComponent($column, $this);
			}
			
			if( !$column->visible ) {
				unset($this->columns[$i]);
				continue;
			}
			
			$column->id = $i;
			$column->idValidator();
			
			$this->columns[$i] = $column;
		}

		foreach($this->columns as $column) {
			$column->init();
		}
	}

	/**
	 * Creates an ExcelColumn based on a shortcut column specification string.
	 * @param string $text the column specification string
	 * @return ExcelColumn the column instance
	 */
	protected function createDataColumn($text) {
		if(!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/',$text,$matches)) {
			throw new CException(Yii::t('zii','The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
		}
		$column=new ExcelColumn($this);
		
		$column->name = $matches[1];
		
		if(isset($matches[3]) && $matches[3]!=='') {
			$column->type = $matches[3];
		}
		
		if(isset($matches[5])) {
			$column->header = $matches[5];
		}
		
		return $column;
	}
	
	/**
	 * Validates if the row is a valid excel row
	 * @param int $i
	 */
	public function rowValidator($i) {
		return ( $this->isUnsignedInteger($i) && ($i >= 1) );
	}
	
	public function isUnsignedInteger($val) {
		if(is_array($val) || is_object($val)) return false;
        $subject=str_replace(" ","",trim($val));
        $pattern = '/^([0-9]+)$/';
        $noMatches = preg_match($pattern, $subject);
        return ($noMatches===1);
    }
	
	/**
	 * @param string $fullpath
	 */
	public function writeExcel($fullpath) {
		$this->phpExcel->setActiveSheetIndex(0);	//reset active sheet index just before write
		
		try {
			//CHtmlEx::loadPHPExcel();
			$objWriter = PHPExcel_IOFactory::createWriter($this->phpExcel, $this->format);
			//CHtmlEx::unLoadPHPExcel();
			//print $fullpath;
			$objWriter->save($fullpath);
		}
		catch (Exception $e) {
			$message = Yii::t('', 'Writing excel file has failed');
			throw new CHttpException(500, $message);
		}
	}
	
	public function getFirstColumnIndex() {
		$column = reset($this->columns);
		if(is_object($column)) {
			return $column->id;
		}
		return reset( array_keys($this->columns) );
	}
	
	public function getLastColumnIndex() {
		$column = end($this->columns);
		if(is_object($column)) {
			return $column->id;
		}
		return end( array_keys($this->columns) );
	}
	
	public function getRowsCount() {
		return (!$this->hideHeader) + $this->dataProvider->getItemCount() + $this->getHasFooter(); 
	}
	
	public function getRowRange() {
		//CHtmlEx::loadPHPExcel();
		$leftCoordinate = PHPExcel_Cell::stringFromColumnIndex($this->firstColumnIndex) . $this->row;
		$rightCoordinate = PHPExcel_Cell::stringFromColumnIndex($this->lastColumnIndex) . $this->row;
		//CHtmlEx::unLoadPHPExcel();
		
		return $leftCoordinate .':'. $rightCoordinate;
	}
	
	protected function getUrlNfullpath($subdir,$filename) {
		$subdir = trim($subdir,DIRECTORY_SEPARATOR);
		
		//$fullpath = Yii::getPathOfAlias("webroot.$subdir") ."/$filename"; this is NOT working on tests (see webroot alias definition)
		$fullpath = Yii::getPathOfAlias('application') .'/../' . $subdir .'/'. $filename;
		
		//self::complyString2host($subdir);
		//self::complyString2host($filename);
		//$subdir = urlencode($subdir);
		//$filename = urlencode($filename);
		$url = Yii::app()->getBaseUrl() ."/$subdir/$filename";
		
		return compact('url', 'fullpath');
	}

	/**
	 * Renders the data items for the grid view.
	 */
	public function renderItems() {
		if($this->dataProvider->getItemCount()>0 || $this->showTableOnEmpty) {
			//CHtmlEx::loadPHPExcel();
			$topLeftCoordinate = PHPExcel_Cell::stringFromColumnIndex($this->firstColumnIndex) . $this->row;
			$bottomRightCoordinate = PHPExcel_Cell::stringFromColumnIndex($this->lastColumnIndex) . ($this->row + $this->rowsCount - 1);
			//CHtmlEx::unLoadPHPExcel();
			
			$this->sheet->getStyle($topLeftCoordinate .':'. $bottomRightCoordinate)->applyFromArray($this->styles[$this->itemsCssClass], false);
			
			$this->renderTableHeader();
			$this->renderTableBody();
			$this->renderTableFooter();
			
			$filename = $this->title .'.xls';
			$subdir = 'files';
			extract( $this->getUrlNfullpath($subdir, $filename) );
			$this->writeExcel($fullpath);
			print Yii::t('', 'Please click here to download the file') .': '. CHtml::link($filename,$url);
		}
		else {
			$this->renderEmptyText();
		}
	}

	/**
	 * Renders the table header.
	 */
	public function renderTableHeader() {
		if(!$this->hideHeader) {
			foreach($this->columns as $column) {
				$column->renderHeaderCell();
			}
			//$this->renderFilter();
			$this->row++;
		}
	}
	
	/**
	 * Renders the table body.
	 */
	public function renderTableBody() {
		$data=$this->dataProvider->getData();
		$n=count($data);

		if($n>0) {
			for($row=0; $row<$n; ++$row) {
				$this->renderTableRow($row);
				$this->row++;
			}
		}
		else {
			$this->renderEmptyText();
		}
	}
	
	/**
	 * Renders a table body row.
	 * @param integer $row the row number (zero-based).
	 */
	public function renderTableRow($row) {
		if($this->rowCssClassExpression !== null) {
			$data = $this->dataProvider->data[$row];
			$style = $this->evaluateExpression($this->rowCssClassExpression,array('row'=>$row,'data'=>$data));
		}
		elseif(is_array($this->rowCssClass) && ($n=count($this->rowCssClass))>0) {
			$style = $this->rowCssClass[$row%$n];
		}
		
		if( isset($style) ) {
			$this->sheet->getStyle($this->rowRange)->applyFromArray($this->styles[$style]);
		}
		
		foreach($this->columns as $column) {
			$column->renderDataCell($row);
		}
	}

	/**
	 * Renders the table footer.
	 */
	public function renderTableFooter() {
		if($this->getHasFooter()) {
			foreach($this->columns as $column) {
				$column->renderFooterCell();
			}
			$this->row++;
		}
	}

	/**
	 * @return boolean whether the table should render a footer.
	 * This is true if any of the {@link columns} has a true {@link CGridColumn::hasFooter} value.
	 */
	public function getHasFooter() {
		foreach($this->columns as $column)
			if($column->getHasFooter()) {
				return true;
			}
		return false;
	}

	/**
	 * Renders the filter
	 */
	/*public function renderFilter()
	{
		if($this->filter!==null)
		{
			echo "<tr class=\"{$this->filterCssClass}\">\n";
			foreach($this->columns as $column)
				$column->renderFilterCell();
			echo "</tr>\n";
		}
	}*/
}