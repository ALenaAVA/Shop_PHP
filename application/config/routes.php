<?php

return [
	'' => [
		'controller' => 'site',
		'action' => 'index',
	],

	'about' => [
		'controller' => 'site',
		'action' => 'about',
	],

	'contact' => [
		'controller' => 'site',
		'action' => 'contact',
	],

	'search/{page:\d+}' => [
		'controller' => 'site',
		'action' => 'search',
	],
	'search' => [
		'controller' => 'site',
		'action' => 'search',
	],
	'product/{id:\d+}' => [
		'controller' => 'product',
		'action' => 'view',
	],

	'category/{id:\d+}/{page:\d+}' => [
		'controller' => 'catalog',
		'action' => 'category',
	],
	'category/{id:\d+}' => [
		'controller' => 'catalog',
		'action' => 'category',
	],

	'catalog/{page:\d+}' => [
		'controller' => 'catalog',
		'action' => 'index',
	],
	'catalog' => [
		'controller' => 'catalog',
		'action' => 'index',
	],

	'blog' => [
		'controller' => 'blog',
		'action' => 'index',
	],

	'blog/{id:\d+}' => [
		'controller' => 'blog',
		'action' => 'view',
	],


	'user/register' => [
		'controller' => 'user',
		'action' => 'register',
	],
	'user/login' => [
		'controller' => 'user',
		'action' => 'login',
	],

	'user/logout' => [
		'controller' => 'user',
		'action' => 'logout',
	],

	'cabinet' => [
		'controller' => 'cabinet',
		'action' => 'index',
	],

	'cabinet/edit' => [
		'controller' => 'cabinet',
		'action' => 'edit',
	],

	'cart' => [
		'controller' => 'cart',
		'action' => 'index',
	],

	'cart/add/{id:\d+}' => [
		'controller' => 'cart',
		'action' => 'add',
	],

	'cart/addAjax/{id:\d+}' => [
		'controller' => 'cart',
		'action' => 'addAjax',
	],

	'cart/checkout' => [
		'controller' => 'cart',
		'action' => 'checkout',
	],

	'cart/delete/{id:\d+}' => [
		'controller' => 'cart',
		'action' => 'delete',
	],

	// AdminController

	'admin' => [
		'controller' => 'admin',
		'action' => 'index',
	],

	// AdminOrderController

	'admin/order' => [
		'controller' => 'adminOrder',
		'action' => 'index',
	],

	'admin/order/view/{id:\d+}' => [
		'controller' => 'adminOrder',
		'action' => 'view',
	],
	'admin/order/delete/{id:\d+}' => [
		'controller' => 'adminOrder',
		'action' => 'delete',
	],
	'admin/order/update/{id:\d+}' => [
		'controller' => 'adminOrder',
		'action' => 'update',
	],

	// AdminCategoryController

	'admin/category' => [
		'controller' => 'adminCategory',
		'action' => 'index',
	],

	'admin/category/create' => [
		'controller' => 'adminCategory',
		'action' => 'create',
	],
	'admin/category/delete/{id:\d+}' => [
		'controller' => 'adminCategory',
		'action' => 'delete',
	],
	'admin/category/update/{id:\d+}' => [
		'controller' => 'adminCategory',
		'action' => 'update',
	],

	// AdminProductController

	'admin/product' => [
		'controller' => 'adminProduct',
		'action' => 'index',
	],

	'admin/product/create' => [
		'controller' => 'adminProduct',
		'action' => 'create',
	],
	'admin/product/delete/{id:\d+}' => [
		'controller' => 'adminProduct',
		'action' => 'delete',
	],
	'admin/product/update/{id:\d+}' => [
		'controller' => 'adminProduct',
		'action' => 'update',
	],

];
