<?php
    use app\models\Admin;
    use app\models\Product;

    $products = Product::getAllProducts();
    $productsId = array_column($products, 'idproduct');
    $productsStock = array_column($products, 'stock');
?>
<!-- Statistics Cards -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h2 class="card-title">Vendite totali</h2>
                <p class="card-text">€ <?= Admin::getTotalSales() ?? 0 ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h2 class="card-title">Ordini totali</h2>
                <p class="card-text"><?= Admin::getTotalOrders() ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h2 class="card-title">Nuovi clienti</h2>
                <p class="card-text"><?= Admin::getTotalUsers() ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">Inventario</h2>
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Array.from(<?= json_encode($productsId) ?>),
                    datasets: [{
                        label: 'Prodotti rimasti',
                        data: Array.from(<?= json_encode($productsStock) ?>),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Id prodotto'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Disponibilità'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>