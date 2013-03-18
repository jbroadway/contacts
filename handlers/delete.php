<?php

$this->require_admin ();

$contact = new contacts\Contact;
$contact->remove ($_POST['id']);

if ($contact->error) {
	$this->add_notification (__ ('Unable to delete contact.'));
	$this->redirect ('/contacts/admin');
}

$this->add_notification (__ ('Contact deleted.'));
$this->redirect ('/contacts/admin');

?>