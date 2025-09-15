<?php 
function get_categories_list()
{
    return array(
        array('id'=>'0','name'=>'New Books','status'=>1, 'icon'=>'book'),
        array('id'=>'1','name'=>'Children','status'=>1, 'icon'=>'emoji-smile'),
        array('id'=>'2','name'=>'Fiction','status'=>1, 'icon'=>'book-half'),
        array('id'=>'3','name'=>'Non-Fiction','status'=>1, 'icon'=>'journal-text'),
        array('id'=>'4','name'=>'Science','status'=>0, 'icon'=>'beaker'),
        array('id'=>'5','name'=>'Technology','status'=>1, 'icon'=>'cpu'),
        array('id'=>'6','name'=>'History','status'=>1, 'icon'=>'hourglass-split'),
        array('id'=>'7','name'=>'Biographies','status'=>1, 'icon'=>'person-badge'),
        array('id'=>'8','name'=>'Comics','status'=>1, 'icon'=>'file-earmark-richtext'),
        array('id'=>'9','name'=>'Travel','status'=>1, 'icon'=>'geo-alt'),
        array('id'=>'10','name'=>'Academics','status'=>1, 'icon'=>'book'),
    );
}

function get_categories_name($id){
	if(!empty($id)){
		$all_list = get_categories_list();
		foreach ($all_list as $key => $value) {
		if($key==$id){
			return $value['name'];
		}
	}
	}else{
		return 'N/A';
	}
} 