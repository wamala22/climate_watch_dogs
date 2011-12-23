<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-12-08 16:01:47 +03:00 --- error: Missing i18n entry core.uncaught_exception for language The requested view, admin/reports_edit_js, could not be found
2011-12-08 16:01:47 +03:00 --- error: core.uncaught_exception
2011-12-08 16:51:00 +03:00 --- error: Missing i18n entry core.uncaught_exception for language Database error: Unknown column 'incident_title' in 'field list' - SELECT i.id, incident_title, 
			incident_description, incident_verified, 
			l.latitude, l.longitude, a.alert_id, a.incident_id
			FROM incident AS i INNER JOIN location AS l ON i.location_id = l.id
			LEFT OUTER JOIN alert_sent AS a ON i.id = a.incident_id WHERE
			i.incident_active=1 AND i.incident_alert_status = 1 
2011-12-08 16:51:00 +03:00 --- error: core.uncaught_exception
