<?php
$routes = [
    'metadata',
    'getProductBySearchQuery',
    'openBoxBySKU',
    'openBoxByListSKUs',
    'getAllOpenBox',
    'openBoxByCategory',
    'getAllCategories',
    'getCategoriesByName',
    'getCategoriesById',
    'getTrendingProducts',
    'getTrendingProductsByCategoryId',
    'getPopularViewedProductsByCategoryId',
    'getAlsoViewedProduct',
    'getStoresBySearchQuery'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

