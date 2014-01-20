<? defined('KOOWA') or die('Restricted Access');

$id = KRequest::get('get.parent_id', 'int') ? KRequest::get('get.parent_id', 'int') : KRequest::get('get.ids', 'raw');
$type = KRequest::get('get.type', 'string');
$name = KRequest::get('get.name', 'string');

if(is_array($id)) {
	echo $this->getService('com://admin/taxonomy.template.helper.listbox')->taxonomies(array('name' => $name, 'filter' => array('ids' => $id, 'type' => $type), 'attribs' => array('multiple' => true, 'size' => 10)));
}
else if(!is_array($id)) {
	echo $this->getService('com://admin/taxonomy.template.helper.listbox')->taxonomies(array('name' => $name, 'filter' => array('parent_id' => $id, 'type' => $type), 'attribs' => array('multiple' => true, 'size' => 10)));
} else {
	echo $this->getService('com://admin/taxonomy.template.helper.listbox')->taxonomies(array('name' => $name, 'attribs' => array('multiple' => true, 'size' => 10), 'type' => $type));
}

