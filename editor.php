<?php

/* Add styles/classes to the "Styles" drop-down */

add_action( 'after_setup_theme', 'editor_after_setup_theme' );
function editor_after_setup_theme()
{
    add_editor_style();
}

add_filter('mce_buttons_2', 'editor_mce_buttons');
function editor_mce_buttons($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'editor_tiny_mce_before_init');
function editor_tiny_mce_before_init($settings)
{
  $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';

  // From http://tinymce.moxiecode.com/examples/example_24.php
  $style_formats = array(
    array(
      'title' => 'Text',
      'icon' => 'forecolor',
      'items' => array(
        array( 'title' => 'Lead Text', 'block' => 'span', 'classes' => 'lead', 'icon' => 'visualblocks', ),
        array( 'title' => 'Small Text', 'block' => 'small', 'icon' => 'checkbox', 'icon' => 'forecolor', ),
        array(
          'title' => 'Text Colour',
          'icon' => 'forecolor',
          'items' => array(
            array( 'title' => 'Muted', 'inline' => 'span', 'classes' => 'text-muted', 'icon' => '' ),
            array( 'title' => 'Primary', 'inline' => 'span', 'classes' => 'text-primary', 'icon' => '' ),
            array( 'title' => 'Success', 'inline' => 'span', 'classes' => 'text-success', 'icon' => 'checkmark' ),
            array( 'title' => 'Info', 'inline' => 'span', 'classes' => 'text-info', 'icon' => 'info' ),
            array( 'title' => 'Warning', 'inline' => 'span', 'classes' => 'text-warning', 'icon' => 'warning' ),
            array( 'title' => 'Danger', 'inline' => 'span', 'classes' => 'text-danger', 'icon' => 'notice' ),
          )
        ),
        array(
          'title' => 'Highlight',
          'icon' => 'line',
          'items' => array(
            array( 'title' => 'Primary', 'inline' => 'mark', 'classes' => 'bg-primary', 'icon' => '' ),
            array( 'title' => 'Success', 'inline' => 'mark', 'classes' => 'bg-success', 'icon' => 'checkmark' ),
            array( 'title' => 'Info', 'inline' => 'mark', 'classes' => 'bg-info', 'icon' => 'info' ),
            array( 'title' => 'Warning', 'inline' => 'mark', 'classes' => 'bg-warning', 'icon' => 'warning' ),
            array( 'title' => 'Danger', 'inline' => 'mark', 'classes' => 'bg-danger', 'icon' => 'notice' ),
          )
        ),
      )
    ),
    array(
      'title' => 'Alert',
      'icon' => 'bubble',
      'items' => array(
        array( 'title' => 'Info', 'block' => 'div', 'classes' => 'alert alert-info', 'icon' => 'info', 'wrapper' => true ),
        array( 'title' => 'Success', 'block' => 'div', 'classes' => 'alert alert-success', 'icon' => 'checkmark', 'wrapper' => true ),
        array( 'title' => 'Warning', 'block' => 'div', 'classes' => 'alert alert-warning', 'icon' => 'warning', 'wrapper' => true ),
        array( 'title' => 'Danger', 'block' => 'div', 'classes' => 'alert alert-danger', 'icon' => 'notice', 'wrapper' => true ),
      )
    ),
    array(
      'title' => 'Well',
      'block' => 'div',
      'classes' => 'well',
      'wrapper' => true,
      'icon' => 'checkbox',
      'wrapper' => true
    ),
    array(
      'title' => 'Panel',
      'icon' => 'tabletopheader',
      'items' => array(
        array( 'title' => 'Panel', 'block' => 'div', 'classes' => 'panel panel-default', 'icon' => 'tabletopheader' ),
        array( 'title' => 'Panel Heading', 'inline' => 'div', 'classes' => 'panel-heading', 'icon' => 'tabletopheader' ),
        array( 'title' => 'Panel Body', 'inline' => 'div', 'classes' => 'panel-body', 'icon' => 'tabletopheader' ),
      )
    ),
    array(
      'title' => 'Float Element',
      'icon' => 'orientation',
      'items' => array(
        array( 'title' => 'Float Left', 'block' => 'div', 'classes' => 'pull-left', 'icon' => 'arrowleft' ),
        array( 'title' => 'Float Right', 'block' => 'div', 'classes' => 'pull-right', 'icon' => 'arrowright' ),
      )
    ),
    array(
      'title' => 'Button',
      'icon' => 'pluscircle',
      'items' => array(
        array( 'title' => 'Default', 'block' => 'a', 'classes' => 'btn btn-default', 'icon' => '' ),
        array( 'title' => 'Success', 'block' => 'a', 'classes' => 'btn btn-success', 'icon' => 'checkmark' ),
        array( 'title' => 'Info', 'block' => 'a', 'classes' => 'btn btn-info', 'icon' => 'info' ),
        array( 'title' => 'Warning', 'block' => 'a', 'classes' => 'btn btn-warning', 'icon' => 'warning' ),
        array( 'title' => 'Danger', 'block' => 'a', 'classes' => 'btn btn-danger', 'icon' => 'notice' ),
        array( 'title' => 'Button Group', 'block' => 'div', 'classes' => 'btn-group', 'icon' => '', 'wrapper' => true ),
      )
    ),
    array(
      'title' => 'Image Style',
      'icon' => 'image',
      'items' => array(
        array( 'title' => 'Rounded Corners', 'block' => 'img', 'classes' => 'img-rounded', ),
        array( 'title' => 'Circle', 'block' => 'a', 'classes' => 'img-circle', ),
        array( 'title' => 'Framed', 'block' => 'a', 'classes' => 'img-thumbnail', ),
      )
    ),
  );

    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
