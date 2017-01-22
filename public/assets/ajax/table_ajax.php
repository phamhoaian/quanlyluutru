<?php
  /* 
   * Paging
   */

  $iTotalRecords = 178;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  $status_list = array(
    array("success" => "Pending"),
    array("info" => "Closed"),
    array("danger" => "On Hold"),
    array("warning" => "Fraud")
  );

  for($i = $iDisplayStart; $i < $end; $i++) {
    $status = $status_list[rand(0, 2)];
    $id = ($i + 1);
    $records["data"][] = array(
      'Nhà nghỉ Ánh Ngọc',
      'Trần Văn A',
      rand(1950, 2010),
      'Nam',
      '280909090',
      'Thuận An, Bình Dương',
      rand(101, 200),
      '12/12/2016 12:34',
      '12/12/2016 12:34',
   );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>