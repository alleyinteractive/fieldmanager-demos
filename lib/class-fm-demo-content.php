<?php
/**
 * Demo of the Fieldmanager_Content class.
 */

if ( ! class_exists( 'FM_Demo_Content' ) ) :

	class FM_Demo_Content {

		private $plaintext = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

		private $html = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. </p>
<p>Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. <b>Vestibulum lacinia arcu eget nulla</b>. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. </p>';

		private $markdown = '# Regna disposuit

## Procul feror

Lorem markdownum felle instabat; certe nonne, simul Amphimedon at rure
admonuisse deorum, nunc pectora vero per. Vestras dictaque rerum genetrix vivit,
est qui ora doceri memor, tum. Sine pontus concussit, annos, Credulitas tabellas
dictis semina sumit in artus concipit prohibente mendacique ense, tenentibus
inimicos. Aufer constitit dedisse severa artus quoque
[pater](http://fuitminimae.org/tenuissimus) posita, cicatrix trux quidem ipsa
visa?

Esse *Cumaea* suae! Petit tum lacerum *caelum*, ferre? Vera dona Cnosiacaeque
arces! Est et laetus exercet turgida Phineus sunt; aeolis suis quoque, sub! Iam
lumina sanguisque aera superstitibus Hectoris et
[duorum](http://nunc.com/parentiargolicae) limitibus curvavit.

## Texere coegit et iubet imagine dextra alto

Idque ostendere lacerum alas, rostro sed visus auras irascere. Est et ardet et
contraque populi. In aquis dederat credulitate more scopulis nescio coniuge
squalentia putri cupiens lenisque et ferarum cursu, ab futuri heros.

> Sed meliora e tamen passim confessaque errore quinos sternit. Est vel in bis
> quoque litora corneaque alasque cetera quidque ingeniis. Et meae, et facis
> reticere, plebe, vestigia!

## Hunc licuit Coroniden adimit salientia cuspidis capacem

Terram indetonsusque notatas est coagula dixit. Inclusos enim, constiterat
prolem: subit deum sonantibus nomina declinat tibi sanguine custodia.

    var click = touchscreen.pretest_retina_rpc.refresh_pci(51, cable, dashboard(ad_tftp_thyristor(software_bar, adfDll), clonePetabyte));
    biometrics.lock_thyristor_enterprise += mail_remote(ssd);
    var docking = languagePostscriptWindow(hsf(blu(quad_hard, 4), dpiBurnMemory), memoryKindle, -1);
    var dimm = powerBurnSuperscalar;
    bccLog.software_plain_ftp(boot_frozen_word, ethernet, half(clipThird, 2, 95));

## Rogabam remotis quam

Est novae sed illa manus in arvaque sed sonuere magno, dum **in sui** obstantes
suis, mea. Disce *probat* aevo **terrigenae ramis**, inbellibus viscera, saeva,
dat mora. Colla imitataque vult. Observo his et non fluminis vixque, proceres
truncoque genibus Persephones uteri primosque tenuere, [inque
unguibus](http://www.capeet.com/aura) mediis: undis.

Phlegraeis tum agat, auctor sono subiectis prendere et huic dei pressant. Pars
**et nam**.

Aptarique damnandus frustra ardentior moderato habeo mater miscentem cumulum,
ait in orientis coniugis sitim fortunaeque alendi de longus et. Nec indulgere
elementa plausis? Agit guttur genitor. Aeneaeque illam: est periit aliis et
debuit superis; ubi ramos non pollice.';

		private static $instance;

		private function __construct() {
			/* Don't do anything, needs to be initialized via instance() method */
		}

		public static function instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new FM_Demo_Content;
				self::$instance->setup();
			}
			return self::$instance;
		}

		public function setup() {
			FM_Demo_Data_Structures()->add_post_type( 'demo-content', array( 'singular' => 'Content' ) );
			add_action( 'fm_post_demo-content', array( $this, 'init' ) );
		}

		public function init() {
			// Plain text example.
			(
				new Fieldmanager_Plaintext(
					[
						'name'    => 'plaintext_content',
						'content' => $this->plaintext,
					]
				)
			)->add_meta_box( 'Plaintext Example', 'demo-content' );

			// HTML example.
			(
				new Fieldmanager_HTML(
					[
						'name'         => 'html_content',
						'content'      => $this->html,
					]
				)
			)->add_meta_box( 'HTML Example', 'demo-content' );

			// Markdown example.
			(
				new Fieldmanager_Markdown(
					[
						'name'         => 'markdown_content',
						'content'      => $this->markdown,
					]
				)
			)->add_meta_box( 'Markdown Example', 'demo-content' );
		}
	}

	FM_Demo_Content::instance();

endif;
