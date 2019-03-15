<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

// Tỉnh thành
Breadcrumbs::for('admin.tinhthanh.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.tinhthanh.management'), route('admin.tinhthanh.index'));
});

Breadcrumbs::for('admin.tinhthanh.deleted', function ($trail) {
    $trail->parent('admin.tinhthanh.index');
    $trail->push(__('menus.backend.tinhthanh.deleted'), route('admin.tinhthanh.deleted'));
});

Breadcrumbs::for('admin.tinhthanh.create', function ($trail) {
    $trail->parent('admin.tinhthanh.index');
    $trail->push(__('labels.backend.tinhthanh.create'), route('admin.tinhthanh.create'));
});

Breadcrumbs::for('admin.tinhthanh.show', function ($trail, $id) {
    $trail->parent('admin.tinhthanh.index');
    $trail->push(__('menus.backend.tinhthanh.view'), route('admin.tinhthanh.show', $id));
});

Breadcrumbs::for('admin.tinhthanh.edit', function ($trail, $id) {
    $trail->parent('admin.tinhthanh.index');
    $trail->push(__('menus.backend.tinhthanh.edit'), route('admin.tinhthanh.edit', $id));
});

