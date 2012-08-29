<?php
/**
 * Adds the fields to select a location for an event datetime.
 *
 * @package silverstripe-eventlocations
 */
class LocationDateTimeExtension extends DataExtension {

	public static $has_one = array(
		'Location' => 'EventLocation'
	);

	public function updateCMSFields(FieldList $fields) {

		if (!$locations = DataObject::get('EventLocation')) {
			return;
		}

		$capacities = array();
		foreach ($locations as $location) {
			if ($location->Capacity) {
				$capacities[$location->ID] = (int) $location->Capacity;
			}
		}

		$dropdown = new DropdownField(
			'LocationID',
			_t('EventLocations.LOCATION', 'Location'),
			$locations->map('ID', 'Title'),
			null, null, true);
		$dropdown->addExtraClass('{ capacities: ' . Convert::array2json($capacities) . ' }');

		$fields->push($dropdown);
	}

	// TODO update this js stuff, functionality is related to the eventmanagement module

	// public function updateDateTimeTable($table) {
	// 	$table->requirementsForPopupCallback = array($this, 'getPopupRequirements');
	// }

	// public function getPopupRequirements() {
	// 	Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
	// 	Requirements::javascript(THIRDPARTY_DIR . '/jquery-metadata/jquery.metadata.js');
	// 	Requirements::add_i18n_javascript('eventlocations/javascript/lang');
	// 	Requirements::javascript('eventlocations/javascript/LocationDateTimeCms.js');
	// }

}