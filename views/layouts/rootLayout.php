<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="DocTrack - Enterprise document approval and review platform. Streamline your document workflows with secure digital signatures and approvals.">
    <title>DocTrack - Document Approval & Review Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">
</head>
<body>
<?php include_once __DIR__ . '/../partials/flash_toast.php'; ?>

<div>
    {{content}}
</div>

<script src="/js/toast.js"></script>
</body>
</html>
