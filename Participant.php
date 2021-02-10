<?php


class Participant
{
    private string $lastName;
    private string $firstName;
    private int $seniority;
    private Session $session;
    private array $choices;

    public function __construct(string $newLastName, string $newFirstName, int $newSeniority, array $newChoices)
    {
        $this->lastName = $newLastName;
        $this->firstName = $newFirstName;
        $this->seniority = $newSeniority;
        $this->choices = $newChoices;
    }

    public function getSessionChoice(int $index): Session
    {
        return $this->choices[$index];
    }

    public function setSession(Session $newSession)
    {
        $this->session = $newSession;
    }

    public function getSeniority(): int
    {
        return $this->seniority;
    }
}