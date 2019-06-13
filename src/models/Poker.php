<?php
class Poker
{
    // Вычитаем ставку 10$ с баланса 1 игрока
    public static function balance1()
    {
        $balance1 = $_SESSION['balance1'];

        $_SESSION['balance1'] = $balance1  - 10;

        $balance1 = $_SESSION['balance1'];

        return $balance1;
    }

    // Вычитаем ставку 10$ с баланса 2 игрока
    public static function balance2()
    {
        $balance2 = $_SESSION['balance2'];

        $_SESSION['balance2'] = $balance2  - 10;

        $balance2 = $_SESSION['balance2'];

        return $balance2;
    }

    // Находим выигрыш в течении игры 1 игрока
    public static function gainOfFirst()
    {
        $gainOfFirst = $_SESSION['gain1'];

        $gainOfFirst = $_SESSION['balance1'] - 1000;

        return $gainOfFirst;
    }

    // Находим выигрыш в течении игры 2 игрока
    public static function gainOfSecond()
    {
        $gainOfSecond = $_SESSION['gain2'];

        $gainOfSecond = $_SESSION['balance2'] - 1000;

        return $gainOfSecond;
    }

    // Добавляем банк на баланс победителя по 1 руке
    public static function resultWinBy1($resultWin, $balance1)
    {
       $_SESSION['balance1'] = $balance1  + 20;

       return $balance1;
    }

    // Добавляем банк на баланс победителя по 2 руке
    public static function resultWinBy2($resultWin, $balance2)
    {
       $_SESSION['balance2'] = $balance2 + 20;

       return $balance2;
    }

    // Задаем баланс в начале игры по 1 руке
    public static function balance1New()
    {
        $balance1New = $_SESSION['balance1'] = 1000;

        return $balance1New;
    }

    // Задаем баланс в начале игры по 2 руке
    public static function balance2New()
    {
        $balance2New = $_SESSION['balance2'] = 1000;

        return $balance2New;
    }

    // Задали сессию для выиграша по 1 руке
    public static function gainOfFirstNew()
    {
        $gainOfFirstNew = $_SESSION['gain1'] = false;

        return $gainOfFirstNew;
    }

    // Задали сессию для выиграша по 2 руке
    public static function gainOfSecondNew()
    {
        $gainOfSecondNew = $_SESSION['gain2'] = false;

        return $gainOfSecondNew;
    }

}

