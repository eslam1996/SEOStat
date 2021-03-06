<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "tbl_twitter_statinfo.php" ?>
<?php include "tbl_userinfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Create page object
$tbl_twitter_stat_delete = new ctbl_twitter_stat_delete();
$Page =& $tbl_twitter_stat_delete;

// Page init
$tbl_twitter_stat_delete->Page_Init();

// Page main
$tbl_twitter_stat_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_twitter_stat_delete = new ew_Page("tbl_twitter_stat_delete");

// page properties
tbl_twitter_stat_delete.PageID = "delete"; // page ID
tbl_twitter_stat_delete.FormID = "ftbl_twitter_statdelete"; // form ID
var EW_PAGE_ID = tbl_twitter_stat_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_twitter_stat_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_twitter_stat_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_twitter_stat_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_twitter_stat_delete.ValidateRequired = false; // no JavaScript validation
<?php } ?>

// search highlight properties
tbl_twitter_stat_delete.ShowHighlightText = ewLanguage.Phrase("ShowHighlight"); 
tbl_twitter_stat_delete.HideHighlightText = ewLanguage.Phrase("HideHighlight");

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php

// Load records for display
if ($rs = $tbl_twitter_stat_delete->LoadRecordset())
	$tbl_twitter_stat_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($tbl_twitter_stat_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$tbl_twitter_stat_delete->Page_Terminate("tbl_twitter_statlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_twitter_stat->TableCaption() ?><br><br>
<a href="<?php echo $tbl_twitter_stat->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$tbl_twitter_stat_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_twitter_stat">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_twitter_stat_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $tbl_twitter_stat->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $tbl_twitter_stat->id_profile->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->stat_date->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->year->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->month->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->week->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->following->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->followers->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->listed->FldCaption() ?></td>
		<td valign="top"><?php echo $tbl_twitter_stat->tweets->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_twitter_stat_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$tbl_twitter_stat_delete->lRecCnt++;

	// Set row properties
	$tbl_twitter_stat->CssClass = "";
	$tbl_twitter_stat->CssStyle = "";
	$tbl_twitter_stat->RowAttrs = array();
	$tbl_twitter_stat->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_twitter_stat_delete->LoadRowValues($rs);

	// Render row
	$tbl_twitter_stat_delete->RenderRow();
?>
	<tr<?php echo $tbl_twitter_stat->RowAttributes() ?>>
		<td<?php echo $tbl_twitter_stat->id_profile->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->id_profile->ViewAttributes() ?>><?php echo $tbl_twitter_stat->id_profile->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->stat_date->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->stat_date->ViewAttributes() ?>><?php echo $tbl_twitter_stat->stat_date->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->year->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->year->ViewAttributes() ?>><?php echo $tbl_twitter_stat->year->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->month->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->month->ViewAttributes() ?>><?php echo $tbl_twitter_stat->month->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->week->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->week->ViewAttributes() ?>><?php echo $tbl_twitter_stat->week->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->following->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->following->ViewAttributes() ?>><?php echo $tbl_twitter_stat->following->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->followers->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->followers->ViewAttributes() ?>><?php echo $tbl_twitter_stat->followers->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->listed->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->listed->ViewAttributes() ?>><?php echo $tbl_twitter_stat->listed->ListViewValue() ?></div></td>
		<td<?php echo $tbl_twitter_stat->tweets->CellAttributes() ?>>
<div<?php echo $tbl_twitter_stat->tweets->ViewAttributes() ?>><?php echo $tbl_twitter_stat->tweets->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo ew_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$tbl_twitter_stat_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_twitter_stat_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'tbl_twitter_stat';

	// Page object name
	var $PageObjName = 'tbl_twitter_stat_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_twitter_stat;
		if ($tbl_twitter_stat->UseTokenInUrl) $PageUrl .= "t=" . $tbl_twitter_stat->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage);
		if ($sMessage <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $sMessage . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $tbl_twitter_stat;
		if ($tbl_twitter_stat->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_twitter_stat->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_twitter_stat->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_twitter_stat_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (tbl_twitter_stat)
		$GLOBALS["tbl_twitter_stat"] = new ctbl_twitter_stat();

		// Table object (tbl_user)
		$GLOBALS['tbl_user'] = new ctbl_user();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_twitter_stat', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $tbl_twitter_stat;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("tbl_twitter_statlist.php");
		}

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $tbl_twitter_stat;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["id_profile"] <> "") {
			$tbl_twitter_stat->id_profile->setQueryStringValue($_GET["id_profile"]);
			if (!is_numeric($tbl_twitter_stat->id_profile->QueryStringValue))
				$this->Page_Terminate("tbl_twitter_statlist.php"); // Prevent SQL injection, exit
			$sKey .= $tbl_twitter_stat->id_profile->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if (@$_GET["stat_date"] <> "") {
			$tbl_twitter_stat->stat_date->setQueryStringValue($_GET["stat_date"]);
			if ($sKey <> "") $sKey .= EW_COMPOSITE_KEY_SEPARATOR;
			$sKey .= $tbl_twitter_stat->stat_date->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("tbl_twitter_statlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";
			$arKeyFlds = explode(EW_COMPOSITE_KEY_SEPARATOR, trim($sKey)); // Split key by separator
			if (count($arKeyFlds) <> 2)
				$this->Page_Terminate($tbl_twitter_stat->getReturnUrl()); // Invalid key, exit

			// Set up key field
			$sKeyFld = $arKeyFlds[0];
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("tbl_twitter_statlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`id_profile`=" . ew_AdjustSql($sKeyFld) . " AND ";

			// Set up key field
			$sKeyFld = $arKeyFlds[1];
			$sFilter .= "`stat_date`='" . ew_AdjustSql($sKeyFld) . "' AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in tbl_twitter_stat class, tbl_twitter_statinfo.php

		$tbl_twitter_stat->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_twitter_stat->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_twitter_stat->CurrentAction = "D"; // Delete record directly
		}
		switch ($tbl_twitter_stat->CurrentAction) {
			case "D": // Delete
				$tbl_twitter_stat->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($tbl_twitter_stat->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $tbl_twitter_stat;
		$DeleteRows = TRUE;
		$sWrkFilter = $tbl_twitter_stat->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in tbl_twitter_stat class, tbl_twitter_statinfo.php

		$tbl_twitter_stat->CurrentFilter = $sWrkFilter;
		$sSql = $tbl_twitter_stat->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $tbl_twitter_stat->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['id_profile'];
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['stat_date'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_twitter_stat->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_twitter_stat->CancelMessage <> "") {
				$this->setMessage($tbl_twitter_stat->CancelMessage);
				$tbl_twitter_stat->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$tbl_twitter_stat->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_twitter_stat;

		// Call Recordset Selecting event
		$tbl_twitter_stat->Recordset_Selecting($tbl_twitter_stat->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_twitter_stat->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_twitter_stat->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_twitter_stat;
		$sFilter = $tbl_twitter_stat->KeyFilter();

		// Call Row Selecting event
		$tbl_twitter_stat->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_twitter_stat->CurrentFilter = $sFilter;
		$sSql = $tbl_twitter_stat->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$tbl_twitter_stat->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $tbl_twitter_stat;
		$tbl_twitter_stat->id_profile->setDbValue($rs->fields('id_profile'));
		$tbl_twitter_stat->stat_date->setDbValue($rs->fields('stat_date'));
		$tbl_twitter_stat->year->setDbValue($rs->fields('year'));
		$tbl_twitter_stat->month->setDbValue($rs->fields('month'));
		$tbl_twitter_stat->week->setDbValue($rs->fields('week'));
		$tbl_twitter_stat->following->setDbValue($rs->fields('following'));
		$tbl_twitter_stat->followers->setDbValue($rs->fields('followers'));
		$tbl_twitter_stat->listed->setDbValue($rs->fields('listed'));
		$tbl_twitter_stat->tweets->setDbValue($rs->fields('tweets'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_twitter_stat;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_twitter_stat->Row_Rendering();

		// Common render codes for all row types
		// id_profile

		$tbl_twitter_stat->id_profile->CellCssStyle = "white-space: nowrap;"; $tbl_twitter_stat->id_profile->CellCssClass = "";
		$tbl_twitter_stat->id_profile->CellAttrs = array(); $tbl_twitter_stat->id_profile->ViewAttrs = array(); $tbl_twitter_stat->id_profile->EditAttrs = array();

		// stat_date
		$tbl_twitter_stat->stat_date->CellCssStyle = ""; $tbl_twitter_stat->stat_date->CellCssClass = "";
		$tbl_twitter_stat->stat_date->CellAttrs = array(); $tbl_twitter_stat->stat_date->ViewAttrs = array(); $tbl_twitter_stat->stat_date->EditAttrs = array();

		// year
		$tbl_twitter_stat->year->CellCssStyle = ""; $tbl_twitter_stat->year->CellCssClass = "";
		$tbl_twitter_stat->year->CellAttrs = array(); $tbl_twitter_stat->year->ViewAttrs = array(); $tbl_twitter_stat->year->EditAttrs = array();

		// month
		$tbl_twitter_stat->month->CellCssStyle = ""; $tbl_twitter_stat->month->CellCssClass = "";
		$tbl_twitter_stat->month->CellAttrs = array(); $tbl_twitter_stat->month->ViewAttrs = array(); $tbl_twitter_stat->month->EditAttrs = array();

		// week
		$tbl_twitter_stat->week->CellCssStyle = ""; $tbl_twitter_stat->week->CellCssClass = "";
		$tbl_twitter_stat->week->CellAttrs = array(); $tbl_twitter_stat->week->ViewAttrs = array(); $tbl_twitter_stat->week->EditAttrs = array();

		// following
		$tbl_twitter_stat->following->CellCssStyle = ""; $tbl_twitter_stat->following->CellCssClass = "";
		$tbl_twitter_stat->following->CellAttrs = array(); $tbl_twitter_stat->following->ViewAttrs = array(); $tbl_twitter_stat->following->EditAttrs = array();

		// followers
		$tbl_twitter_stat->followers->CellCssStyle = ""; $tbl_twitter_stat->followers->CellCssClass = "";
		$tbl_twitter_stat->followers->CellAttrs = array(); $tbl_twitter_stat->followers->ViewAttrs = array(); $tbl_twitter_stat->followers->EditAttrs = array();

		// listed
		$tbl_twitter_stat->listed->CellCssStyle = ""; $tbl_twitter_stat->listed->CellCssClass = "";
		$tbl_twitter_stat->listed->CellAttrs = array(); $tbl_twitter_stat->listed->ViewAttrs = array(); $tbl_twitter_stat->listed->EditAttrs = array();

		// tweets
		$tbl_twitter_stat->tweets->CellCssStyle = ""; $tbl_twitter_stat->tweets->CellCssClass = "";
		$tbl_twitter_stat->tweets->CellAttrs = array(); $tbl_twitter_stat->tweets->ViewAttrs = array(); $tbl_twitter_stat->tweets->EditAttrs = array();
		if ($tbl_twitter_stat->RowType == EW_ROWTYPE_VIEW) { // View row

			// id_profile
			if (strval($tbl_twitter_stat->id_profile->CurrentValue) <> "") {
				$sFilterWrk = "`id` = " . ew_AdjustSql($tbl_twitter_stat->id_profile->CurrentValue) . "";
			$sSqlWrk = "SELECT DISTINCT `name` FROM `tbl_profile`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . "is_active = '1'" . ")";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_twitter_stat->id_profile->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$tbl_twitter_stat->id_profile->ViewValue = $tbl_twitter_stat->id_profile->CurrentValue;
				}
			} else {
				$tbl_twitter_stat->id_profile->ViewValue = NULL;
			}
			$tbl_twitter_stat->id_profile->CssStyle = "";
			$tbl_twitter_stat->id_profile->CssClass = "";
			$tbl_twitter_stat->id_profile->ViewCustomAttributes = "";

			// stat_date
			$tbl_twitter_stat->stat_date->ViewValue = $tbl_twitter_stat->stat_date->CurrentValue;
			$tbl_twitter_stat->stat_date->ViewValue = ew_FormatDateTime($tbl_twitter_stat->stat_date->ViewValue, 5);
			$tbl_twitter_stat->stat_date->CssStyle = "";
			$tbl_twitter_stat->stat_date->CssClass = "";
			$tbl_twitter_stat->stat_date->ViewCustomAttributes = "";

			// year
			$tbl_twitter_stat->year->ViewValue = $tbl_twitter_stat->year->CurrentValue;
			$tbl_twitter_stat->year->CssStyle = "";
			$tbl_twitter_stat->year->CssClass = "";
			$tbl_twitter_stat->year->ViewCustomAttributes = "";

			// month
			$tbl_twitter_stat->month->ViewValue = $tbl_twitter_stat->month->CurrentValue;
			$tbl_twitter_stat->month->CssStyle = "";
			$tbl_twitter_stat->month->CssClass = "";
			$tbl_twitter_stat->month->ViewCustomAttributes = "";

			// week
			$tbl_twitter_stat->week->ViewValue = $tbl_twitter_stat->week->CurrentValue;
			$tbl_twitter_stat->week->CssStyle = "";
			$tbl_twitter_stat->week->CssClass = "";
			$tbl_twitter_stat->week->ViewCustomAttributes = "";

			// following
			$tbl_twitter_stat->following->ViewValue = $tbl_twitter_stat->following->CurrentValue;
			$tbl_twitter_stat->following->CssStyle = "";
			$tbl_twitter_stat->following->CssClass = "";
			$tbl_twitter_stat->following->ViewCustomAttributes = "";

			// followers
			$tbl_twitter_stat->followers->ViewValue = $tbl_twitter_stat->followers->CurrentValue;
			$tbl_twitter_stat->followers->CssStyle = "";
			$tbl_twitter_stat->followers->CssClass = "";
			$tbl_twitter_stat->followers->ViewCustomAttributes = "";

			// listed
			$tbl_twitter_stat->listed->ViewValue = $tbl_twitter_stat->listed->CurrentValue;
			$tbl_twitter_stat->listed->CssStyle = "";
			$tbl_twitter_stat->listed->CssClass = "";
			$tbl_twitter_stat->listed->ViewCustomAttributes = "";

			// tweets
			$tbl_twitter_stat->tweets->ViewValue = $tbl_twitter_stat->tweets->CurrentValue;
			$tbl_twitter_stat->tweets->CssStyle = "";
			$tbl_twitter_stat->tweets->CssClass = "";
			$tbl_twitter_stat->tweets->ViewCustomAttributes = "";

			// id_profile
			$tbl_twitter_stat->id_profile->HrefValue = "";
			$tbl_twitter_stat->id_profile->TooltipValue = "";

			// stat_date
			$tbl_twitter_stat->stat_date->HrefValue = "";
			$tbl_twitter_stat->stat_date->TooltipValue = "";

			// year
			$tbl_twitter_stat->year->HrefValue = "";
			$tbl_twitter_stat->year->TooltipValue = "";

			// month
			$tbl_twitter_stat->month->HrefValue = "";
			$tbl_twitter_stat->month->TooltipValue = "";

			// week
			$tbl_twitter_stat->week->HrefValue = "";
			$tbl_twitter_stat->week->TooltipValue = "";

			// following
			$tbl_twitter_stat->following->HrefValue = "";
			$tbl_twitter_stat->following->TooltipValue = "";

			// followers
			$tbl_twitter_stat->followers->HrefValue = "";
			$tbl_twitter_stat->followers->TooltipValue = "";

			// listed
			$tbl_twitter_stat->listed->HrefValue = "";
			$tbl_twitter_stat->listed->TooltipValue = "";

			// tweets
			$tbl_twitter_stat->tweets->HrefValue = "";
			$tbl_twitter_stat->tweets->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_twitter_stat->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$tbl_twitter_stat->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	function Message_Showing(&$msg) {

		// Example:
		//$msg = "your new message";

	}
}
?>
