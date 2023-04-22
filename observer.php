<?php

interface Observer
{
    public function update($jobOpening);
}

class Employee implements Observer
{
    private $name;
    private $email;
    private $experience;

    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    public function update($jobOpening)
    {
        mail($this->email, "Появилась новая вакансия! ", "Уважаемый " . $this->name . ",\n\nНовая вакансия доступна:\n" . $jobOpening . "\n\nНаши наилучшие пожелания!");
    }
}

interface Subject
{
    public function registerObserver($observer);
    public function removeObserver($observer);
    public function notifyObservers($jobOpening);
}

class JobSite implements Subject
{
    private $observers = array();

    public function registerObserver($observer)
    {
        array_push($this->observers, $observer);
    }

    public function removeObserver($observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers($jobOpening)
    {
        foreach ($this->observers as $observer) {
            $observer->update($jobOpening);
        }
    }

    public function addJobOpening($jobOpening)
    {
        $this->notifyObservers($jobOpening);
    }
}
