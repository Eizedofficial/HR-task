<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/js/main.js"></script>
</head>
<body>
    <div class="wrapper">
        <table class="products" id="productsTable">
            <tr class="control-panel">
                <td class="control-panel-header" colspan="6">
                    Отображается товаров: <span id="productsAmount"></span>
                </td>

                <td class="control-panel-buttons">
                    <button id="removeProduct" onclick="removeItem()">-</button>
                    <button id="addProduct" onclick="addItem()">+</button>
                </td>
            </tr>
            <tr class="products-headers">
                <td>ID</td>
                <td>Название</td>
                <td>Описание</td>
                <td>Цена</td>
                <td>Кол-во</td>
                <td>Дата создания</td>
                <td></td>
            </tr>
        </table>
    </div>
</body>
</html>