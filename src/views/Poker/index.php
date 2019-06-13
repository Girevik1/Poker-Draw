<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/src/template/css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Симулятор игры в покер</title>
</head>
<body>

<div class="row justify-content-center">
    <h1>Симулятор игры в покер двух человек</h1>
</div>
<hr>
<div class="container">

    <div class="row justify-content-center">
        <h3>Банк: 20$</h3>
    </div>
    <div class="row justify-content-center">
        <p>(ставка:10$)</p>
    </div>

    <br>

    <div class="row justify-content-between">


        <div class="col-4">
            <p><?php if (!empty($player1)) {
                    echo "<h5> $player1 </h5>";
                } ?>
            </p>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><strong>Имя:</strong> Иван</td>
                </tr>
                <tr>
                    <td><strong>Баланс:</strong> <?= $balance1 ?> $</td>
                </tr>
                <tr>
                    <td><strong>Розданные карты:</strong>
                        <?php if (!empty($playingCardsBy1)) {
                            echo "$playingCardsBy1";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Название комбинации:</strong>
                        <?php if (!empty($hand_rankBy1)) {
                            echo "$hand_rankBy1";
                        } ?></td>
                </tr>
                <tr>
                    <td><strong>Выигрыш:</strong>
                        <?php if (!empty($gainOfFirst)) {
                            echo "$gainOfFirst";
                        } else echo "0" ?> $
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="row justify-content-center">
            <form action="/poker/win/" method="post">
                <button type="submit" class="btn btn-success" name="submit">Раздать</button>
            </form>
        </div>

        <div class="col-4">
            <p><?php if (!empty($player2)) {
                    echo "<h5> $player2 </h5>";
                } ?>
            </p>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><strong>Имя:</strong> Николай</td>
                </tr>
                <tr>
                    <td><strong>Баланс:</strong> <?= $balance2 ?> $</td>
                </tr>
                <tr>
                    <td><strong>Розданные карты:</strong>
                        <?php if (!empty($playingCardsBy2)) {
                            echo "$playingCardsBy2";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Название комбинации:</strong>
                        <?php if (!empty($hand_rankBy2)) {
                            echo "$hand_rankBy2";
                        } ?></td>
                </tr>
                <tr>
                    <td><strong>Выигрыш:</strong>
                        <?php if (!empty($gainOfSecond)) {
                            echo "$gainOfSecond";
                        } else echo "0" ?> $
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

    </div>

    <div class="row justify-content-center">
            <?php if(isset($resultWin)){
               if($resultWin == -1) {
               echo "<h3 style='color: red'>Выиграл 1 игрок - Иван</h3>";
               }elseif($resultWin == 1){
                echo "<h3 style='color: red'>Выиграл 2 игрок - Николай</h3>";
               }
            }?>
    </div>

    <div>
        <form action="/poker/new/" method="post">
            <button type="submit" class="btn btn-outline-danger" name="new">New game</button>
        </form>
    </div>

</div>
</body>
</html>

