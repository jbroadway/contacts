<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Contacts');

// Calculate the offset
$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

// Fetch the items and total items
$items = contacts\Contact::query ()->fetch ($limit, $offset);
$total = contacts\Contact::query ()->count ();

// Pass our data to the view template
echo $tpl->render (
	'contacts/admin',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => '/contacts/admin/%d'
	)
);

?>