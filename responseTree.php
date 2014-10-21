<?php
	function GetChildrenNodes($id ,$tree, $type){
		$typeid = 0;
		$subtype = '';
		$hasChildren = true;
		$icon = '';	
		$id1 =$id.'1';
		$id2 = $id.'2';	
		switch($type){
			case "ROOT":
				$subtype = 'CLASSIFIER';
				$icon = 'img/ClassifierIcon.gif';
				$typeid = 1;
				break;
			case "CLASSIFIER":
				$subtype = 'SUBCLASSIFIER';
				$icon = 'img/ClassifierIcon.gif';
				$typeid = 2;
				break;
			case "SUBCLASSIFIER":
				$subtype = 'POS';
				$icon = 'img/position_s.png';
				$typeid = 3;
				break;
			case "POS":
				$subtype = 'MAP';
				$icon = 'img/map_s.png';
				$typeid = 4;
				break;
			case "MAP":
				$subtype = 'SKILLGROUP';
				$icon = 'img/Skill_group_16.png';
				$typeid = 5;
				break;
			case "SKILLGROUP":
				$subtype = 'SKILL';
				$icon = 'img/skill_16.png';
				$typeid = 6;
				break;
			case "SKILL":
				$subtype = 'SKILLDESCRIPTION';
				$icon = 'img/skill_description_16.png';
				$typeid = 7;
				break;
			case "SKILLDESCRIPTION":
				$subtype = 'TASK';
				$icon = 'img/tick.png';
				$hasChildren = false;
				$typeid = 8;
				break;
		}
		
		$state = $hasChildren?'"closed"':'null';
		
		return '	[
			{"data":{"title":"'.$subtype.' '.$id1.'"},"icon":"'.$icon.'","state":'.$state.',"attr":{"nodeid":"'.$id1.'","id":"'.$tree.'_'.$subtype.'_'.$id1.'","type":"'.$subtype.'","parentid":"'.$tree.'_'.$type.'_'.$id.'","title":"'. $subtype .'","contextmenuid":"contextmenuid","typeid":"'.$typeid.'"}}
			,{"data":{"title":"'.$subtype.' '.$id2.'"},"icon":"'.$icon.'","state":'.$state.',"attr":{"nodeid":"'.$id2.'","id":"'.$tree.'_'.$subtype.'_'.$id2.'","type":"'.$subtype.'","parentid":"'.$tree.'_'.$type.'_'.$id.'","title":"'. $subtype .'","contextmenuid":"contextmenuid","typeid":"'.$typeid.'"}}
		]';		
	};

	$id = $_GET['id'];
	$tree = $_GET['tree'];
	$type = $_GET['type'];
	
	echo  GetChildrenNodes($id, $tree, $type);
	

	
	
	

?>