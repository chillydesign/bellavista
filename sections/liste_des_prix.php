<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-8">

                <div class="choix-villas">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/bellavista1.jpg">
                    <?php include('bellavista1.svg'); ?>
                    <div class="legende">
                        <span class="title">Légende</span>
                        <span class="free_leg">Disponible</span>
                        <span class="pre_leg">Pré-réservé / Réservé</span>
                        <span class="sold_leg">Vendu</span>
                    </div>
                </div>



            </div>
            <div class="col-sm-4 ">
                <div class="villa_slider">

                    <?php $i = 0; while ( have_rows('villas')) : the_row(); ?>

                        <?php $statut = get_sub_field('statut'); ?>
                        <?php $prix = get_sub_field('prix_de_vente'); ?>
                        <?php $villa = get_sub_field('villa'); ?>
                        <?php $parcelle =  get_sub_field('parcelle'); ?>
                        <?php $image =  get_sub_field('image'); ?>
                        <?php
                        if($statut == 'available'){
                            $prix_de_vente = number_format($prix, 0, ",", "'");
                            $prix_text = "sFr. " . $prix_de_vente;
                            $villastatusclass="free";
                        } elseif ($statut == 'prebooked') {
                            // $prix_text = 'Pré-réservé';
                            $prix_de_vente = number_format($prix, 0, ",", "'");
                            $prix_text = "sFr. " . $prix_de_vente;
                            $villastatusclass="booked";
                        } elseif ($statut == 'booked') {
                            $prix_text = 'Réservé';
                            $villastatusclass="booked";
                        } elseif ($statut == 'sold') {
                            $prix_text = 'Vendu';
                            $villastatusclass="unavailable";
                        }

                        ?>


                        <div class="villa_tr villa<?php echo $villa; ?> <?php echo $villastatusclass; ?>" data-index=<?php echo  $i; ?>  data-layer="#villa<?php  echo $villa; ?>">
                            <h4>Villa: n°<?php echo $villa; ?></h4>
                            <ul>

                                <li>
                                    <strong>Surface <span class="disappear1">de la </span>parcelle:</strong>  <?php echo $parcelle; ?> m<sup>2</sup></li>
                                <li class="disappear2"><strong>Part de la dépendance:</strong><?php the_sub_field('dependance'); ?> m<sup>2</sup></li>
                                <li><strong>Surface brute:</strong> <?php the_sub_field('surface_brute'); ?> m<sup>2</sup></li>
                                <li class="disappear2"><strong>Terrasse au rez<span class="disappear1">-de-chaussée</span>: </strong><?php the_sub_field('terrasse_rez'); ?> m<sup>2</sup></li>
                                <li class="disappear2"><strong>Terrasse d'attique:</strong> <?php the_sub_field('terrasse_attique'); ?> m<sup>2</sup></li>
                                <li class="disappear2"><strong>Surface des extérieurs: </strong><?php the_sub_field('exterieurs'); ?> m<sup>2</sup></li>
                                <li class="disappear2"><strong>Places extérieures:</strong> <?php the_sub_field('places'); ?></li>

                                <li><strong>Prix de vente:</strong> <?php echo $prix_text; ?></li>
                            </ul>


                            <div class="villa_buttons">


                            <?php if($image): ?>
                                <a class="villa_lightbox" href="<?php echo $image['url']; ?>">Image</a>
                                <!-- <img class="table_img" src="<?php echo $image['url']; ?>"> -->
                            <?php endif; // end if image; ?>

                            <a href="<?php echo get_home_url();?>/documents">Brochure</a>
                            <?php $nnn = (get_sub_field('number')) ? 'la villa ' .  get_sub_field('number') : 'une des villas' ; ?>
                            <?php $str =  htmlentities(' contact@promolac.ch?subject=Intérêt pour une propriété - Villas des Grumes&body=Bonjour Monsieur%2C%0A%0AJe serais intéressé par '  . $nnn  .   ' de votre promotion Villas Des Grumes. Pourrions-nous convenir d\'un rendez-vous pour en discuter%3F%0A%0ACordialement,'  ); ?>
                            <a href="mailto:<?php echo $str; ?>">Contact</a>
                                    </div>
                        </div>

                        <?php  $i++; endwhile; ?>
                    </div> <!--end of villa slider -->



                </div>
            </div>



        </div>
    </section>





    <?php function priceOfProperty() {} ?>
