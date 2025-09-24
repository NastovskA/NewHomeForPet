<?php
// models/FactModel.php
class FactModel {
    private $facts = [
        " Cats sleep for around 70% of their lives - that's 13-16 hours a day!",
        " Hamsters have poor eyesight but amazing hearing and smell abilities.",
        " Dogs can hear sounds up to four times farther than humans can.",
        " Rabbits' teeth never stop growing throughout their entire lives.",
        " Some dog breeds can understand over 200 different words and gestures.",
        " Cats have five toes on front paws but only four on their back paws.",
        " Hamsters store food in their cheek pouches for later consumption.",
        " Rabbits can jump up to one meter high and three meters long.",
        " Dogs' sense of smell is 10,000 to 100,000 times stronger than ours.",
        " Cats use their whiskers to measure gaps and detect nearby objects.",
        " Parrots can mimic human speech and even recognize different voices.",
        " Guinea pigs communicate using over 20 different sounds.",
        " Turtles can live for over 100 years with proper care.",
        " Ferrets sleep up to 18 hours daily but are incredibly active when awake.",
        " Goldfish actually have a memory span of at least three months.",
        " Chinchillas have the densest fur of all land animals.",
        " Horses can recognize and remember human facial emotions.",
        " Owls can rotate their heads up to 270 degrees.",
        " Goats have rectangular pupils giving them amazing peripheral vision.",
        " Pets can sense their owner's emotions and provide comfort instinctively.",
        " Cats can make over 100 different vocal sounds, while dogs make about 10.",
        " Some cats are 'left-pawed' or 'right-pawed', similar to humans being left or right-handed.",
        " Dogs’ wet noses help them absorb scent chemicals, making their sense of smell even sharper.",
        " Puppies are born blind, deaf, and toothless – they rely completely on touch and smell at first.",
        " Parrots not only mimic words but can also understand the context of some phrases.",
        " The African Grey Parrot has the intelligence of a 4–6 year old child.",
        " Hamsters’ teeth grow about 2 mm per week – that’s why they constantly need to chew.",
        " Hamsters can run up to 8 kilometers on their wheel in a single night.",
        " Rabbits can turn their ears 180 degrees to detect predators from far away.",
        " Rabbits purr softly (similar to cats) when they are relaxed and happy.",
        " Chinchillas can jump up to 6 feet high thanks to their powerful back legs.",
        " A chinchilla has about 60 hairs growing from each single hair follicle – humans have only one."
    ];

    public function getRandomFact() {
        $randomIndex = array_rand($this->facts);
        return $this->facts[$randomIndex];
    }

    public function getAllFacts() {
        return $this->facts;
    }
}