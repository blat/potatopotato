<?= '<?xml version="1.0" encoding="utf-8"?>' ?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" version="2.0">
    <channel>
        <title><![CDATA[<?= $title ?>]]></title>
        <description><![CDATA[<?= $description ?>]]></description>
        <pubDate><?= date('r') ?></pubDate>
        <?php foreach ($items as $item): ?>
        <item>
            <title><![CDATA[<?= $item->get_title() ?>]]></title>
            <author><?= $item->get_feed()->get_title() ?></author>
            <link><?= $item->get_link() ?></link>
            <guid isPermaLink="true"><?= $item->get_link() ?></guid>
            <description><![CDATA[<?= $item->get_content() ?>]]></description>
            <content:encoded><![CDATA[<?= $item->get_content() ?>]]></content:encoded>
            <pubDate><?= $item->get_date('r') ?></pubDate>
        </item>
        <?php endforeach ?>
    </channel>
</rss>
