<?php

use App\Models\Category;
use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail): void {
    $trail->push('categories', route('categories.index'));
});

Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail): void {
    $trail->push('categories', route('categories.create'));
});

Breadcrumbs::for('categories.show', function (BreadcrumbTrail $trail, Category $category): void {
    $trail->parent('categories.index');

    $trail->push($category->name, route('categories.show', $category));
});

Breadcrumbs::for('posts.index', function (BreadcrumbTrail $trail): void {
    $trail->push('posts', route('posts.index'));
});

Breadcrumbs::for('posts.create', function (BreadcrumbTrail $trail): void {
    $trail->push('posts', route('posts.create'));
});

Breadcrumbs::for('posts.edit', function (BreadcrumbTrail $trail, Post $post): void {
    $trail->parent('posts.index', $post);

    $trail->push($post->title, route('posts.edit', $post));
});