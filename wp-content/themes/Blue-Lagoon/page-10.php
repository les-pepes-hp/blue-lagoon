<?php

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

  $args_articles1 =[
    'post-type' => 'editos',
    'post_per_page' =>1,
    'orderby' => 'date',
    'order' => 'DESC',

  ];

  $args_articles2 =[
    'post-type' => 'articles',
    'post_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',

  ];
  $args_articles3 = [
    'post-type' => 'events',
    'post_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
  ];

// récupère les articles en fonction du tableau d'argument $args_posts
// en utilisant la méthode de Timber get_posts
// puis on les enregistre dans l'array $context sous la clé "posts"

  $context['editos'] = Timber::get_posts($args_articles1);
  $context['articles'] = Timber::get_posts($args_articles2);
  $context['events'] = Timber::get_posts($args_articles3);

//  var_dump($context['shows']);die;


// appelle la vue twig "page-7.twig" située dans le dossier views
// en lui passant la variable $context qui contient notamment ici les articles
  Timber::render('page-10.twig', $context);
