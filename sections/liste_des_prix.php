<section>
  <div class="container">
    <div class="row">

      <div class="col-sm-8">

        <div class="choix-villas">
          <img src="<?php echo get_template_directory_uri(); ?>/img/bellavista1.jpg">
          <?php include('bellavista1.svg'); ?>
          <div class="legende">
            <span class="title"><?php _e('Légende', 'webfactor'); ?></span>
            <span class="free_leg"><?php _e('Disponible', 'webfactor'); ?></span>
            <span class="pre_leg"><?php _e('Pré-réservé / Réservé', 'webfactor'); ?></span>
            <span class="sold_leg"><?php _e('Vendu', 'webfactor'); ?></span>
          </div>
        </div>



      </div>
      <div class="col-sm-4 ">
        <div class="villa_slider">

          <?php $i = 0; while ( have_rows('villas')) : the_row(); ?>

            <?php $statut = get_sub_field('statut'); ?>
            <?php $prix_de_vente = get_sub_field('prix_de_vente'); ?>
            <?php $prix = ($prix_de_vente) ? $prix_de_vente : 0; ?>
            <?php $villa = get_sub_field('villa'); ?>
            <?php $villa_slug = sanitize_title($villa); ?>
            <?php $image =  get_sub_field('image'); ?>
            <?php
            if($statut == 'available'){
              $prix_de_vente = number_format($prix, 0, ",", "'");
              $prix_text = "Fr. " . $prix_de_vente;
              $villastatusclass="free";
            } elseif ($statut == 'prebooked') {
              // $prix_text = 'Pré-réservé';
              $prix_de_vente = number_format($prix, 0, ",", "'");
              $prix_text = "Fr. " . $prix_de_vente;
              $villastatusclass="booked";
            } elseif ($statut == 'booked') {
              if(ICL_LANGUAGE_CODE=='fr'):
              $prix_text = 'Réservé';
            else:
                $prix_text = 'Booked';
              endif;
              $villastatusclass="booked";
            } elseif ($statut == 'sold') {
              if(ICL_LANGUAGE_CODE=='fr'):
              $prix_text = 'Vendu';
            else:
                $prix_text = 'Sold';
              endif;
              $villastatusclass="unavailable";
            }

            ?>


            <div class="villa_tr villa<?php echo $villa_slug; ?> <?php echo $villastatusclass; ?>" data-index=<?php echo  $i; ?>  data-layer="#villa<?php  echo $villa_slug; ?>">
              <h4><?php _e('Appartement', 'webfactor'); ?> <?php echo $villa; ?></h4>
              <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
                <h5 class="rooms">Appartement <?php echo get_sub_field('rooms'); ?> pièces</h5>
              <?php else : ?>
                <h5 class="rooms"> <?php echo get_sub_field('rooms'); ?> room apartment</h5>
              <?php endif; ?>
              <ul>

                <li><strong><?php _e('Appartement:', 'webfactor'); ?></strong>  <?php the_sub_field('appartement'); ?> m<sup>2</sup></li>
                <li><strong><?php _e('Jardin:', 'webfactor'); ?><?php if(ICL_LANGUAGE_CODE=='fr'): ?><br><?php endif; ?></strong>
                  <?php $jardin = get_sub_field('jardin');
                  if($jardin AND $jardin >0){
                    echo $jardin . 'm<sup>2</sup>';
                  } else {echo '0m<sup>2</sup>';} ?></li>
                  <li><strong><?php _e('Terrasse couverte:', 'webfactor'); ?><?php if(ICL_LANGUAGE_CODE=='fr'): ?><br><br><?php endif; ?></strong>  <?php $balcon = get_sub_field('balcon');
                  if($balcon AND $balcon >0){
                    echo $balcon . 'm<sup>2</sup>';
                  } else {echo '0m<sup>2</sup>';} ?></li>
                  <li><strong><?php _e('Terrasse non couverte:', 'webfactor'); ?></strong>
                    <?php $terrasse = get_sub_field('terrasse');
                    if($terrasse AND $terrasse >0){
                      echo $terrasse . 'm<sup>2</sup>';
                    } else {echo '0m<sup>2</sup>';} ?></li>
                    <li><strong><?php _e('Surface pondérée:', 'webfactor'); ?></strong>  <?php the_sub_field('ponderee'); ?> m<sup>2</sup></li>
                    <li><strong><?php _e('Cave:', 'webfactor'); ?><?php if(ICL_LANGUAGE_CODE=='en'): ?><br><br><?php endif; ?></strong>  <?php the_sub_field('cave'); ?></li>
                    <li>
                      <strong><?php _e('Prix de vente:', 'webfactor'); ?><?php if(ICL_LANGUAGE_CODE=='en'): ?><br><br><?php endif; ?></strong>
                      <?php echo $prix_text; ?><br>
                      <em style="font-size:0.8em;"><?php _e('(Parking non compris', 'webfactor'); ?>)</em>
                    </li>
                    <li>
                      <strong><?php _e('Parking en sous-sol:', 'webfactor'); ?></strong>
                      <?php the_sub_field('parking'); ?>
                    </li>
                  </ul>


                  <div class="villa_buttons">


                    <?php if($image): ?>
                      <a class="villa_lightbox" href="<?php echo $image['url']; ?>"><?php _e('Plan', 'webfactor'); ?></a>
                      <!-- <img class="table_img" src="<?php echo $image['url']; ?>"> -->
                    <?php endif; // end if image; ?>

                    <a href="<?php echo get_home_url();?>/documentation"><?php _e('Brochure', 'webfactor'); ?></a>
                    <?php $nnn = (get_sub_field('number')) ? 'la villa ' .  get_sub_field('number') : 'une des villas' ; ?>
                    <?php if(ICL_LANGUAGE_CODE=='en'): ?>
                      <?php $str =  htmlentities(' contact@batilac.ch?subject=Inquiry about a property - Bella-Vista Parc&body=Dear Sir, Madam,%2C%0A%0AI am interested in the property '  . $nnn  .   ' from your Bella-Vista Parc promotion. Would it be possible to book an appointment to discuss this?%3F%0A%0ABest regards,'  ); ?>
                    <?php else: ?>
                      <?php $str =  htmlentities(' contact@batilac.ch?subject=Intérêt pour une propriété - Bella-Vista Parc&body=Bonjour Monsieur%2C%0A%0AJe serais intéressé par '  . $nnn  .   ' de votre promotion Bella-Vista Parc. Pourrions-nous convenir d\'un rendez-vous pour en discuter%3F%0A%0ACordialement,'  ); ?>
                    <?php endif; ?>
                    <!-- <a href="mailto:<?php //echo $str; ?>">Contact</a> -->
                    <a href="<?php echo get_home_url(); ?>/contact">Contact</a>
                  </div>
                </div>

                <?php  $i++; endwhile; ?>
              </div> <!--end of villa slider -->



            </div>
          </div>



        </div>
      </section>





      <?php function priceOfProperty() {} ?>
