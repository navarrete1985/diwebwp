<div class='col-md-12 col-lg-4 mb-70'>
    <div class='single-event-area h-100 d-flex flex-column'>
        <div class='event-thumbnail'>
            <div class="img bg-img pb-70" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
        </div>
        <div class='event-text h-100 d-flex flex-column'>
            <h4><?= get_the_title() ?></h4>
            <div class='event-meta-data'>
                <a href='#' class='event-place'><?= get_the_author() ?></a>
                <a href='#' class='event-date'><?= get_the_date('d M Y') ?></a>
            </div>
            <a href='<?= get_the_permalink(); ?>' class='see-more-btn align-self-center to-end'>Ver post</a>
        </div>
    </div>
</div>