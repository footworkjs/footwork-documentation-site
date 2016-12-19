<?php
function scanForReleases($releaseFolder) {
  return array_filter(scandir($releaseFolder), function ($fileName) use ($releaseFolder) {
    return is_dir("{$releaseFolder}/{$fileName}") && !in_array($fileName, ['.', '..']);
  });
}
?>
<html>
  <head>
    <link rel="stylesheet" href="/styles/style.css">
  </head>

  <body>
    <nav class="navbar navbar-light bg-faded">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://footworkjs.com">FootworkJS Home Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Latest Docs</a>
        </li>
      </ul>
    </nav>

    <div class="releases">
      <?php foreach (scanForReleases('./release') as $folder): ?>
        <a class="release" href="release/<?=$folder?>/"><?=$folder?></a>
      <?php endforeach; ?>
    </div>
  </body>
</html>

