<?php
/**
 * @package silverstripe-eventlocations
 */

if (!class_exists('Addressable')) {
	throw new Exception('The Event Locations module requires the Addressable module.');
}


Object::add_extension('CalendarDateTime', 'LocationDateTimeExtension');

// TODO is this still required?
//Object::add_extension('EventTimeDetailsController', 'LocationDetailsExtension'); 