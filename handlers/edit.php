<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = __ ('Edit Contact');

$form = new Form ('post', $this);

$form->data = new contacts\Contact ($_GET['id']);

echo $form->handle (function ($form) {
	// Update the contact
	$contact = $form->data;
	$contact->name = $_POST['name'];
	$contact->email = $_POST['email'];
	$contact->phone = $_POST['phone'];
	$contact->put ();

	if ($contact->error) {
		// Failed to save
		$form->controller->add_notification (__ ('Unable to save contact.'));
		return false;
	}

	// Save a version of the contact
	Versions::add ($contact);

	// Notify the user and redirect on success
	$form->controller->add_notification (__ ('Contact saved.'));
	$form->controller->redirect ('/contacts/admin');
});

?>