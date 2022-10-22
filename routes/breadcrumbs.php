<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
     $trail->push('Dashboard', route('dashboard'));
});

//Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile');
});

//Image
Breadcrumbs::for('image', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Image');
});

//Setting
Breadcrumbs::for('setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting','#');
});

    //User
    Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
        $trail->parent('setting');
        $trail->push('User', route('user.index'));
    });
    Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, $user) {
        $trail->parent('user');
        $trail->push($user->name);
    });
