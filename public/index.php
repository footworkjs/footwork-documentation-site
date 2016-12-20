<?php
function scanForReleases($releaseFolder) {
  $releases = array_filter(scandir($releaseFolder), function ($fileName) use ($releaseFolder) {
    return is_dir("{$releaseFolder}/{$fileName}") && !in_array($fileName, ['.', '..']);
  });
  usort($releases, 'version_compare');
  return array_reverse($releases);
}
?>
<html>
  <head>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="shortcut icon" href="/images/favicon.png?v=3">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  </head>

  <body>
    <header>
      <nav>
        <div class="container">
          <a class="home navbar-brand" href="http://footworkjs.com"><img src="/images/footwork-white.svg" /></a>
          <div class="title">Documentation</div>
        </div>
      </nav>
    </header>

    <main class="container">
      <p><em>Below is a listing of the available documentation for <a href="http://footworkjs.com">Footwork</a>.</em></p>
      <p><a href="http://footworkjs.com">Footwork</a> is a frontend javascript framework based on <a href="http://knockoutjs.com/">KnockoutJS</a> that aims to be fully featured, expressive, and easy to use while remaining as idiomatic and compatible with Knockout and its existing code base as possible.</p>

      <div class="releases">
        <?php foreach (scanForReleases('./release') as $index => $folder): ?>
          <a class="release" href="release/<?=$folder?>/">v<?=$folder?><?=($index === 0 ? '<span>latest</span>' : '')?></a>
        <?php endforeach; ?>
      </div>

      <hr>

      <div class="archive releases">
        <p class="title">For archival purposes, older versions are listed here (these use the older style documentation):</p>

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

