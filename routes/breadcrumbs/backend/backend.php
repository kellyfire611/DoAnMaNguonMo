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

// Địa điểm
Breadcrumbs::for('admin.diadiem.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.diadiem.management'), route('admin.diadiem.index'));
});

Breadcrumbs::for('admin.diadiem.deleted', function ($trail) {
    $trail->parent('admin.diadiem.index');
    $trail->push(__('menus.backend.diadiem.deleted'), route('admin.diadiem.deleted'));
});

Breadcrumbs::for('admin.diadiem.create', function ($trail) {
    $trail->parent('admin.diadiem.index');
    $trail->push(__('labels.backend.diadiem.create'), route('admin.diadiem.create'));
});

Breadcrumbs::for('admin.diadiem.show', function ($trail, $id) {
    $trail->parent('admin.diadiem.index');
    $trail->push(__('menus.backend.diadiem.view'), route('admin.diadiem.show', $id));
});

Breadcrumbs::for('admin.diadiem.edit', function ($trail, $id) {
    $trail->parent('admin.diadiem.index');
    $trail->push(__('menus.backend.diadiem.edit'), route('admin.diadiem.edit', $id));
});

