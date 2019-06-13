<?php

use ColumbusPHP\PokerHand\Collection\PokerHandCollection;
use ColumbusPHP\PokerHand\Feed\PokerHandFeedGenerator;
use ColumbusPHP\PokerHand\PokerHand;

require(ROOT . '/vendor/autoload.php');
include_once ROOT . '/src/models/Poker.php';

class PokerController extends Controller
{
    /**
     * Action для "вывода основной страницы"
     */
    public function actionIndex()
    {
        // Задаем баланс в начале игры
        $balance1 = poker::balance1New();
        $balance2 = poker::balance2New();

        // Задаем сессию для выигрыша
        $gainOfFirst = poker::gainOfFirstNew();
        $gainOfSecond = poker::gainOfSecondNew();

        require_once(ROOT . '/src/views/poker/index.php');

        return true;
    }

    /**
     * Action для "для раздачи, подсчета баланса,
     * выигрыша и определения победителя"
     */
    public function actionWin()
    {
        ini_set('error_reporting', E_ALL & ~E_WARNING);

        // Создаем новую игру из 2 участников с раздачей карт
        $game = PokerHandCollection::createFromFeed(PokerHandFeedGenerator::createGameOf(2));

        // Оцениваем ранг рук и сортируем их
        $game->rankHands()->sortHands();

        // Отсортировали массив по игрокам и вывели карты
        foreach ($game->hands as $player => $hand) {

            if ($player == 'Player 1') {
                $player1 = $player;
                $playingCardsBy1 = $hand->__toString();
                $hand1 = $hand;
            } elseif ($player == 'Player 2') {
                $player2 = $player;
                $playingCardsBy2 = $hand->__toString();
                $hand2 = $hand;
            }
        }

        // При помощи метода определил победителя по руке
        $resultWin = PokerHandCollection::compareHands($hand1, $hand2);

        if (isset($_POST['submit'])) {

            // Вычитаем ставку 10$ с баланса
            $balance1 = poker::balance1();
            $balance2 = poker::balance2();

            // Находим выигрыш в течении игры
            $gainOfFirst = poker::gainOfFirst();
            $gainOfSecond = poker::gainOfSecond();
        }

        // Добавляем банк на баланс победителя
        if ($resultWin == -1) {
            $balance1 = poker::resultWinBy1($resultWin, $balance1);
        } elseif ($resultWin == 1) {
            $balance2 = poker::resultWinBy2($resultWin, $balance2);
        }

        // Определили ранг карт 1 и 2 руки
        $hand_rankBy1 = PokerHand::$ranks [$hand1->hand_rank];
        $hand_rankBy2 = PokerHand::$ranks [$hand2->hand_rank];

        require_once(ROOT . '/src/views/poker/index.php');

        return true;
    }

    /**
     * Action для "вывода основной страницы"
     */
    public function actionNew()
    {
        if (isset($_POST['new'])) {

            // Задаем баланс в начале игры
            $balance1 = poker::balance1New();
            $balance2 = poker::balance2New();

            // Задаем сессию для выигрыша
            $gainOfFirst = poker::gainOfFirstNew();
            $gainOfSecond = poker::gainOfSecondNew();

            require_once(ROOT . '/src/views/poker/index.php');

            return true;
        }
        return $this->redirect('/');
    }
}