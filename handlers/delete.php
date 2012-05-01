<?php

$this->require_admin ();

$contact = new contacts\Contact;
$contact->remove ($_GET['id']);

if ($contact->error) {
	$this->add_notification (i18n_get ('Unable to delete contact.'));
	$this->redirect ('/contacts/admin');
}

$this->add_notification (i18n_get ('Contact deleted.'));
$this->redirect ('/contacts/admin');

?>