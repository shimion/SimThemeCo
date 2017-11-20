<?php 
namespace ST\Widgets;
class init{
    public $widgets;
  public  static function init() {

      return array(
        \ST\Widgets\LatestEventWidget::class,
        \ST\Widgets\LatestRequestWidget::class,
        \ST\Widgets\CallToActionWidget::class,
        \ST\Widgets\FormWidget::class,
        \ST\Widgets\SectionWidget::class,
        \ST\Widgets\PostTypeWidget::class,
        \ST\Widgets\FeaturedBoxWidget::class,
        \ST\Widgets\MenuWidget::class  
      );

    

    }
    
}