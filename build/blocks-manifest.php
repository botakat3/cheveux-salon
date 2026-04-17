<?php
// This file is generated. Do not modify it manually.
return array(
	'cheveux-hero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'cheveux/hero',
		'version' => '0.1.0',
		'title' => 'Cheveux Hero',
		'category' => 'design',
		'icon' => 'cover-image',
		'description' => 'Hero section for Cheveux homepage',
		'keywords' => array(
			'homepage',
			'add',
			'hero',
			'banner'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'quote' => array(
				'type' => 'string',
				'default' => 'Effortless beauty, elevated.'
			),
			'title' => array(
				'type' => 'string',
				'default' => 'CHEVEUX'
			)
		)
	),
	'content-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'cheveux/content-block',
		'version' => '0.1.0',
		'title' => 'Content Block',
		'category' => 'design',
		'icon' => 'align-pull-left',
		'description' => 'Use this block to add your content! Flexible block with image and layout switching options.',
		'keywords' => array(
			'content',
			'add'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'hasImage' => array(
				'type' => 'boolean',
				'default' => true
			),
			'imagePosition' => array(
				'type' => 'string',
				'default' => 'left'
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageAlt' => array(
				'type' => 'string',
				'default' => ''
			),
			'title' => array(
				'type' => 'string',
				'default' => 'Section Title'
			),
			'colorPreset' => array(
				'type' => 'string',
				'default' => 'light'
			),
			'text' => array(
				'type' => 'string',
				'default' => 'Add your content here.'
			)
		)
	),
	'project-finder' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'tk/project-finder',
		'version' => '0.1.0',
		'title' => 'Searchable project listing',
		'category' => 'design',
		'icon' => 'id',
		'description' => 'Search for projects listing',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'project-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'tk/project-list',
		'version' => '0.1.0',
		'title' => 'Project List',
		'category' => 'design',
		'icon' => 'id',
		'description' => 'add your projects list',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'staff-finder' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'tk/staff-finder',
		'version' => '0.1.0',
		'title' => 'Staff finder',
		'category' => 'design',
		'icon' => 'id',
		'description' => 'Searchable staff list.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'staff-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'tk/staff-list',
		'version' => '0.1.0',
		'title' => 'List',
		'category' => 'design',
		'icon' => 'id',
		'description' => 'A list of staff members.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'cardColor' => array(
				'type' => 'string',
				'default' => '#000000'
			),
			'headingColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			)
		)
	),
	'testimonial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'tk/testimonial',
		'version' => '0.1.0',
		'title' => 'Testimonial',
		'category' => 'design',
		'icon' => 'testimonial',
		'description' => 'add some extra pulpy testimonials!',
		'keywords' => array(
			'reviews',
			'wctc'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'high-pulp-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'author' => array(
				'type' => 'string',
				'source' => 'text',
				'selector' => '.author'
			),
			'location' => array(
				'type' => 'string',
				'source' => 'text',
				'selector' => '.location'
			),
			'quote' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.quote'
			),
			'stars' => array(
				'type' => 'number',
				'default' => 5
			),
			'imgUrl' => array(
				'type' => 'string',
				'default' => 'https://placehold.co/75'
			),
			'backgroundColorClass' => array(
				'type' => 'string'
			),
			'borderColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		)
	)
);
