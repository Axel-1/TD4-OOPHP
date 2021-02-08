<?php


class Training
{
    private string $trainingID;
    private string $name;
    private int $days;
    private array $registered = array();
    private array $mySessions = array();

    public function __construct(int $newTrainingID, string $newName, int $newDays)
    {
        $this->trainingID = $newTrainingID;
        $this->name = $newName;
        $this->days = $newDays;
    }

    public function assignParticipants()
    {
        foreach ($this->registered as $key => $val) {
            $index_counter = 0;
            while($val->getSessionChoice($index_counter)->isFull()) {
                $index_counter++;
            }
            $val->getSessionChoice($index_counter)->addParticipant($val);
        }
    }

    public function addSessions(Session $newSession)
    {
        $this->mySessions[] = $newSession;
    }

    public function addParticipant(Participant $newParticipant)
    {
        if (count($this->registered) != 0) {
            $indexCounter = 0;
            while ($indexCounter < count($this->registered)
                && $newParticipant->getSeniority() < $this->registered[$indexCounter]->getSeniority()) {
                $indexCounter++;
            }
            if (count($this->registered) != 0) {
                for ($i = count($this->registered) - 1; $i >= $indexCounter; $i--) {
                    $this->registered[$i + 1] = $this->registered[$i];
                }
                $this->registered[$indexCounter] = $newParticipant;
            } else {
                $this->registered[0] = $newParticipant;
            }

        } else {
            $this->registered[0] = $newParticipant;
        }
    }
}