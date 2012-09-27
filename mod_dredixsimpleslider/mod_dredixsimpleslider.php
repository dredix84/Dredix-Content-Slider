<?php
/*------------------------------------------------------------------------
# mod_acynewest - Newest Newsletter for AcyMailing
# ------------------------------------------------------------------------
# author    Andre Dixon
# copyright Copyright (C) 2010 dredix.net. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.dredix.net
# Technical Support:  Email - dredix@dredix.net
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$mod_name = "mod_dredixsimpleslider";
$document =& JFactory::getDocument();
$db = JFactory::getDBO();
$component = JComponentHelper::getComponent( 'com_dredixslidermanager' );		//Getting configuration
$docbase = JURI::base();



	function getSlideLink(&$slide) {
		$slide_params = new JRegistry($slide->params);
		$link = '';
		$db = &JFactory::getDBO();
		switch($slide_params->get('link_type', '')) {
			case 'menu':
				if ($menuid = $slide_params->get('link_menu',0)) {
					$menu =& JSite::getMenu();
					$menuitem = $menu->getItem($menuid);
					if($menuitem) switch($menuitem->type) {
						case 'component': 
							$link = JRoute::_($menuitem->link.'&Itemid='.$menuid);
							break;
						case 'url':
						case 'alias':
							$link = JRoute::_($menuitem->link);
							break;
					}	
				}
				break;
			case 'url':
				if($itemurl = $slide_params->get('link_url',0)) {
					$link = JRoute::_($itemurl);
				}
				break;
			case 'article':
				if ($artid = $slide_params->get('id',$slide_params->get('link_article',0))) {
					require_once(JPATH_BASE.DS.'components'.DS.'com_content'.DS.'models'.DS.'article.php');
					require_once(JPATH_BASE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
					$model = new ContentModelArticle();
					$item = $model->getItem($artid);
					if($item) {
						$item->slug = $item->alias ? ($item->id . ':' . $item->alias) : $item->id;
						$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid));
					}
				}
				break;
		}
		
		return $link;
	}



$list1	= $params->get('category', '');
$animation	= $params->get('animation', '');
$autoplay	= $params->get('autoplay', '');
$hoverpause	= $params->get('hoverpause', '');
$slider_width	= $params->get('slider_width', '');
$slider_height	= $params->get('slider_height', '');


/*$document->addStyleSheet(JURI::base() . 'modules/mod_dredixsimpleslider/css/basic-jquery-slider.css');
$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js');
$document->addScript(JURI::base() . 'modules/mod_dredixsimpleslider/js/basic-jquery-slider.js');*/
$document->addStyleSheet(JURI::base() . "modules/$mod_name/bx_styles/bx_styles.css");
switch ($params->get('jqueryinclude', ''))
{
	case "local":
	  $document->addScript(JURI::base() ."modules/$mod_name/js/jquery-1.8.1.js");
	  break;
	case "jquery":
	  $document->addScript("http://code.jquery.com/jquery-latest.js");
	  break;
	case "google":
	  $document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js");
	  break;
	default:
}
$document->addScript(JURI::base() ."modules/$mod_name/js/jquery.bxSlider.min.js");


$morelist = "";
if ($uselist2 == 1) {$morelist .=  " OR l.listid = ".$list2;}
if ($uselist3 == 1) {$morelist .=  " OR l.listid = ".$list3;}
$query = "SELECT * FROM xtwm6_dredixslidermanager WHERE catid = $list1;";
$db->setQuery($query);
$rows = $db->loadObjectList();

$slideid = rand(1, 9999);

?>

<style>
	.bx-wrapper{
		margin-left: auto;
		margin-right: auto;
	}
	.dslidercontainer a:link, .dslidercontainer a:hover, .dslidercontainer a:visited, .dslidercontainer a:active {
		text-decoration:none;
	}
	<?=$params->get('custcss', '')?>
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$('#slider<?=$slideid?>').bxSlider({
			auto: <?=$autoplay?>,
			autoHover: <?=$hoverpause?>,
			pager: <?=$params->get('showpager', '')?>,
			pagerType: '<?=$params->get('pagertype', '')?>',
			pagerLocation: '<?=$params->get('pagerposition', '')?>',
			autoControls: <?=$params->get('showstartstop', '')?>,
			mode: '<?=$params->get('mode', '')?>',
			hideControlOnEnd: <?=$params->get('controlsonend', '')?>,
			pause: <?=$params->get('speed', '')?>,
			wrapperClass: 'bx-wrapper'
		});
	});
</script>


    <div id="slider<?=$slideid?>" class="dslidercontainer<?=$params->get('container_css_suffix', '')?>" style="width:<?=$slider_width?>px; height:<?=$slider_height?>px; margin-left: auto; margin-right:auto">
    <?php
		foreach($rows as $row){
			$link= json_decode($row->params,true);
			if($link["link_type"] != ""){
				if($link["link_target"] == "_self"){$target = "_self";}
				else{$target = "_blank";}
				echo "<a href='".getSlideLink($row)."' target='$target'>";				
			}
	?>
        <div>
        	<img src="<?=JURI::base() . $row->image?>" style="height:<?=($slider_height - 2)?>px; width:auto; float:<?=$params->get('imageposition', '')?>; border-radius:<?=$params->get('image_rounded', '')?>px" />
        	<h1 style="font-size:x-large; font-weight:bold"><?=$row->title?></h1>
            <?php if($row->description != ""){ ?><h2><?=$row->description ?></h2><?php } ?>
        </div>
    <?php
			if($link["link_type"] != ""){
				echo "</a>";
			} 
		} 
	?>
  	</div>

  

      
    
    

    
    