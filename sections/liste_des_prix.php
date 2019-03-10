<section>
	<div class="container">
		<div class="choix-villas">
			<!-- <img src="<?php// echo get_template_directory_uri(); ?>/img/villas-grumes-layout.jpg"> -->
			<img src="<?php echo get_template_directory_uri(); ?>/img/grumes-villas-small.jpg">
			<?php// include('grumes-villas-layers.svg'); ?>
			<?php include('grumes-villas3.svg'); ?>
			<div class="legende">
				<span class="title">Légende</span>
				<span class="free_leg">Disponible</span>
				<span class="pre_leg">Pré-réservé / Réservé</span>
				<span class="sold_leg">Vendu</span>
			</div>
		</div>

		<div class="villa_group villa_group1" data-layer="#villa16, #villa18, #villa20">Villas 16-18-20</div>
		<div class="villa_table villa_table1"><?php pricelist('liste'); ?></div>
		<div class="villa_group villa_group2" data-layer="#villa22, #villa24, #villa26">Villas 22-24-26</div>
		<div class="villa_table villa_table2"><?php pricelist('liste2'); ?></div>
		<div class="villa_group villa_group3" data-layer="#villa28, #villa30, #villa32">Villas 28-30-32</div>
		<div class="villa_table villa_table3"><?php pricelist('liste3'); ?></div>
		<div class="villa_group villa_group4" data-layer="#villa34, #villa36, #villa38">Villas 34-36-38</div>
		<div class="villa_table villa_table4"><?php pricelist('liste4'); ?></div>



		
	</div>
</section>






<?php function pricelist($group_of_villas){ ?>

	<table>
			<thead>
				<tr>
					<th>Villas</th>
					<th>Surface <span class="disappear1">de la </span>parcelle</th>
					<th class="disappear2">Part de la dépendance</th>
					<th>Surface brute</th>
					<th class="disappear2">Terrasse au rez<span class="disappear1">-de-chaussée</span></th>
					<th class="disappear2">Terrasse d'attique</th>
					<th class="disappear2">Surface des extérieurs</th>
					<th class="disappear2">Places extérieures</th>
					<th>Prix de vente</th>
					<th></th>
				</tr>
				
			</thead>
			<tbody>
			<?php $i = 1; ?>
			<?php while ( have_rows($group_of_villas)) : the_row(); ?>
				<?php 
						$statut = get_sub_field('statut');
						if($statut == 'available'){
							$prix = get_sub_field('prix_de_vente');
							$prix_de_vente = number_format($prix, 0, ",", "'"); 
							$prix_text = "sFr. " . $prix_de_vente;
							$villastatusclass="free";
						} elseif ($statut == 'prebooked') {
							// $prix_text = 'Pré-réservé';
							$prix = get_sub_field('prix_de_vente');
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

				<?php if($i %2 != 0) {$extraclass ="grey";} else {$extraclass="";} ?>
				<tr class="villa_tr <?php echo $extraclass . ' ' . $villastatusclass;?>" data-layer="#villa<?php echo the_sub_field('villa');?>">
					<td>n°<?php the_sub_field('villa'); ?></td>
					<td><?php the_sub_field('parcelle'); ?> m<sup>2</sup></td>
					<td class="disappear2"><?php the_sub_field('dependance'); ?> m<sup>2</sup></td>
					<td><?php the_sub_field('surface_brute'); ?> m<sup>2</sup></td>
					<td class="disappear2"><?php the_sub_field('terrasse_rez'); ?> m<sup>2</sup></td>
					<td class="disappear2"><?php the_sub_field('terrasse_attique'); ?> m<sup>2</sup></td>
					<td class="disappear2"><?php the_sub_field('exterieurs'); ?> m<sup>2</sup></td>
					<td class="disappear2"><?php the_sub_field('places'); ?></td>
					

					<td><?php echo $prix_text; ?></td>
					<td><div class="plus" id="<?php echo 'tr' . $i; ?>"></div></td>
				</tr>
				<?php if(get_sub_field('image') OR get_sub_field('brochure')){?>
					<tr class="hidden_tr <?php echo 'tr' . $i; ?>  <?php echo $extraclass;?>">
						<td colspan="10" >
							<img class="table_img" src="<?php echo get_sub_field('image')['url']; ?>">
							<a href="<?php echo get_home_url();?>/documents" class="table_download">Brochure</a>
							<?php $nnn = (get_sub_field('number')) ? 'la villa ' .  get_sub_field('number') : 'une des villas' ; ?>
							<?php $str =  htmlentities(' contact@promolac.ch?subject=Intérêt pour une propriété - Villas des Grumes&body=Bonjour Monsieur%2C%0A%0AJe serais intéressé par '  . $nnn  .   ' de votre promotion Villas Des Grumes. Pourrions-nous convenir d\'un rendez-vous pour en discuter%3F%0A%0ACordialement,'  ); ?>
							<a class="table_contact" href="mailto:<?php echo $str; ?>">Contact</a>
						</td>
					</tr>
				<?php } ?>
				<?php $i++; ?>
			<?php endwhile; ?>
			</tbody>
		</table>

<?php } ?>