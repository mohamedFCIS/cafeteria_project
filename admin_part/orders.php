<?php include '../auth/admin_auth.php'?>
<?php

$dns = "mysql:dbname=cafeteria;host=localhost;";
$username = 'root';
$password = "";
$userId = intval($_GET['users'] ?? null);
$fromDate = $_GET['fromDate'] ?? null;
$toDate = $_GET['toDate'] ?? null;
try {
    $db = new PDO($dns, $username, $password);

    $query = "SELECT users.Id, users.user_name , orders.date , orders.order_price , orders.order_Id  FROM `users` 
                LEFT JOIN `orders` ON `orders`.user_Id = `users`.Id ";
    $condition = [];
    if (!empty($userId)) {
        $condition[] = "  users.Id = " . $userId;
    }
    if (!empty($fromDate)) {
        $condition[] = "  Date(orders.Date)  >= '" . $fromDate . "'";
    }
    if (!empty($toDate)) {
        $condition[] = "  Date(orders.Date)  <= '" . $toDate . "'";
    }

    if (!empty($condition)) {

        $query .= " WHERE ";
        $query .= implode(" AND ", $condition);
    }
    $query .= " GROUP BY order_Id";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $userOrders = $stmt->fetchAll(PDO::FETCH_OBJ);

    $userUnique = [];
    foreach ($userOrders as $key => $order) {
        if (!isset($userUnique[$order->Id])) {
            $userUnique[$order->Id]  =  ["name" => $order->user_name, "userId" => $order->Id, "sum" => 0];
        }
        $userUnique[$order->Id]['sum'] += $order->order_price;
        $userUnique[$order->Id]['orders'][] = ["Date" => $order->date, "orderId" => $order->order_Id, "price" => $order->order_price];
    }
} catch (Throwable $th) {
    throw $th;
}
if (isset($_GET['users'])) {
}
