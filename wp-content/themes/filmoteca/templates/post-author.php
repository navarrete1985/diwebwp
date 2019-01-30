<div class='col-lg-12'>
    <div class='single-event-area mb-70'>
        <div class='event-thumbnail'>
            <div class="img bg-img pb-50" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
        </div>
        <div class='event-text'>
            <h4><?= get_the_title() ?></h4>
            <div class='event-meta-data'>
                <a href='#' class='event-place'><?= get_the_author() ?></a>
                <a href='#' class='event-date'><?= get_the_date('d M Y') ?></a>
            </div>
            <a href='<?= get_the_permalink(); ?>' class='see-more-btn'>Ver post</a>
        </div>
    </div>
</div>