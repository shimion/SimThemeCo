<?php 

$config = array(
         array(
            'id'      => 'layout',
            'title'           => 'Add Section',
          // 'default' => $layout_value,
            'accordion_title' => 'Section',
            'type'            => 'group',
            'fields'          => array(

            array(
             'id'          => 'title',
              'type'        => 'text',
              'title'       => 'Title field Field',
                'attribute'       => array(
                'class' =>  'class-captchure'
                ),
            ),

            array(
             // 'name'          => $layout.'[text]',
               'id'          => 'text',
               'type'        => 'textarea',
               'title'       => 'Textarea',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


            array(
             // 'name'          => $layout.'[text]',
               'id'          => 'icon',
              'type'        => 'icon',
              'title'       => 'Select Icon',
              'attribute'       => array(
                'class' =>  'class-captchure'
                ),
            ),


          ),              )
        );
