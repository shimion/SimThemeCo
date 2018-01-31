<?php 

$config = array(
         array(
            'id'      => 'layout',
            'title'           => 'Add Section',
            'button_title'    => 'Add New',
          // 'default' => $layout_value,
            'accordion_title' => 'Section',
            'type'            => 'group',
            'fields'          => array(

            array(
             'id'          => 'title',
              'type'        => 'text',
            'default'        => 'Title Here',
              'title'       => 'Title field Field',
                'attribute'       => array(
                'class' =>  'class-captchure'
                ),
            ),

            array(
             // 'name'          => $layout.'[text]',
               'id'          => 'text',
               'type'        => 'textarea',
                'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.',
               'title'       => 'Textarea',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


            array(
             // 'name'          => $layout.'[text]',
               'id'          => 'icon',
              'type'        => 'icon',
                'default'   => 'fa fa-flag',    
              'title'       => 'Select Icon',
              'attribute'       => array(
                'class' =>  'class-captchure'
                ),
            ),


          ),              
         )
        );
