<?php
function scanForReleases($releaseFolder, $exclude = []) {
  $releases = array_filter(scandir($releaseFolder), function ($fileName) use ($releaseFolder, $exclude) {
    return is_link("{$releaseFolder}/{$fileName}") && !in_array($fileName, ['.', '..']) && !in_array($fileName, $exclude);
  });
  usort($releases, 'version_compare');
  return array_reverse($releases);
}
?>
