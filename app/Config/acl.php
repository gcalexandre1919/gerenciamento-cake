<?php

$config['map'] = array(
	'User' => 'User/username',
	'Role' => 'User/group_id',
);


$config['alias'] = array(
	'Role/4' => 'Role/editor',
);


$config['roles'] = array(
	'Role/admin' => null,
);


$config['rules'] = array(
	'allow' => array(
		'*' => 'Role/admin',
	),
	'deny' => array(),
);
