<?php

declare(strict_types=1);

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Dashboard'), route('dashboard'));
});

Breadcrumbs::for('settings', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Settings'), route('settings'));
});

Breadcrumbs::for('settings.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('settings');
    $trail->push(__('Profile'), route('settings.profile'));
});

Breadcrumbs::for('settings.password', function (BreadcrumbTrail $trail) {
    $trail->parent('settings');
    $trail->push(__('Password'), route('settings.password'));
});

Breadcrumbs::for('settings.appearance', function (BreadcrumbTrail $trail) {
    $trail->parent('settings');
    $trail->push(__('Appearance'), route('settings.appearance'));
});

Breadcrumbs::for('system.account.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Accounts'), route('system.account.index'));
});

// Users
Breadcrumbs::for('system.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Users'), route('system.user.index'));
});

Breadcrumbs::for('system.user.show', function (BreadcrumbTrail $trail) {
    $trail->parent('system.user.index');
    $trail->push(request()->user->name, route('system.user.show', request()->user));
});

Breadcrumbs::for('system.user.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('system.user.show');
    $trail->push(__('Edit'), route('system.user.show', request()->user));
});

// Roles
Breadcrumbs::for('system.role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Roles'), route('system.role.index'));
});

Breadcrumbs::for('system.role.show', function (BreadcrumbTrail $trail) {
    $trail->parent('system.role.index');
    $trail->push(request()->role->title, route('system.role.show', request()->role));
});

Breadcrumbs::for('system.role.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('system.role.show');
    $trail->push(__('Edit'), route('system.role.show', request()->role));
});

// Abilities
Breadcrumbs::for('system.ability.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Abilities'), route('system.ability.index'));
});

Breadcrumbs::for('system.ability.show', function (BreadcrumbTrail $trail) {
    $trail->parent('system.ability.index');
    $trail->push(request()->ability->title, route('system.ability.show', request()->ability));
});

Breadcrumbs::for('system.ability.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('system.ability.show');
    $trail->push(__('Edit'), route('system.ability.show', request()->ability));
});
