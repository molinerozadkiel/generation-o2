<?php

// Built by www.lattedev.com
add_action( 'init', 'lt_custom_posts' );
function lt_custom_posts() {


		// Proyectos
    /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
		'name'               => _x( 'Proyectos', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Proyecto', 'post type singular name', 'text-domain' ),
		'menu_name'          => _x( 'Proyectos', 'admin menu', 'text-domain' ),
		'add_new'            => _x( 'Añadir nuevo', 'proyecto', 'text-domain' ),
		'add_new_item'       => __( 'Añadir nuevo proyecto', 'text-domain' ),
		'new_item'           => __( 'Nuevo proyecto', 'text-domain' ),
		'edit_item'          => __( 'Editar proyecto', 'text-domain' ),
		'view_item'          => __( 'Ver proyecto', 'text-domain' ),
		'all_items'          => __( 'Todos los proyectos', 'text-domain' ),
		'search_items'       => __( 'Buscar proyectos', 'text-domain' ),
		'not_found'          => __( 'No hay proyectos departamentos.', 'text-domain' ),
		'not_found_in_trash' => __( 'Ningun proyecto en la papelera.', 'text-domain' )
	);


    /* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Desctription.', 'text-domain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
    	'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'departamento' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
    	'taxonomies'         => array('loc'),
		'menu_icon'          => 'dashicons-admin-site-alt3',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' )
	);
	register_post_type( 'proyectos', $args );

  /* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
  $labels = array(
    'name'             => _x( 'Departamentos', 'taxonomy general name' ),
    'singular_name'    => _x( 'Departamento', 'taxonomy singular name' ),
    'search_items'     => __( 'Search by Location' ),
    'all_items'        => __( 'Todos los departamentos' ),
    'parent_item'      => __( 'Parent location' ),
    'parent_item_colon'=> __( 'Parent location:' ),
    'edit_item'        => __( 'Editar departamento' ),
    'update_item'      => __( 'Actualizar departamentos' ),
    'add_new_item'     => __( 'Añadir nuevo departamentos' ),
    'new_item_name'    => __( 'Nombre del nuevo departamento' ),
  );

  /* Registramos la taxonomía y la configuramos como jerárquica (al estilo de las categorías) */
  register_taxonomy( 'proyectos', array( 'proyectos' ), array(
    'labels'             => $labels,
    'public'             => true,
    'hierarchical'       => true,
    'show_ui'            => true,
    'query_var'          => true,
    'show_in_nav_menus'  => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true, // Needed for tax to appear in Gutenberg editor.
    'rewrite'            => array( 'slug' => 'proyectos' ),
  ));

}
// FIN proyectos


