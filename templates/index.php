<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $this->e($title) ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/style.css">
        <link href="/feed.xml" rel="alternate" type="application/rss+xml">
        <link href="/favicon.png" rel="icon">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1 class="title"><a href="/"><?= $title ?></a></h1>
                <?php if (!empty($description)): ?>
                <p class="lead description"><?= $description ?></p>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col-sm-8 main">
                    <?php foreach ($items as $item): ?>
                    <div class="post">
                        <h2 class="post-title"><a href="<?= $item->get_link() ?>" target="_blank"><?= $item->get_title() ?></a></h2>
                        <p class="post-meta">
                            <?= $item->get_date($date_format) ?>
                            by
                            <a href="<?= $item->get_feed()->get_link() ?>" target="_blank"><?= $item->get_feed()->get_title() ?></a>
                        </p>
                        <?= tidy_repair_string($item->get_content(), ['show-body-only' => true], 'utf8') ?>
                    </div>
                    <?php endforeach; ?>
                    <nav>
                        <ul class="pager">
                        <?php if ($previous): ?>
                            <li><a href="/<?= $previous ?>.html">Previous</a></li>
                        <?php endif; ?>
                        <?php if ($next): ?>
                            <li><a href="/<?= $next ?>.html">Next</a></li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-3 col-sm-offset-1 sidebar">
                    <?php if (!empty($about)): ?>
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>About</h4>
                        <p><?= $about ?></p>
                    </div>
                    <?php endif ?>
                    <div class="sidebar-module">
                        <h4>Sources</h4>
                        <ol class="list-unstyled">
                        <?php foreach ($feeds as $feed): ?>
                            <li><a href="<?= $feed->get_link() ?>" target="_blank"><?= $feed->get_title() ?></a></li>
                        <?php endforeach ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>Page generated by <a href="http://github.com/blat/potatopotato">potatopotato</a>. Icon by <a href="http://www.flaticon.com/authors/vectors-market">Vectors Market</a>.</p>
            <p>Last update: <?= date($date_format) ?>.</p>
            <p><a href="#">Back to top</a></p>
        </footer>
        <?php if (!empty($piwik)): ?>
        <script type="text/javascript">
        var _paq = _paq || [];
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function(){
            var u="<?= $piwik['url'] ?>";
            _paq.push(["setTrackerUrl", u+"piwik.php"]);
            _paq.push(["setSiteId", <?= $piwik['id'] ?>]);
            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
            g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
        })();
        </script>
        <noscript><img src="<?= $piwik['url'] ?>piwik.php?idsite=<?= $piwik['id'] ?>" style="border:0;" alt="" /></noscript>
        <?php endif; ?>
    </body>
</html>
