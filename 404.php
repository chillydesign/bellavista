<?php get_header(); ?>

<?php $home_id = get_option('page_on_front'); ?>
<?php $image = thumbnail_of_post_url($home_id, 'large'); ?>
<?php  $current_lang =  ( defined('ICL_LANGUAGE_CODE') ) ? ICL_LANGUAGE_CODE  : 'fr'; ?>
<div class="parallax_container">
    <div class="parallax_image" style="background-image:url('<?php echo $image; ?>')"></div>
</div>


<section  class="section  section_news">

    <div class="brand_bg" >
        <div class="container">

            <?php if (  $current_lang  == 'fr'): ?>
            <h1>Page non trouvée</h1>
            <p>La page que vous recherchez n'existe pas ou a été déplacée.</p>
            <a href="<?php echo home_url(); ?>"><h6>Retour à l'accueil</h6></a>
            <?php else : ?>
            <h1>Page not found</h1>
            <p>The page you are looking for doesn't exist or has been moved. </p>
            <a href="<?php echo home_url(); ?>"><h6>Back to home</h6></a>
            <?php endif; ?>

        </div><!--  END OF CONTAINER -->
    </div>

</section>

<?php get_footer(); ?>
