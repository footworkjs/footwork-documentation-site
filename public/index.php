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
    <nav class="navbar">
      <div class="container">
        <a class="navbar-brand" href="http://footworkjs.com"><img src="/images/footwork-logo.png" /></a>
      </div>
    </nav>

    <main class="container">
      <p>Below is a listing of the available documentation:</p>

      <div class="releases">
        <?php foreach (scanForReleases('./release') as $folder): ?>
          <a class="release" href="release/<?=$folder?>/"><?=$folder?></a>
        <?php endforeach; ?>
      </div>

      <hr>

      <div class="archive releases">
        <p class="title">For archival purposes, older unsupported versions are listed here:</p>

        <?php foreach (array_reverse(['0.8.0', '0.8.1', '1.0.0', '1.1.0', '1.2.0']) as $release): ?>
          <a class="release" href="http://v1.footworkjs.com/docs/<?=$release?>/viewModel">v<?=$release?></a>
        <?php endforeach; ?>
      </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

