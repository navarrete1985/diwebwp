<?php
$audio = '';
$media = get_attached_media('audio', $post->ID);
foreach($media as $item) {
    $audio = wp_get_attachment_url($item->ID);
    break;
}
?>
<div class='single-blog-post mb-100 wow fadeInUp'>
    <div class='blog-content blog-content-post-audio'>
        <div class="post-date">
            <span><?= get_the_date('d') ?></span>
            <span><?= get_the_date('M Y') ?></span>
        </div>
        <div class='row mt-5'>
            <div class='col-md-4'>
                <div class='song-thumbnail'>
                    <img src="<?= the_post_thumbnail_url() ?>" alt="">
                </div>
            </div>
            <div class='col-md-8 section-heading white text-left mb-30'>
                <p>Autor <span><?= get_the_author() ?></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="far fa-comments"></i> <?= get_comments_number($post->ID) ?> Comentarios</span><br><i class="far fa-eye"></i>&nbsp;&nbsp;<?= get_num_visits($post->ID, false) ?></p>
                <a class='post-title' href='<?= get_the_permalink() ?>'><?= get_the_title() ?></a>
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-12">
                <div class='single-song-area mb-30 d-flex flex-wrap align-items-end'>
                    <div class='song-play-area blog-song-play-area'>
                        <div class="song-name">
                            <p><?= end(explode('/',$audio)) ?></p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="<?php echo $audio ; ?>">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>