<?php
function scanForReleases($releaseFolder) {
  $releases = array_filter(scandir($releaseFolder), function ($fileName) use ($releaseFolder) {
    return is_link("{$releaseFolder}/{$fileName}") && !in_array($fileName, ['.', '..']);
  });
  usort($releases, 'version_compare');
  return array_reverse($releases);
}
?>
