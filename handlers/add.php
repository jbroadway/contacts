<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = __ ('Add Contact');

$form = new Form ('post', $this);

echo $form->handle (function ($form) {
	// Create and save a new contact
	$contact = new contacts\Contact (array (
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone']
	));
	$contact->put ();

	if ($contact->error) {
		// Failed to save
		$form->controller->add_notification (__ ('Unable to save contact.'));
		return false;
	}

	// Save a version of the contact
	Versions::add ($contact);

	// Notify the user and redirect on success
	$form->controller->add_notification (__ ('Contact added.'));
	$form->controller->redirect ('/contacts/admin');
});

?>