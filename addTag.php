<?php

	$URL = 'http://www.librarything.com/signup.php';
	$arrayOptions = array();
	$arrayOptions['formusername'] = 'skifftest';
	$arrayOptions['formpassword'] = 'skifftest';
	$arrayOptions['index_signin_already'] = "Sign in";
	
	require_once('simpletest/browser.php');
	
	$browser = new SimpleBrowser();
	$result = $browser->get('http://www.librarything.com/');
	
	$browser->setFieldById('already_formusername', 'skifftest');
	$browser->setFieldByName('formpassword', 'skifftest');
	$result = $browser->clickSubmitByName('index_signin_already');
		
	$collection = 7763391;
	$book = 81847707;
	$newEmailAddress = 'bob@flashygraphics.co.uk';
	
	$updateFormURL = sprintf("http://www.librarything.com/work/%d/edit/%d", $collection, $book);
	
	$submitform = $browser->get($updateFormURL);
	
	$currentTagesArray = explode(', ', $browser->getFieldById('form_tags'));
	array_push($currentTagesArray, $newEmailAddress);
	$newTags = implode(', ', $currentTagesArray);
	
	$browser->setFieldById('form_tags', $newTags);
	
	$result = $browser->submitFormById('book_editForm');	
	
	echo $result;
	
