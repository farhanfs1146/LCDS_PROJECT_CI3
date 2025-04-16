<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Raw Material Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background-color: #f8f9fa;
      height: 100vh;
    }

    .container-fluid {
        
      height: 100vh;
      /* background-color:rgb(5, 67, 129); */
      /* Display: flex;
      FLEX-DIRECTION: COLUMN; */
    }

    .dashboard-heading {
      font-size: clamp(1.5rem, 2.3vw, 2.6rem);
      font-weight: bold;
      text-align: center;
      padding: 1rem;
      background-color: #198754;
      color: white;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
      min-height: 8vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .low-stock {
      background-color: #ffe5e5;
      color: #b30000;
      font-weight: bold;
    }

    .table-responsive {
      
      min-height: 85vh;
      /* height: auto; */
      Display: flex;
      justify-content: center;

    }

    .table-enhanced {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      /* overflow: hidden; */
      /* font-size: clamp(16px, 1.2vw, 1.5vw); */
      font-size: clamp(16px, 1vw, 1.1vw);

    }

    .table-enhanced thead {
      background: linear-gradient(to right, #2c3e50, #4ca1af);
      color: #ffffff;
    }

    .table-enhanced th,
    .table-enhanced td {
      padding: 0.3rem;
      vertical-align: middle;
    }

    .table-enhanced tbody tr:hover {
      background-color: #f1f9ff;
      transition: background-color 0.3s ease;
    }

    .low-stock {
      background-color: #fff0f0;
      color: #c0392b;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container-fluid py-4">
    <div class="dashboard-heading">📦 Raw Material Stock</div>

    <div class="table-responsive">
      <table class="table table-hover table-striped table-enhanced">
        <thead>
          <tr>
            <th>📦 Category / Material</th>
            <th>📊 Quantity / Balance</th>
            <th>⚙️ Estimated Balls Production</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($raw_material_available_balanace as $m): ?>
            <tr>
              <td><?= $m['Category']; ?></td>
              <td class="<?= (is_numeric($m['Balance']) && $m['Balance'] <= 500) ? 'low-stock' : ''; ?>">
              <?= floor($m['Balance']); ?>
              </td>
              <td><?= floor($m['Estimated_Ball_Production_Qty']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
  setTimeout(function() {
            window.location = "<?php echo base_url('DD/S1'); ?>";
        }, 60000); // 60 seconds // 1 minute...

  </script>
</body>
</html>
