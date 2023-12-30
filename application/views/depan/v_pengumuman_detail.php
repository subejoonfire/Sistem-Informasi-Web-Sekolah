<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>

<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="<?php echo base_url() . 'assets/images/' . $image ?>" alt="<?php echo $title; ?>">
                    </div>
                    <div class="blog_details">
                        <h2><?php echo $title; ?>
                        </h2>
                        <?php echo $blog; ?>


                    </div>
                </div>