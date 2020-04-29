<?php get_header(); ?>

    <h2 class="pageTitle">メニュー<span>MENU</span></h2>
    <?php get_template_part( 'template-parts/breadcrumb' ); ?>
    <main class="main">
<?php
$kind_slug = get_query_var('kind');
$kind = get_term_by('slug', '$kind_slug', 'kind');
?>
        <section class="sec">
            <div class="container">
                <div class="sec_header">
                    <h2 class="title title-jp"><?php single_term_title( '' ); ?></h2>
                    <span class="title title-en"><?php echo $kind->name; ?></span>
                </div>
                <div class="row justify-content-center">
<?php
if( have_posts() ):
    while( have_posts() ):the_post();
?>
                    <div class="col-md-3">
                        <?php get_template_part( 'template-parts/loop', 'menu' ); ?>
                    </div>
<?php
    endwhile;
endif;
?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
