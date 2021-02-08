<?php

include "Training.php";
include "Session.php";
include "Participant.php";

$training1 = new Training(1, "Training 1", 2);

$session1 = new Session(1, "2020-10-01", 2);
$session2 = new Session(2, "2020-11-01", 1);
$session3 = new Session(3, "2021-01-01", 3);

$participant1 = new Participant("Test 1", "Test 1", 10, array($session1, $session2, $session3));
$participant2 = new Participant("Test 2", "Test 2", 3, array($session1, $session2, $session3));
$participant3 = new Participant("Test 3", "Test 3", 5, array($session1, $session2, $session3));
$participant4 = new Participant("Test 4", "Test 4", 20, array($session1, $session2, $session3));
$participant5 = new Participant("Test 5", "Test 5", 2, array($session1, $session2, $session3));

$training1->addSessions($session1);
$training1->addSessions($session2);
$training1->addSessions($session3);

$training1->addParticipant($participant1);
$training1->addParticipant($participant2);
$training1->addParticipant($participant3);
$training1->addParticipant($participant4);
$training1->addParticipant($participant5);

$training1->assignParticipants();

print_r($training1);