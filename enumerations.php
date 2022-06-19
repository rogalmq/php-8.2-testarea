<?php

enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    public function getCard(): string
    {
        return $this->name;
    }

}

function printCard(Suit $card): void 
{
    echo "Card : " . $card->getCard() . PHP_EOL;
}

printCard(Suit::Hearts);
printCard(Suit::Diamonds);
printCard(Suit::Clubs);
printCard(Suit::Spades);

?>
