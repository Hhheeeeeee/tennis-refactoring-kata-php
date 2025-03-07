<?php

namespace Feature;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;
    private int $player2Score = 0;
    private string $player1Name = '';
    private string $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint($playerName): void
    {

        'player1' == $playerName
            ? $this->player1Score++
            : $this->player2Score++;
        /*

        if ('player1' == $playerName) {
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }*/
    }

    public function getScore(): string
    {
        $score = "";
        if ($this->player1Score == $this->player2Score) {

            ($this->player1Score == 0) ? ($score = "Love-All")
                : ($this->player1Score == 1 ? $score = "Fifteen-All" : ($this->player1Score == 2 ? $score = "Thirty-All"
                : $score = "Deuce"));


            /*switch ($this->m_score1) {
                case 0:
                    $score = "Love-All";
                    break;
                case 1:
                    $score = "Fifteen-All";
                    break;
                case 2:
                    $score = "Thirty-All";
                    break;
                default:
                    $score = "Deuce";
                    break;
            }*/
        } elseif ($this->player1Score >= 4 || $this->player2Score >= 4) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult == 1) {
                $score = "Advantage ".$this->player1Name;
            } elseif ($minusResult == -1) {
                $score = "Advantage ".$this->player2Name;
            } elseif ($minusResult >= 2) {
                $score = "Win for ".$this->player1Name;
            } else {
                $score = "Win for ".$this->player2Name;
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $this->player1Score;
                } else {
                    $score .= "-";
                    $tempScore = $this->player2Score;
                }


                switch ($tempScore) {
                    case 0:
                        $score .= "Love";
                        break;
                    case 1:
                        $score .= "Fifteen";
                        break;
                    case 2:
                        $score .= "Thirty";
                        break;
                    case 3:
                        $score .= "Forty";
                        break;
                }
            }
        }
        return $score;
    }


}



