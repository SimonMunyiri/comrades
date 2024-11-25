<?php
include 'header.php'; // connect to the db

// fetch search results from the database
// search done across several tables in the db


// Search functionality
$searchQuery = '';
$results = [
    'users' => [],
    'posts' => [],
    'comments' => [],
    // 'hostels' => [],
 ];


// Search data from the following tables - register, posts, comments, hostels
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {

 	// search query
    $searchQuery = $_GET['search'];

    // Search in 'users'
    $usersQuery = "SELECT * FROM register WHERE FirstName LIKE '%$searchQuery%' OR LastName LIKE '%$searchQuery%' OR phone LIKE '%$searchQuery%'";
    $results['users'] = $conn->query($usersQuery)->fetch_all(MYSQLI_ASSOC);

    // Search in 'POSTS'
    $productsQuery = "SELECT * FROM posts WHERE description LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $results['posts'] = $conn->query($productsQuery)->fetch_all(MYSQLI_ASSOC);

    // Search in 'comments'
    $ordersQuery = "SELECT * FROM comments WHERE comment LIKE '%$searchQuery%'";
    $results['comments'] = $conn->query($ordersQuery)->fetch_all(MYSQLI_ASSOC);

   
}

$conn->close();



?>

<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist\css\bootstrap-grid.css">

<body>

<div class="container">
    <h1 class="mt-5">Search Results</h1>
    

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Users</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="products-tab" data-bs-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">Products</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
            <div class="search-results">
                <ul class="list-group">
                    <?php foreach ($results['users'] as $user): ?>
                        <li class="list-group-item"><?= htmlspecialchars($user['FirstName']) ?> (<?= htmlspecialchars($user['LastName']) ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
            <div class="search-results">
                <ul class="list-group">
                    <?php foreach ($results['products'] as $product): ?>
                        <li class="list-group-item"><?= htmlspecialchars($product['name']) ?> - <?= htmlspecialchars($product['description']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <div class="search-results">
                <ul class="list-group">
                    <?php foreach ($results['orders'] as $order): ?>
                        <li class="list-group-item">Order ID: <?= htmlspecialchars($order['id']) ?>, User ID: <?= htmlspecialchars($order['user_id']) ?>, Product ID: <?= htmlspecialchars($order['product_id']) ?>, Quantity: <?= htmlspecialchars($order['quantity']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="search-results">
                <ul class="list-group">
                    <?php foreach ($results['reviews'] as $review): ?>
                        <li class="list-group-item">Rating: <?= htmlspecialchars($review['rating']) ?> - <?= htmlspecialchars($review['comment']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            <div class="search-results">
                <ul class="list-group">
                    <?php foreach ($results['categories'] as $category): ?>
                        <li class="list-group-item"><?= htmlspecialchars($category['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>

</body>

