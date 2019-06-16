<?php
  /**
   * template name: member
   * Template Post Type: post, page
   */



//OBLIGATOIRE : Récupère les variables globales de Wordpress
  $context = Timber::get_context();

// on récupère le contenu du post actuel grâce à TimberPost
  $post = new TimberPost();

// on ajoute la variable post (qui contient le post) à la variable
// qu'on enverra à la vue twig
  $context['post'] = $post;

// tableau d'arguments pour modifier la requête en base
// de données, et venir récupérer uniquement les trois
// derniers articles
  $args_members = [
    'post_type' => 'post',
    'category_name' => 'membre'
  ];

// appelle la vue twig "template-member.twig" située dans le dossier views
// en lui passant la variable $context qui contient notamment ici les articles
  $context['members'] = Timber::get_posts($args_members);
  Timber::render('template-member.twig', $context);