// EQUIPO
    /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
		'name'               => _x( 'Equipo', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Equipo', 'post type singular name', 'text-domain' ),
		'menu_name'          => _x( 'Equipo', 'admin menu', 'text-domain' ),
		'add_new'            => _x( 'Añadir nuevo', 'miembro', 'text-domain' ),
		'add_new_item'       => __( 'Añadir nuevo miembro', 'text-domain' ),
		'new_item'           => __( 'Nuevo miembro', 'text-domain' ),
		'edit_item'          => __( 'Editar miembro', 'text-domain' ),
		'view_item'          => __( 'Ver miembro', 'text-domain' ),
		'all_items'          => __( 'Todos los miembros', 'text-domain' ),
		'search_items'       => __( 'Buscar miembros', 'text-domain' ),
		'not_found'          => __( 'No hay miembros.', 'text-domain' ),
		'not_found_in_trash' => __( 'No hay miembros en la papelera.', 'text-domain' )
	);
  /* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Desctription.', 'text-domain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
    'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'equipo' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
    'taxonomies'         => array('area'),
		'menu_icon'          => 'dashicons-groups',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' )
	);
	register_post_type( 'equipo', $args );

	/* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
	$labels = array(
		'name'             => _x( 'Áreas', 'taxonomy general name' ),
		'singular_name'    => _x( 'Área', 'taxonomy singular name' ),
		'search_items'     => __( 'Buscar por área' ),
		'all_items'        => __( 'Todas las áreas' ),
		'parent_item'      => __( 'Área principal' ),
		'parent_item_colon'=> __( 'Área principal:' ),
		'edit_item'        => __( 'Editar Área' ),
		'update_item'      => __( 'Actualizar Área' ),
		'add_new_item'     => __( 'Agregar nueva Área' ),
		'new_item_name'    => __( 'Nombre de la nueva área' ),
	);

	/* Registramos la taxonomía y la configuramos como jerárquica (al estilo de las categorías) */
	register_taxonomy( 'area', array( 'equipo' ), array(
		'labels'             => $labels,
		'public'             => true,
		'hierarchical'       => true,
		'show_ui'            => true,
		'query_var'          => true,
		'show_in_nav_menus'  => true,
		'show_admin_column'  => true,
		'show_in_rest'       => true, // Needed for tax to appear in Gutenberg editor.
		'rewrite'            => array( 'slug' => 'area' ),
	));

	// FIN EQUIPO


	// COLABORADORES
	    /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
		$labels = array(
			'name'               => _x( 'Colaboradores', 'post type general name', 'text-domain' ),
			'singular_name'      => _x( 'Colaborador', 'post type singular name', 'text-domain' ),
			'menu_name'          => _x( 'Colaboradores', 'admin menu', 'text-domain' ),
			'add_new'            => _x( 'Añadir nuevo', 'colaborador', 'text-domain' ),
			'add_new_item'       => __( 'Añadir nuevo colaborador', 'text-domain' ),
			'new_item'           => __( 'Nuevo colaborador', 'text-domain' ),
			'edit_item'          => __( 'Editar colaborador', 'text-domain' ),
			'view_item'          => __( 'Ver colaborador', 'text-domain' ),
			'all_items'          => __( 'Todos los colaboradores', 'text-domain' ),
			'search_items'       => __( 'Buscar colaboradores', 'text-domain' ),
			'not_found'          => __( 'No hay colaboradores.', 'text-domain' ),
			'not_found_in_trash' => __( 'No hay colaboradores en la papelera.', 'text-domain' )
		);
	  /* Configuro el comportamiento y funcionalidades del nuevo custom post type */
		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Desctription.', 'text-domain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_nav_menus'  => true,
			'show_in_menu'       => true,
	    'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'colaborador' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
	    'taxonomies'         => array('entidad'),
			'menu_icon'          => 'dashicons-heart',
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' )
		);
		register_post_type( 'colaborador', $args );

		/* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
		$labels = array(
			'name'             => _x( 'Entidad', 'taxonomy general name' ),
			'singular_name'    => _x( 'Entidad', 'taxonomy singular name' ),
			'search_items'     => __( 'Buscar por entidad' ),
			'all_items'        => __( 'Todas las entidad' ),
			'parent_item'      => __( 'Entidad principal' ),
			'parent_item_colon'=> __( 'Entidad principal:' ),
			'edit_item'        => __( 'Editar entidad' ),
			'update_item'      => __( 'Actualizar entidad' ),
			'add_new_item'     => __( 'Agregar nueva entidad' ),
			'new_item_name'    => __( 'Nombre de la nueva entidad' ),
		);

		/* Registramos la taxonomía y la configuramos como jerárquica (al estilo de las categorías) */
		register_taxonomy( 'entidad', array( 'colaborador' ), array(
			'labels'             => $labels,
			'public'             => true,
			'hierarchical'       => true,
			'show_ui'            => true,
			'query_var'          => true,
			'show_in_nav_menus'  => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true, // Needed for tax to appear in Gutenberg editor.
			'rewrite'            => array( 'slug' => 'entidad' ),
		));

		// FIN COLABORADORES
