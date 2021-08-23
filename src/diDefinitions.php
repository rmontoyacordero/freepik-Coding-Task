<?php

/**
 * In order to make the app faster, we map all classes which are resolved so the library
 * Does not have to resolve for every request.
 */

$rootDir = $GLOBALS['rootDir'];

require "{$GLOBALS['rootDir']}/src/ConfigLoader.php";

return array_merge(
    ConfigLoader::getConfig(),
    include("{$rootDir}/src/Config/ConfigDi.php"),
    include("{$rootDir}/src/Shared/SharedDi.php"),
);
