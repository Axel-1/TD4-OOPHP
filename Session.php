<?php


class Session
{
    private int $sessionID;
    private string $startDate;
    private int $maxPlaces;
    private array $participants = array();

    public function __construct(int $newSessionID, string $newStartDate, int $newMaxPlaces)
    {
        $this->sessionID = $newSessionID;
        $this->startDate = $newStartDate;
        $this->maxPlaces = $newMaxPlaces;
    }

    public function getSessionID(): int
    {
        return $this->sessionID;
    }

    public function addParticipant(Participant $newParticipant)
    {
        $this->participants[] = $newParticipant;
        $newParticipant->setSession($this);
    }

    public function isFull(): bool
    {
        if (count($this->participants) == $this->maxPlaces) {
            return true;
        } else {
            return false;
        }
    }
}