<?php
return array
(
  'cache'    => false,
  'per_page' => 10,
  'youtube_api_key' => 'AIzaSyDAVKCgnt1-HxSJS-KTRVYlrnA5J3PU3bc',
  'modules'  => array(
    'photo_gallery' => array(
      'thumb_size' => array(
        'width'  => 150,
        'height' => 150
      ),
      'image_dir'  => '/uploads/dropzone/',
    ),
    'slider'        => array(
      'image_size' => array(
        'width'  => null,
        'height' => 600
      ),
      'image_dir'  => '/uploads/slider/',
    ),
    'article'       => array(
      'image_size' => array(
        'width'  => 730,
        'height' => 290
      ),
      'thumb_size' => array(
        'width'  => 64,
        'height' => 64
      ),
      'image_dir'  => '/uploads/article/',
    ),
    'news'          => array(
      'image_size' => array(
        'width'  => 240,
        'height' => 150
      ),
      'image_dir'  => '/uploads/news/',
    ),
    'blog'       => array(
      'image_size' => array(
        'width'  => 750,
        'height' => 600
      ),
      'image_dir'  => '/uploads/project/',
      'category'   => array('Bootstrap', 'HTML', 'CSS'),
    ),
    'category'      => array(),
    'faq'           => array(),
    'page'          => array(),
    'video'         => array(),
    'menu'          => array(),
    'setting'       => array(),
    'user'          => array(),
    'group'         => array(),
  ),
);