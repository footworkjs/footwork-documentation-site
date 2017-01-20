<?php
require("../scan.php");
header('Content-Type: application/json');

echo json_encode(scanForReleases('./release'));
