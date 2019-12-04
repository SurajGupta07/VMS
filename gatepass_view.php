<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/gatepass.php");
	include("$currDir/gatepass_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('gatepass');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "gatepass";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`gatepass`.`id`" => "id",
		"TIME_FORMAT(`gatepass`.`entry_time`, '%r')" => "entry_time",
		"TIME_FORMAT(`gatepass`.`exit_time`, '%r')" => "exit_time",
		"IF(    CHAR_LENGTH(`gates1`.`name`), CONCAT_WS('',   `gates1`.`name`), '') /* gate */" => "gate",
		"`gatepass`.`purpose_of_visit`" => "purpose_of_visit",
		"IF(    CHAR_LENGTH(`staff1`.`full_name`) || CHAR_LENGTH(`staff1`.`national_id`), CONCAT_WS('',   `staff1`.`full_name`, ' :', `staff1`.`national_id`), '') /* InvitedBy */" => "invited_by",
		"IF(    CHAR_LENGTH(`staff2`.`full_name`) || CHAR_LENGTH(`staff2`.`national_id`), CONCAT_WS('',   `staff2`.`full_name`, ' :', `staff2`.`national_id`), '') /* Staff */" => "staff",
		"IF(    CHAR_LENGTH(`individuals1`.`full_name`) || CHAR_LENGTH(`individuals1`.`national_id`), CONCAT_WS('',   `individuals1`.`full_name`, ' :', `individuals1`.`national_id`), '') /* Individual */" => "individual",
		"IF(    CHAR_LENGTH(`kikundi1`.`group_name`), CONCAT_WS('',   `kikundi1`.`group_name`), '') /* Group */" => "group",
		"IF(    CHAR_LENGTH(`vehicles1`.`reg_number`), CONCAT_WS('',   `vehicles1`.`reg_number`), '') /* Vehicle */" => "vehicle",
		"IF(    CHAR_LENGTH(`luggage1`.`type`) || CHAR_LENGTH(`luggage1`.`name`), CONCAT_WS('',   `luggage1`.`type`, ' :', `luggage1`.`name`), '') /* Luggage */" => "luggage",
		"if(`gatepass`.`date`,date_format(`gatepass`.`date`,'%d/%m/%Y'),'')" => "date",
		"`gatepass`.`status`" => "status",
		"`gatepass`.`reason`" => "reason"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`gatepass`.`id`',
		2 => '`gatepass`.`entry_time`',
		3 => '`gatepass`.`exit_time`',
		4 => '`gates1`.`name`',
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => '`kikundi1`.`group_name`',
		10 => '`vehicles1`.`reg_number`',
		11 => 11,
		12 => '`gatepass`.`date`',
		13 => 13,
		14 => 14
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`gatepass`.`id`" => "id",
		"TIME_FORMAT(`gatepass`.`entry_time`, '%r')" => "entry_time",
		"TIME_FORMAT(`gatepass`.`exit_time`, '%r')" => "exit_time",
		"IF(    CHAR_LENGTH(`gates1`.`name`), CONCAT_WS('',   `gates1`.`name`), '') /* gate */" => "gate",
		"`gatepass`.`purpose_of_visit`" => "purpose_of_visit",
		"IF(    CHAR_LENGTH(`staff1`.`full_name`) || CHAR_LENGTH(`staff1`.`national_id`), CONCAT_WS('',   `staff1`.`full_name`, ' :', `staff1`.`national_id`), '') /* InvitedBy */" => "invited_by",
		"IF(    CHAR_LENGTH(`staff2`.`full_name`) || CHAR_LENGTH(`staff2`.`national_id`), CONCAT_WS('',   `staff2`.`full_name`, ' :', `staff2`.`national_id`), '') /* Staff */" => "staff",
		"IF(    CHAR_LENGTH(`individuals1`.`full_name`) || CHAR_LENGTH(`individuals1`.`national_id`), CONCAT_WS('',   `individuals1`.`full_name`, ' :', `individuals1`.`national_id`), '') /* Individual */" => "individual",
		"IF(    CHAR_LENGTH(`kikundi1`.`group_name`), CONCAT_WS('',   `kikundi1`.`group_name`), '') /* Group */" => "group",
		"IF(    CHAR_LENGTH(`vehicles1`.`reg_number`), CONCAT_WS('',   `vehicles1`.`reg_number`), '') /* Vehicle */" => "vehicle",
		"IF(    CHAR_LENGTH(`luggage1`.`type`) || CHAR_LENGTH(`luggage1`.`name`), CONCAT_WS('',   `luggage1`.`type`, ' :', `luggage1`.`name`), '') /* Luggage */" => "luggage",
		"if(`gatepass`.`date`,date_format(`gatepass`.`date`,'%d/%m/%Y'),'')" => "date",
		"`gatepass`.`status`" => "status",
		"`gatepass`.`reason`" => "reason"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`gatepass`.`id`" => "id",
		"`gatepass`.`entry_time`" => "EntryTime",
		"`gatepass`.`exit_time`" => "ExitTime",
		"IF(    CHAR_LENGTH(`gates1`.`name`), CONCAT_WS('',   `gates1`.`name`), '') /* gate */" => "gate",
		"`gatepass`.`purpose_of_visit`" => "Purpose_Of_Visit",
		"IF(    CHAR_LENGTH(`staff1`.`full_name`) || CHAR_LENGTH(`staff1`.`national_id`), CONCAT_WS('',   `staff1`.`full_name`, ' :', `staff1`.`national_id`), '') /* InvitedBy */" => "InvitedBy",
		"IF(    CHAR_LENGTH(`staff2`.`full_name`) || CHAR_LENGTH(`staff2`.`national_id`), CONCAT_WS('',   `staff2`.`full_name`, ' :', `staff2`.`national_id`), '') /* Staff */" => "Staff",
		"IF(    CHAR_LENGTH(`individuals1`.`full_name`) || CHAR_LENGTH(`individuals1`.`national_id`), CONCAT_WS('',   `individuals1`.`full_name`, ' :', `individuals1`.`national_id`), '') /* Individual */" => "Individual",
		"IF(    CHAR_LENGTH(`kikundi1`.`group_name`), CONCAT_WS('',   `kikundi1`.`group_name`), '') /* Group */" => "Group",
		"IF(    CHAR_LENGTH(`vehicles1`.`reg_number`), CONCAT_WS('',   `vehicles1`.`reg_number`), '') /* Vehicle */" => "Vehicle",
		"IF(    CHAR_LENGTH(`luggage1`.`type`) || CHAR_LENGTH(`luggage1`.`name`), CONCAT_WS('',   `luggage1`.`type`, ' :', `luggage1`.`name`), '') /* Luggage */" => "Luggage",
		"`gatepass`.`date`" => "Date",
		"`gatepass`.`status`" => "Status",
		"`gatepass`.`reason`" => "Reason"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`gatepass`.`id`" => "id",
		"TIME_FORMAT(`gatepass`.`entry_time`, '%r')" => "entry_time",
		"TIME_FORMAT(`gatepass`.`exit_time`, '%r')" => "exit_time",
		"IF(    CHAR_LENGTH(`gates1`.`name`), CONCAT_WS('',   `gates1`.`name`), '') /* gate */" => "gate",
		"`gatepass`.`purpose_of_visit`" => "purpose_of_visit",
		"IF(    CHAR_LENGTH(`staff1`.`full_name`) || CHAR_LENGTH(`staff1`.`national_id`), CONCAT_WS('',   `staff1`.`full_name`, ' :', `staff1`.`national_id`), '') /* InvitedBy */" => "invited_by",
		"IF(    CHAR_LENGTH(`staff2`.`full_name`) || CHAR_LENGTH(`staff2`.`national_id`), CONCAT_WS('',   `staff2`.`full_name`, ' :', `staff2`.`national_id`), '') /* Staff */" => "staff",
		"IF(    CHAR_LENGTH(`individuals1`.`full_name`) || CHAR_LENGTH(`individuals1`.`national_id`), CONCAT_WS('',   `individuals1`.`full_name`, ' :', `individuals1`.`national_id`), '') /* Individual */" => "individual",
		"IF(    CHAR_LENGTH(`kikundi1`.`group_name`), CONCAT_WS('',   `kikundi1`.`group_name`), '') /* Group */" => "group",
		"IF(    CHAR_LENGTH(`vehicles1`.`reg_number`), CONCAT_WS('',   `vehicles1`.`reg_number`), '') /* Vehicle */" => "vehicle",
		"IF(    CHAR_LENGTH(`luggage1`.`type`) || CHAR_LENGTH(`luggage1`.`name`), CONCAT_WS('',   `luggage1`.`type`, ' :', `luggage1`.`name`), '') /* Luggage */" => "luggage",
		"if(`gatepass`.`date`,date_format(`gatepass`.`date`,'%d/%m/%Y'),'')" => "date",
		"`gatepass`.`status`" => "status",
		"`gatepass`.`reason`" => "reason"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'gate' => 'gate', 'invited_by' => 'InvitedBy', 'staff' => 'Staff', 'individual' => 'Individual', 'group' => 'Group', 'vehicle' => 'Vehicle', 'luggage' => 'Luggage');

	$x->QueryFrom = "`gatepass` LEFT JOIN `gates` as gates1 ON `gates1`.`id`=`gatepass`.`gate` LEFT JOIN `staff` as staff1 ON `staff1`.`id`=`gatepass`.`invited_by` LEFT JOIN `staff` as staff2 ON `staff2`.`id`=`gatepass`.`staff` LEFT JOIN `individuals` as individuals1 ON `individuals1`.`id`=`gatepass`.`individual` LEFT JOIN `kikundi` as kikundi1 ON `kikundi1`.`id`=`gatepass`.`group` LEFT JOIN `vehicles` as vehicles1 ON `vehicles1`.`id`=`gatepass`.`vehicle` LEFT JOIN `luggage` as luggage1 ON `luggage1`.`id`=`gatepass`.`luggage` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 0;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 50;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "gatepass_view.php";
	$x->RedirectAfterInsert = "gatepass_view.php";
	$x->TableTitle = "gatepass";
	$x->TableIcon = "resources/table_icons/change_password.png";
	$x->PrimaryKey = "`gatepass`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("id", "EntryTime", "ExitTime", "gate", "Purpose_Of_Visit", "InvitedBy", "Staff", "Individual", "Group", "Vehicle", "Luggage", "Date", "Status", "Reason");
	$x->ColFieldName = array('id', 'entry_time', 'exit_time', 'gate', 'purpose_of_visit', 'invited_by', 'staff', 'individual', 'group', 'vehicle', 'luggage', 'date', 'status', 'reason');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);

	// template paths below are based on the app main directory
	$x->Template = 'templates/gatepass_templateTV.html';
	$x->SelectedTemplate = 'templates/gatepass_templateTVS.html';
	$x->TemplateDV = 'templates/gatepass_templateDV.html';
	$x->TemplateDVP = 'templates/gatepass_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `gatepass`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='gatepass' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `gatepass`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='gatepass' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`gatepass`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: gatepass_init
	$render=TRUE;
	if(function_exists('gatepass_init')){
		$args=array();
		$render=gatepass_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: gatepass_header
	$headerCode='';
	if(function_exists('gatepass_header')){
		$args=array();
		$headerCode=gatepass_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: gatepass_footer
	$footerCode='';
	if(function_exists('gatepass_footer')){
		$args=array();
		$footerCode=gatepass_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>