<?php
header("Access-Control-Allow-Origin: *");
//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------
require_once("inc/connectDB.php");
require_once("inc/sql.php");
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
  die("Please provide a date range.");
}

// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = $_GET['start'];
$range_end = $_GET['end'];

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
  $timezone = new DateTimeZone($_GET['timezone']);
}
$liste = getEvents($conn, $range_start, $range_end);
// Read and parse our events JSON file into an array of event data arrays.


// Send JSON to the client.
echo json_encode($liste);