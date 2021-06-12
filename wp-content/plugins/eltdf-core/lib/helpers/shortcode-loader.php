<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Lib;

use AmbientElatedNamespace\Modules\Shortcodes\Accordion\Accordion;
use AmbientElatedNamespace\Modules\Shortcodes\AccordionTab\AccordionTab;
use AmbientElatedNamespace\Modules\Shortcodes\AnimationHolder\AnimationHolder;
use AmbientElatedNamespace\Modules\Shortcodes\Banner\Banner;
use AmbientElatedNamespace\Modules\Shortcodes\BlogList\BlogList;
use AmbientElatedNamespace\Modules\Shortcodes\Button\Button;
use AmbientElatedNamespace\Modules\Shortcodes\CallToAction\CallToAction;
use AmbientElatedNamespace\Modules\Shortcodes\ClientsBoxes\ClientsBoxes;
use AmbientElatedNamespace\Modules\Shortcodes\ClientsBoxesItem\ClientsBoxesItem;
use AmbientElatedNamespace\Modules\Shortcodes\ClientsCarousel\ClientsCarousel;
use AmbientElatedNamespace\Modules\Shortcodes\ClientsCarouselItem\ClientsCarouselItem;
use AmbientElatedNamespace\Modules\Shortcodes\Countdown\Countdown;
use AmbientElatedNamespace\Modules\Shortcodes\Counter\Counter;
use AmbientElatedNamespace\Modules\Shortcodes\Dropcaps\Dropcaps;
use AmbientElatedNamespace\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use AmbientElatedNamespace\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use AmbientElatedNamespace\Modules\Shortcodes\GalleryBlocks\GalleryBlocks;
use AmbientElatedNamespace\Modules\Shortcodes\GoogleMap\GoogleMap;
use AmbientElatedNamespace\Modules\Shortcodes\Highlight\Highlight;
use AmbientElatedNamespace\Modules\Shortcodes\Icon\Icon;
use AmbientElatedNamespace\Modules\Shortcodes\IconListItem\IconListItem;
use AmbientElatedNamespace\Modules\Shortcodes\IconWithText\IconWithText;
use AmbientElatedNamespace\Modules\Shortcodes\ImageGallery\ImageGallery;
use AmbientElatedNamespace\Modules\Shortcodes\ImageWithText\ImageWithText;
use AmbientElatedNamespace\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use AmbientElatedNamespace\Modules\Shortcodes\ItemShowcaseItem\ItemShowcaseItem;
use AmbientElatedNamespace\Modules\Shortcodes\MessageBox\MessageBox;
use AmbientElatedNamespace\Modules\Shortcodes\PieChart\PieChart;
use AmbientElatedNamespace\Modules\Shortcodes\PricingTables\PricingTables;
use AmbientElatedNamespace\Modules\Shortcodes\PricingTable\PricingTable;
use AmbientElatedNamespace\Modules\Shortcodes\ProgressBar\ProgressBar;
use AmbientElatedNamespace\Modules\Shortcodes\ProductInfo\ProductInfo;
use AmbientElatedNamespace\Modules\Shortcodes\ProductList\ProductList;
use AmbientElatedNamespace\Modules\Shortcodes\ProductListSimple\ProductListSimple;
use AmbientElatedNamespace\Modules\Shortcodes\SectionTitle\SectionTitle;
use AmbientElatedNamespace\Modules\Shortcodes\Separator\Separator;
use AmbientElatedNamespace\Modules\Shortcodes\SocialShare\SocialShare;
use AmbientElatedNamespace\Modules\Shortcodes\Tabs\Tabs;
use AmbientElatedNamespace\Modules\Shortcodes\Tab\Tab;
use AmbientElatedNamespace\Modules\Shortcodes\Team\Team;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();
	
	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}
	
	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}
	
	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}
	
	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}
		
		return self::$instance;
	}
	
	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}
	
	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new AnimationHolder());
		$this->addShortcode(new Banner());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new ClientsBoxes());
		$this->addShortcode(new ClientsBoxesItem());
		$this->addShortcode(new ClientsCarousel());
		$this->addShortcode(new ClientsCarouselItem());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GalleryBlocks());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new ImageWithText());
		$this->addShortcode(new ItemShowcase());
		$this->addShortcode(new ItemShowcaseItem());
		$this->addShortcode(new MessageBox());
		$this->addShortcode(new PieChart());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new ProgressBar());
		if(ambient_elated_is_woocommerce_installed()){
			$this->addShortcode(new ProductInfo());
			$this->addShortcode(new ProductList());
			$this->addShortcode(new ProductListSimple());
		}
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
	}
	
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();
		
		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();