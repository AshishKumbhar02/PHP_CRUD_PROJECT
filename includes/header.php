<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin-top: 5%;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.5rem;
            text-align: center;
            padding: 1.5rem;
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 2rem;
            background-color: white;
            border-radius: 0 0 10px 10px;
        }

        .form-group label {
            font-size: 1rem;
            font-weight: bold;
        }

        .input-group .input-group-text {
            background-color: #f1f3f5;
            border: 1px solid #ced4da;
            border-right: 0;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .btn {
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .input-group-text {
            font-size: 1.2rem;
            color: #007bff;
        }

        @media (max-width: 576px) {
            .container {
                margin-top: 2%;
            }

            .card {
                margin-left: 10px;
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>
