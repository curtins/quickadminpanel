<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'membership' => [		'title' => 'Membership',		'created_at' => 'Time',		'fields' => [			'gvr-number' => 'Gvr Number',		],	],
	'custom_controller_index' => 'Персонализиран контролер.',
	'quickadmin_title' => 'gvcccrud',
];