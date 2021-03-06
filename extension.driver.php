<?php
 
	Class extension_codemirror extends Extension {
 
		public function about(){
			return array(
			  'name'         => 'Codemirror',
        'version'      => '1.2.1',
        'release-date' => '2011-02-01',
        'description'  => 'Syntax colouring for Symphony\'s backend.',
        'author'       => array(
          'name'    => 'Ole A. E.',
          'website' => 'http://oleae.no',
          'email'   => 'post@oleae.no')
        );
		}
 
 
		public function getSubscribedDelegates() {
			return array(
				array(
					'page'		  => '/backend/',
					'delegate'	=> 'InitaliseAdminPageHead',
					'callback'	=> '__appendAdminPageAssets'
				)
			);
		}
		
		protected $adminHeadersAppended = false;
 
		public function __appendAdminPageAssets($context) {   
		  $engine = $context['parent'];
		     
      if (!$this->adminHeadersAppended && $engine) {
        $engine->Page->addStylesheetToHead(URL . '/extensions/codemirror/assets/css/codemirror.css', 'screen', 3066705);
        $engine->Page->addScriptToHead(URL . '/extensions/codemirror/assets/js/codemirror.js', 3066704);
        $engine->Page->addScriptToHead(URL . '/extensions/codemirror/assets/js/init.js', 3066703);
        
			  $this->adminHeadersAppended = true;
			}
		}
 
	}
 
?>